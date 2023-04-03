@extends("layouts.app")
@section("content")
<form action="{{route('auth.login')}}" method="POST">
    @csrf
    <input id="login" name="login" type="email" placeholder="login">
    <br>
    <input id="password" name="password" type="password" placeholder="password">
<input type="submit" value="zapisz">
</form>
@endsection