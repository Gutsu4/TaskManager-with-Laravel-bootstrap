<!doctype html>
<html lang="en">
<head>
    <title>User Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1 class="text-center">ユーザーホーム</h1>
<h2 class="text-center">{{$name}}さん今日もお疲れ様です</h2>

<div>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">タイトル</th>
                <th>詳細</th>
                <th>編集</th>
                <th>完了</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td>
                        <a href="{{route('task.edit',['id'=>$task->id])}}" class="btn btn-primary">編集</a>
                    </td>
                    <td>
                        <form action="{{route('task.done',$task->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$task->id}}">
                            <button type="submit" class="btn btn-success">完了</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('task.delete',$task->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$task->id}}">
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a class="btn-primary btn" href="{{route('task.create')}}">タスク新規作成</a>
<a class="btn-primary btn" href="{{route('task.already.done')}}">完了済みタスク</a>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
