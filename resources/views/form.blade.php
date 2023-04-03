@extends("layouts.app")
@php
@endphp
@section("content")
    @php
    $action = route('posts.store');
    $title = null;
    $content = null;
    $author_id = null;
    $header = "dodajesz post";
    if (isset($post)) {
        $action = route('posts.update', ['publication' => $post->id]);
        $header = "edycja postu";
        $title = $post->title;
        $content = $post->content;
        $author_id = $post->author_id;
    }
    @endphp
<p>{{$header}}</p>
<form action="{{ $action }}" method="POST">
    @csrf
    @php
@endphp
    <input id="title" name="title" type="text" placeholder="Tytuł" value="{{ $title }}">
    @error('title')
    <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    <textarea name="content" id="content" placeholder="Treść..." cols="30" rows="10">{{ $content }}</textarea>
    @error('content')
    <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
<input type="submit" value="zapisz">
</form>
@endsection
