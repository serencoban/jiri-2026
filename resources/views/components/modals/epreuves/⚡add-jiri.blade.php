<?php

use App\Enums\EnumsAttendanceRole;
use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public bool $open = false;
    public int $step = 1;

    public string $name = '';
    public string $date = '';
    public string $beginsAt = '';
    public string $endsAt = '';
    public string $evaluatorSearch = '';
    public string $studentSearch = '';
    public string $projectSearch = '';

    public array $selectedEvaluators = [];
    public array $selectedStudents = [];
    public array $selectedProjects = [];
    public array $projectWeights = [];

    #[On('open-add-jiri')]
    public function open(): void
    {
        $this->open = true;
    }

    public function close(): void
    {
        $this->open = false;
    }

    public function previousStep(): void
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function nextStep(): void
    {
        if ($this->step === 1) {
            $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'date' => ['required', 'date'],
                'beginsAt' => ['required'],
                'endsAt' => ['required', 'after:beginsAt'],
            ]);
        }

        if ($this->step < 4) {
            $this->step++;
        }
    }

    #[Computed]
    public function evaluators()
    {
        return Contact::query()
            ->when($this->selectedStudents, function ($query) {
                $query->whereNotIn('id', $this->selectedStudents);
            })
            ->when($this->evaluatorSearch, function ($query) {
                $query->where(function ($query) {
                    $query
                        ->where('firstname', 'like', '%' . $this->evaluatorSearch . '%')
                        ->orWhere('lastname', 'like', '%' . $this->evaluatorSearch . '%')
                        ->orWhere('email', 'like', '%' . $this->evaluatorSearch . '%');
                });
            })
            ->orderBy('firstname')
            ->limit(20)
            ->get();
    }

    #[Computed]
    public function students()
    {
        return Contact::query()
            ->when($this->selectedEvaluators, function ($query) {
                $query->whereNotIn('id', $this->selectedEvaluators);
            })
            ->when($this->studentSearch, function ($query) {
                $query->where(function ($query) {
                    $query
                        ->where('firstname', 'like', '%' . $this->studentSearch . '%')
                        ->orWhere('lastname', 'like', '%' . $this->studentSearch . '%')
                        ->orWhere('email', 'like', '%' . $this->studentSearch . '%');
                });
            })
            ->orderBy('firstname')
            ->limit(20)
            ->get();
    }

    #[Computed]
    public function projects()
    {
        return Project::query()
            ->when($this->projectSearch, function ($query) {
                $query->where(function ($query) {
                    $query
                        ->where('name', 'like', '%' . $this->projectSearch . '%')
                        ->orWhere('description', 'like', '%' . $this->projectSearch . '%');
                });
            })
            ->orderBy('name')
            ->limit(20)
            ->get();
    }

    public function submit(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'beginsAt' => ['required'],
            'endsAt' => ['required', 'after:beginsAt'],
            'selectedEvaluators' => ['array'],
            'selectedEvaluators.*' => ['exists:contacts,id'],
            'selectedStudents' => ['array'],
            'selectedStudents.*' => ['exists:contacts,id'],
            'selectedProjects' => ['array'],
            'selectedProjects.*' => ['exists:projects,id'],
        ]);

        DB::transaction(function () {
            $baseSlug = Str::slug($this->name);
            $slug = $baseSlug;
            $number = 2;

            while (Jiri::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $number;
                $number++;
            }
            $jiri = auth()->user()->jiris()->create([
                'name' => $this->name,
                'date' => $this->date,
                'begins_at' => $this->beginsAt,
                'ends_at' => $this->endsAt,
                'status' => 'upcoming',
                'slug'=>$slug,
            ]);

            $evaluators = [];
            foreach ($this->selectedEvaluators as $contactId) {
                $evaluators[$contactId] = [
                    'role' => EnumsAttendanceRole::Evaluator->value,
                ];
            }
            if ($evaluators) {
                $jiri->contacts()->attach($evaluators);
            }

            $students = [];
            foreach ($this->selectedStudents as $contactId) {
                $students[$contactId] = [
                    'role' => EnumsAttendanceRole::Evaluated->value,
                ];
            }
            if ($students) {
                $jiri->contacts()->attach($students);
            }

            $projects = [];
            foreach ($this->selectedProjects as $projectId) {
                $projects[$projectId] = [
                    'weight' => $this->projectWeights[$projectId] ?? 0,
                ];
            }
            if ($projects) {
                $jiri->projects()->attach($projects);
            }
        });

        $this->resetWizard();
        $this->dispatch('jiri-created');
    }

    private function resetWizard(): void
    {
        $this->reset([
            'open',
            'step',
            'name',
            'date',
            'beginsAt',
            'endsAt',
            'evaluatorSearch',
            'studentSearch',
            'projectSearch',
            'selectedEvaluators',
            'selectedStudents',
            'selectedProjects',
            'projectWeights',
        ]);

        $this->resetValidation();
    }
};

