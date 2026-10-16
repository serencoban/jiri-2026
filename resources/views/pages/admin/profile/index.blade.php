<x-layouts.admin>
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button class="cursor-pointer" type="submit">Se déconnecter</button>
    </form>
</x-layouts.admin>
