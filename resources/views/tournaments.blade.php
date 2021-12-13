<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toernooien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex repellendus doloremque nobis? Ipsa repellendus recusandae ab, temporibus laborum quibusdam expedita, quidem rem iure sequi consectetur! Cupiditate nam asperiores itaque porro.
                </div>
                {{ $tournaments }}
            </div>
        </div>
    </div>
</x-app-layout>
