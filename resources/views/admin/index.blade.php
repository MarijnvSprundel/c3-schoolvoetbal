<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gebruiker beheer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="teamindex-title">
                        <h2>Gebruikers</h2>
                    </div>
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Naam</th>
                                <th>Email</th>
                                <th>Admin</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                        <tr onclick="window.location.href = '{{route('admin.edit', $user->id)}}';">
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->is_admin ? "Ja" : "Nee"}}</td>
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