?>

<x-modals.base open="$wire.open">
    <div class="flex items-start justify-between gap-4 mb-5">
        <div>
            <h2 class="mt-1 text-xl font-semibold sm:text-2xl">
                @if ($step === 1)
                    Ajouter une épreuve
                @elseif ($step === 2)
                    Ajouter les évaluateurs
                @elseif ($step === 3)
                    Ajouter les élèves
                @else
                    Ajouter les projets
                @endif
            </h2>
        </div>
        <button type="button" wire:click="close" class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg text-text-light transition hover:bg-neutral-100 hover:text-neutral-900" aria-label="Fermer">✕</button>
    </div>

    <div class="mb-6">
        <x-modals.steps :current-step="$step" />
    </div>

    @if ($step === 1)
        <div class="space-y-5">
            <div>
                <label for="jiri-name" class="mb-2 block text-sm font-medium">Nom de l'épreuve</label>
                <input id="jiri-name" type="text" wire:model="name" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 outline-none transition focus:border-main-red focus:ring-2 focus:ring-main-red/10" placeholder="Design Web - Juin 2027">
                @error('name')
                <p class="mt-1 text-sm text-main-red">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div>
                <label for="jiri-date" class="mb-2 block text-sm font-medium">Date</label>
                <input id="jiri-date" type="date" wire:model="date" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 outline-none transition focus:border-main-red focus:ring-2 focus:ring-main-red/10">
                @error('date')
                <p class="mt-1 text-sm text-main-red">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label for="jiri-begins" class="mb-2 block text-sm font-medium">Heure de début</label>
                    <input id="jiri-begins" type="time" wire:model="beginsAt" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 outline-none transition focus:border-main-red focus:ring-2 focus:ring-main-red/10">
                    @error('beginsAt')
                    <p class="mt-1 text-sm text-main-red">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label for="jiri-ends" class="mb-2 block text-sm font-medium">Heure de fin</label>
                    <input id="jiri-ends" type="time" wire:model="endsAt" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 outline-none transition focus:border-main-red focus:ring-2 focus:ring-main-red/10">
                    @error('endsAt')
                    <p class="mt-1 text-sm text-main-red">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
        </div>
    @endif

    @if ($step === 2)
        <div>
            <div class="mb-5">
                <x-generic.table.table-filter.search-input wire:model.live.debounce.300ms="evaluatorSearch" />
            </div>

            <div class="mb-4 flex items-center justify-between gap-4">
                <span class="text-sm text-text-light">Sélectionnez les évaluateurs</span>
                <span class="shrink-0 text-sm font-medium">{{ count($selectedEvaluators) }} sélectionné(s)</span>
            </div>

            <div class="max-h-[45vh] space-y-2 overflow-y-auto pr-1">
                @forelse ($this->evaluators as $contact)
                    <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-neutral-200 p-3 transition hover:bg-light-white">
                        <input type="checkbox" wire:model.live="selectedEvaluators" value="{{ $contact->id }}" class="h-4 w-4 shrink-0">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-red-50 text-sm font-semibold text-main-red">
                            {{ strtoupper(substr($contact->firstname, 0, 1)) }}
                            {{ strtoupper(substr($contact->lastname, 0, 1)) }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <span class="block font-medium">{{ $contact->firstname }} {{ $contact->lastname }}</span>
                            <span class="block truncate text-sm text-text-light">{{ $contact->email }}</span>
                        </div>
                    </label>
                @empty
                    <p class="py-8 text-center text-sm text-text-light">Aucun contact trouvé.</p>
                @endforelse
            </div>
        </div>
    @endif

    @if ($step === 3)
        <div>
            <div class="mb-5">
                <x-generic.table.table-filter.search-input wire:model.live.debounce.300ms="studentSearch" />
            </div>
            <div class="mb-4 flex items-center justify-between gap-4">
                <span class="text-sm text-text-light">Sélectionnez les élèves</span>
                <span class="shrink-0 text-sm font-medium">{{ count($selectedStudents) }} sélectionné(s)</span>
            </div>
            <div class="max-h-[45vh] space-y-2 overflow-y-auto pr-1">
                @forelse ($this->students as $contact)
                    <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-neutral-200 p-3 transition hover:bg-light-white">
                        <input type="checkbox" wire:model.live="selectedStudents" value="{{ $contact->id }}" class="h-4 w-4 shrink-0">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-red-50 text-sm font-semibold text-main-red">
                            {{ strtoupper(substr($contact->firstname, 0, 1)) }}
                            {{ strtoupper(substr($contact->lastname, 0, 1)) }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <span class="block font-medium">{{ $contact->firstname }} {{ $contact->lastname }}</span>
                            <span class="block truncate text-sm text-text-light">{{ $contact->email }}</span>
                        </div>
                    </label>
                @empty
                    <p class="py-8 text-center text-sm text-text-light">Aucun contact trouvé.</p>
                @endforelse
            </div>
        </div>
    @endif

    @if ($step === 4)
        <div>
            <div class="mb-5">
                <x-generic.table.table-filter.search-input wire:model.live.debounce.300ms="projectSearch" />
            </div>
            <div class="mb-4 flex items-center justify-between gap-4">
                <span class="text-sm text-text-light">Sélectionnez les projets</span>
                <span class="shrink-0 text-sm font-medium">{{ count($selectedProjects) }} sélectionné(s)</span>
            </div>

            <div class="max-h-[45vh] space-y-3 overflow-y-auto pr-1">
                @forelse ($this->projects as $project)
                    <div class="rounded-xl border border-neutral-200 p-4">
                        <label class="flex cursor-pointer items-start gap-3">
                            <input type="checkbox" wire:model.live="selectedProjects" value="{{ $project->id }}" class="mt-1 h-4 w-4 shrink-0">
                            <div class="min-w-0 flex-1">
                                <span class="block font-medium">{{ $project->name }}</span>
                                @if ($project->description)
                                    <span class="mt-1 block text-sm text-text-light">
                                        {{ $project->description }}
                                    </span>
                                @endif
                            </div>
                        </label>

                        @if (in_array($project->id, $selectedProjects))
                            <div class="mt-4 border-t border-neutral-100 pt-4">
                                <label for="weight-{{ $project->id }}" class="mb-2 block text-sm text-text-light">Pondération</label>
                                <div class="flex items-center gap-2">
                                    <input id="weight-{{ $project->id }}" type="number" min="0" max="100" wire:model="projectWeights.{{ $project->id }}" class="w-24 rounded-lg border border-neutral-200 px-3 py-2 outline-none transition focus:border-main-red focus:ring-2 focus:ring-main-red/10" placeholder="0">
                                    <span class="text-sm text-text-light">%</span>
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                    <p class="py-8 text-center text-sm text-text-light">Aucun projet trouvé.</p>
                @endforelse
            </div>
        </div>
    @endif

    <div class="mt-6 flex items-center gap-3 border-t border-neutral-200 pt-5">
        @if ($step > 1)
            <button type="button" wire:click="previousStep" class="btn-sec flex-1 sm:flex-none">Retour</button>
        @endif
        @if ($step < 4)
            <button type="button" wire:click="nextStep" class="btn-main flex-1 sm:ml-auto sm:flex-none">{{ __('actions.next') }}</button>
        @else
            <button type="button" wire:click="submit" wire:loading.attr="disabled" class="btn-main flex-1 sm:ml-auto sm:flex-none">
                <span wire:loading.remove wire:target="submit">{{ __('actions.create_jiri') }}</span>
                <span wire:loading wire:target="submit">Création...</span>
            </button>
        @endif
    </div>
</x-modals.base>
