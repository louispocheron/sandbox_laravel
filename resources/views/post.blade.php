<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('écrire un post') }}
        </h2>
    </x-slot>
    <div class="flex justify-center items-center flex-col">
        <form action="{{ route('post.create') }}"  method="POST" class="flex flex-col">
            @csrf
            <input class="m-8" type="text" placeholder="titre" name="title">
            <input type="text" placeholder="contenu" name="content">
            <button type="submit">
                    enregistrer
            </button>
                
        </form>
    </div>
</x-app-layout>