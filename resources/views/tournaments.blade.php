<x-app-layout>
    <x-slot name="header">
        <div class="tournaments-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Toernooien') }}
            </h2>
            <a href= "{{ route('teams.index') }}">
                {{ __('Teams bekijken') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="teamindex-title">
                        <h2>Games</h2>
                    </div>
                    {{$tournaments}}
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Team 1</th>
                                <th>Team 2</th>
                                <th>Team 1 Score</th>
                                <th>Team 2 Score</th>
                                <th>Veld</th>
                                <th>Referee</th>
                                <th>Tijd</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tournaments as $tournament)
                                    <tr onclick="window.location.href = '{{route('admin.edit', $user->id)}}';">
                                        <td>{{$tournament->id}}</td>
                                        <td>{{$tournament->team_1->name}}</td>
                                        <td>{{$tournament->team_2->name}}</td>
                                        <td>{{$tournament->team_1_score}}</td>
                                        <td>{{$tournament->team_2_score}}</td>
                                        <td>{{$tournament->field->name}}</td>
                                        <td>{{$tournament->referee->name}}</td>
                                        <td>{{ $game->datetime == null ? "n.v.t." : date("H:i", strtotime($game->datetime)) }}</td>
                                    </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
