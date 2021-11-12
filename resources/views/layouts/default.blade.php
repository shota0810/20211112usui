<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/default.css') }}">
    <title>ToDoリスト</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="tittle">Todo List</h1>
            <div class="todo">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>