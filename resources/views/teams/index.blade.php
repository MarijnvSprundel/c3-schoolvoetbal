<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teambeheer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Naam</th>
                            <th>Creator</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{$team->id}}</a></td>
                                <td><a href="{{ route('teams.edit', ['team'=>$team]) }}">{{$team->name}}</td>
                                <td>{{$team->creator->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('teams.create') }}" class="btn btn-primary">Nieuw team aanmaken</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
