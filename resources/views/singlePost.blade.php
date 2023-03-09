<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @if ( Auth::user()->id  === $post->user->id)
            <h1>Article numéro {{ $post->id }}</h1>
            <h2>{{$post->title}}</h2>
            <h3>{{$post->content}}</h3>
            <h2>article posté par : {{ $post->user->name }} </h2>


            <form action="{{ route('post.destroy', ["id" => $post->id] )}}" method="POST"> 
                @csrf
                <x-danger-button type="submit">
                    supprimer le post
                </x-danger-button>
            </form>

        @else
            <h1>Article numéro {{ $post->id }}</h1>
            <h2>{{$post->title}}</h2>
            <h3>{{$post->content}}</h3>
            <h2>article posté par : {{ $post->user->name }} </h2>
        @endif
</x-app-layout>



