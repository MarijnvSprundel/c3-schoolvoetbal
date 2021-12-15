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
                    <h2>Huidige teams</h2>
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                            <tr>
                                <th>Team ID</th>
                                <th>Team Naam</th>
                                <th>Creator</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                    <tr>
                                        <td>{{$team->id}}</td>
                                        <td>
                                            @if($user->is_admin || $team->creator_id == $user->id)
                                                <a href="{{ route('teams.edit', ['team'=>$team]) }}">{{$team->name}}</td>
                                            @else
                                                {{$team->name}}
                                            @endif
                                        <td>{{$team->creator->name}}</td>
                                    </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div>

                    <a href="{{ route('teams.create') }}" class="btn btn-primary">Nieuw team aanmaken</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
