<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Team aanmaken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="container">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{route('teams.store')}}">
                        @csrf
                        <div class="create-form">
                            <div class="textbox-create">
                                <div class="form-group">
                                    <label for="name">Naam team:</label>
                                    <input type="text" name="name" class="form-control" id="">
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="standard-button" type="submit" value="Opslaan">
                            </div>
                        </div>
                    </form>

                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
