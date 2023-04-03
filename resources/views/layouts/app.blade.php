<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <!-- <link rel="stylesheet" href="{{asset('/css/app.css')}}"> --> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="inline-block p-6 bg-gradient-to-br from-green-400 to-blue-400 flex items-center justify-center h-screen w-screen">
<div id="root" class="justify-items-center">
<header class="bg-gray">
    @auth
    <h1>Witaj <strong>{{Auth::user()->name}}</strong></h1>
    <form action="{{route('auth.logout')}}" method="POST">
        @csrf
        <input type="submit" value="wyloguj">
</form>
    <a href="{{route('form.create')}}"> dodaj post</a>
    @else
    <a href="{{route('login')}}">zaloguj sie </a>
    @endauth


<h1 class="text-yellow-700 font-bold m-3 ml-200 mb-30 text-6xl mb-30"> Nasze Forum </h1>
</header>
    @yield('content')
    <p class="mt-30 font-bold m-3 ml-20">Sprawdz również: </p>
    @auth <a href ="{{ route('posts') }}"><button class="text-red-100 bg-black-300 ml-10 mr-4">Najnowszy artykul </button></a>@endauth
            <a href ="{{ route('home') }}"><button class="text-red-100 bg-black-300">Strona głowna </button></a>
</div>
</body>
</html>
