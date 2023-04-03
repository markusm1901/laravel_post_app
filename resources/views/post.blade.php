@extends('layouts.app')
@section('content')

    @if (auth()->user()->id == $post->author_id)
    <a href="{{ route('posts.edit', ['publication' => $post->id]) }}">Edytuj</a>
    <form action="{{ route('posts-delete', ['publication' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Usuń</button>
    </form>
    @endif
<p class ="text-2xl font-bold mt-12"> Tytul: {{ $post['title'] }}</p>
<p class ="text-justify m-5 border-double w-64 font-bold">{{ $post['content'] }}</p>
<p class ="font-bold ml-40">Autor: {{ $post['author']->name }}</p>
<br>
<p class="font-bold ml-40"> Komentarze: </p>

<div class="border-4 border-indigo-600 text-justify ml-30">
{{-- <form action="{{route('comments.store')}}" method="POST">
    <textarea name="comment_content" placeholder="tresc">
        <textarea>
            <button type="submit">wyslij Komentarz</button>
</form> --}}
@foreach ($post->comments as $item)
    {{-- <p>{{$item['content_comment']}}</p> --}}
    <p class="font-bold">{{$item['author']->name}} : {{$item['content_comment']}}</p>
    <p>Dodano: {{$item['created_at']}}</p>
    @auth
    @if (auth()->user()->id == $item->author_id)
    <form action="{{route("comments.delete", ['comment' => $item])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Usuń</button>
    </form>
    @endauth
    @endif
    @endforeach
</div>
@auth
<form action="{{ route('comments.store', ['publication' => $post])}}" method="POST">
@csrf

<textarea name="content_comment" placeholder="Treść Komentarza"></textarea>
@error("content_comment") <p>{{$message}}</p>@enderror
<br>
<button type="submit">Dodaj Komentarz</button>
</form>
@endauth


@endsection
