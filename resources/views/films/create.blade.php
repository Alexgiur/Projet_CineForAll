<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Un film</title>
</head>
<body>
<h1>Créer un film</h1>
<form action="/films" method="Post">
    @csrf
    <input @error('title') style="border-color: red" @enderror type="text" name="title" placeholder="Titre" value="{{ old('title') }}"><br>
    @error('title')
    <p style="color: red">{{ $message }}</p>
    @enderror

</form>
</body>
</html>
