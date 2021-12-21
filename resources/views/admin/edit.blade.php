<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gebruiker aanpassen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">

                        <a class="standard-button" href="{{route('admin.index')}}">Terug</a>
                        <br><br>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{route('admin.update', $dbUsers->id)}}" id="updateForm">
                            @csrf
                            @method("PUT")
                            <div class="textbox-create">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="name">Naam</span>
                                        <input type="text" class="form-control" value="{{$dbUsers->name}}" placeholder="Name" aria-label="Name" aria-describedby="name" name="name">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="email">Email</span>
                                        <input type="email" class="form-control" value="{{$dbUsers->email}}" placeholder="Email" aria-label="Email" aria-describedby="email" name="email">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="is_admin">
                                            Is Admin
                                        </label>
                                        <input class="form-check-input" type="checkbox" {{$dbUsers->is_admin ? "checked" : ""}} id="is_admin" name="is_admin">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="two-buttons">
                            <div class="form-group">
                                <input class="standard-button" type="submit" value="Aanpassen" onclick="document.getElementById('updateForm').submit();">
                            </div>

                            <form action="{{route('admin.destroy', $dbUsers->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="delete-button" type="submit" value="Verwijderen" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
