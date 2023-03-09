<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(session('success'))
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Success!
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif



    @foreach ($posts as $post)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                {{-- A FAIRE CREER UNE ROUTE QUI VA SUR L'ARTICLE CLICKE --}}
                <a href=" {{ route('post.single', ['id' => $post->id]) }} " class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 ">
                        <div class="flex flex-row justify-center w-full">
                            <h2 class="text-xl">{{$post->title}}</h2>
                            <h3 class="text-sm ml-auto">{{$post->user->name}}</h3>
                        </div>
                    </div>
                </a>

                
            </div>
        </div>
    @endforeach
</x-app-layout>
