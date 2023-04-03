@extends('layouts.app')
@section('content')
@if (isset($publications))
    @php
        $last_el = [];
        $last_el = $publications->first();
    @endphp

    <a href="{{ route('posts.edit', ['publication' => $last_el->id]) }}">Edytuj</a>
    <h1 class = "font-bold m-3 text-xl">Najnowszy artykuł: </h1>
    <p class ="text-2xl font-bold mt-12">{{$last_el->title}}</p>
    <p class ="text-justify m-5 ml-40 w-64 font-bold">{{$last_el->content}}</p>
    <p class ="font-bold ml-40">Autorstwa: {{$last_el->author->name}}</p>
    @foreach ($last_el->comments as $item)
    {{-- <p>{{$item['content_comment']}}</p> --}}
    <p class="font-bold">{{$item['author']->name}} : {{$item['content_comment']}}</p>
    <p>Dodano: {{$item['created_at']}}</p>
    @if (auth()->user()->id == $item->author_id)
    <form action="{{route("comments.delete", ['comment' => $item])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Usuń</button>
    </form>
    @endif
    @endforeach
</div>
@auth
<form action="{{ route('comments.store', ['publication' => $last_el])}}" method="POST">
@csrf

<textarea name="content_comment" placeholder="Treść Komentarza"></textarea>
@error("content_comment") <p>{{$message}}</p>@enderror
<br>
<button type="submit">Dodaj Komentarz</button>
</form>
@endauth
    <form action="{{ route('posts-delete', ['publication' => $last_el->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Usuń</button>
</form>
    @endif
@endsection
