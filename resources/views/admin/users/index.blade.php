<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi primera aplicacion') }}  <!--<--Parar especificar que podia ser una varibale y que se podria cambiar de lenguaje--> -->
        </h2>
    </x-slot>
        @livewire('admin.users.index')
        
    </x-app-layout>