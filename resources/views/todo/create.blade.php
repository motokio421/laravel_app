@extends ('layouts.app') 
@section ('content')

<h2 class="mb-3">ToDo作成</h2>
{!! Form::open(['route' => 'todo.store']) !!} <!-- 変更 　routeの中のname todo.store Action実行-->
  <div class="form-group">
    {!! Form::input('text', 'title', null, ['required', 'class' => 'form-control', 'placeholder' => 'ToDo内容']) !!} <!-- 変更　formファサード　配列-->
  </div>
  {!! Form::submit('追加', ['class' => 'btn btn-success float-right']) !!} <!-- 変更 サブミット作成-->
{!! Form::close() !!} <!-- 変更 フォームを閉じる-->

@endsection