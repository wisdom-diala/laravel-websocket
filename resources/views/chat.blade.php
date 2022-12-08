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
    	<h1>{{ auth()->user()->name  }} is chatting with {{ $user->name }}</h1>
        <Chat :receiver-id="{{ $user->id }}" :logged-user="{{ auth()->user()->id }}" /> 
    </div>
    
@vite('resources/js/app.js')
</body> 
</html>