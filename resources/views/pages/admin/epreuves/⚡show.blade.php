<?php

use App\Models\Jiri;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

new #[Layout('layouts::admin')] class extends Component {

    public Jiri $jiri;
    public string $studentSearch = '';
    public string $evaluatorSearch = '';
    public string $projectSearch = '';

    public function mount(Jiri $jiri): void
    {
        $this->jiri = $jiri;
    }

    #[On('contact-added')]
    public function refreshJiri(): void
    {
        $this->jiri->refresh();
        $this->jiri->unsetRelations();
    }

    #[Computed]
    public function evaluated()
    {
        return $this->jiri
            ->evaluated()
            ->when($this->studentSearch, function ($query) {
                $query->where(function ($query) {
                    $query
                        ->where('firstname', 'like', '%' . $this->studentSearch . '%')
                        ->orWhere('lastname', 'like', '%' . $this->studentSearch . '%')
                        ->orWhere('email', 'like', '%' . $this->studentSearch . '%');
                });
            })
            ->get();
    }

    #[Computed]
    public function evaluators()
    {
        return $this->jiri
            ->evaluators()
            ->when($this->evaluatorSearch, function ($query) {
                $query->where(function ($query) {
                    $query
                        ->where('firstname', 'like', '%' . $this->evaluatorSearch . '%')
                        ->orWhere('lastname', 'like', '%' . $this->evaluatorSearch . '%')
                        ->orWhere('email', 'like', '%' . $this->evaluatorSearch . '%');
                });
            })
            ->get();
    }

    #[Computed]
    public function projects()
    {
        return $this->jiri
            ->projects()
            ->when($this->projectSearch, function ($query) {
                $query->where(function ($query) {
                    $query
                        ->where('name', 'like', '%' . $this->projectSearch . '%')
                        ->orWhere('description', 'like', '%' . $this->projectSearch . '%');
                });
            })
            ->get();
    }
};

?>

<div>
    <div class="flex flex-col gap-6 pb-12 md:flex-row md:items-center md:justify-between md:pb-16 lg:pb-20">
        <div>
            <h1 class="text-3xl font-semibold md:text-4xl">{{ $jiri->name }}</h1>
        </div>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <form action="{{ route('send-invitation') }}" method="POST">
                @csrf
                <button type="submit" class="btn-sec w-full sm:w-auto">{{ __('actions.send_invitation') }}</button>
            </form>
            <x-generic.btn.main title="Clôturer l'épreuve" />
        </div>
    </div>

    <section class="pb-14 md:pb-16 lg:pb-20">
        <div class="flex flex-col gap-4 mb-6 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold md:text-3xl">{{ __('title.students_list') }}</h2>
                <p class="mt-1 text-sm text-text-light">{{ $this->evaluated->count() }} élève(s)</p>
            </div>

            <div class="flex items-center gap-3 md:w-auto">
                <div class="min-w-0 flex-1 md:w-80 md:flex-none">
                    <x-generic.table.table-filter.search-input wire:model.live.debounce.300ms="studentSearch" />
                </div>
                <button type="button" @click="$dispatch('open-add-student')" class="btn-main shrink-0">
                    <span class="sm:hidden">+</span>
                    <span class="hidden sm:inline">{{ __('actions.add_student') }}</span>
                </button>
            </div>
        </div>
        <livewire:modals.epreuves.students.add-student :jiri-id="$jiri->id" />

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4 xl:gap-6">
            @forelse ($this->evaluated as $evaluated)
                <x-admin.students.card
                    :id="$evaluated->id"
                    image="cat2.jpg"
                    :contact="$evaluated->firstname . ' ' . $evaluated->lastname"
                    seen_count="7"
                    seen_type="évaluateurs"
                />
            @empty
                <div class="col-span-full rounded-2xl border border-neutral-200 p-6 text-center text-text-light">
                    Aucun élève trouvé.
                </div>
            @endforelse
        </div>
    </section>

    <section class="pb-14 md:pb-16 lg:pb-20">
        <div class="flex flex-col gap-4 mb-6 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold md:text-3xl">{{ __('title.evaluators_list') }}</h2>
                <p class="mt-1 text-sm text-text-light">{{ $this->evaluators->count() }} évaluateur(s)</p>
            </div>

            <div class="flex items-center gap-3 md:w-auto">
                <div class="min-w-0 flex-1 md:w-80 md:flex-none">
                    <x-generic.table.table-filter.search-input wire:model.live.debounce.300ms="evaluatorSearch" />
                </div>
                <button type="button" @click="$dispatch('open-add-evaluator')" class="btn-main shrink-0">
                    <span class="sm:hidden">+</span>
                    <span class="hidden sm:inline">{{ __('actions.add_evaluator') }}</span>
                </button>
            </div>
        </div>
        <livewire:modals.epreuves.evaluators.add-evaluator :jiri-id="$jiri->id" />

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4 xl:gap-6">
            @forelse ($this->evaluators as $evaluator)
                <x-admin.students.card
                    :id="$evaluator->id"
                    image="andrew.jpg"
                    :contact="$evaluator->firstname . ' ' . $evaluator->lastname"
                    seen_count="7"
                    seen_type="élèves"
                />
            @empty
                <div class="col-span-full rounded-2xl border border-neutral-200 p-6 text-center text-text-light">
                    Aucun évaluateur trouvé.
                </div>
            @endforelse
        </div>
    </section>

    <section class="pb-14 md:pb-16 lg:pb-20">
        <div class="flex flex-col gap-4 mb-6 md:flex-row md:items-center md:justify-between">
            <div>
                <div class="flex items-center gap-3">
                    <h2 class="text-2xl font-semibold md:text-3xl">{{ __('title.projects_list') }}</h2>
                    <div class="tooltip-ponderation">
                        <x-generic.projects.tooltip />
                    </div>
                </div>
                <p class="mt-1 text-sm text-text-light">{{ $this->projects->count() }} projet(s)</p>
            </div>

            <div class="flex items-center gap-3 md:w-auto">
                <div class="min-w-0 flex-1 md:w-80 md:flex-none">
                    <x-generic.table.table-filter.search-input wire:model.live.debounce.300ms="projectSearch" />
                </div>

                <button type="button" @click="$dispatch('open-add-project')" class="btn-main shrink-0">
                    <span class="sm:hidden">+</span>
                    <span class="hidden sm:inline">{{ __('actions.add_project') }}</span>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3 xl:gap-6">
            @forelse ($this->projects as $project)
                <x-generic.projects.card-project
                    :project="$project"
                    :weighting="$project->pivot->weight"
                />
            @empty
                <div class="col-span-full rounded-2xl border border-neutral-200 p-6 text-center text-text-light">
                    Aucun projet trouvé.
                </div>
            @endforelse
        </div>
    </section>
</div>
