<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat App</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app">
        <div class="lg:mx-20 md:mx-20 mt-5">
            <ul>
            @foreach ($friends as $friend)
                <li class="mt-2 text-purple-700">> <a href="{{ route('chat.friend', $friend->id) }}">{{ $friend->name }}</a></li>
            @endforeach
        </ul>
        </div>
    </div>
    
@vite('resources/js/app.js')
</body>
</html>