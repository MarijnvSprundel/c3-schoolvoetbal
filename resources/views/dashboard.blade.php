<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Door 4S, voor de gokkers!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="matches">

                        @foreach ($games as $game)
                            <div>
                                <p>{{ $game->team1->name }} - {{ $game->team2->name }}</p>
                                <p>{{ $game->datetime }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="teams">
                        @foreach ($teams as $team)
                                <p>{{ $team->name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
