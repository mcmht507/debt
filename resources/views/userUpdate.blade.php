@extends('layouts.base')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('user.update') }}">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PUT">
    <div class="header-text">
        新規会員更新
    </div>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">なまえ</label>

        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

        @if ($errors->has('name'))
        <span class="help-block">
            @foreach ($errors->get('name') as $item)
            <strong>{{ $item }}</strong>
            @endforeach
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">メールアドレス</label>

        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

        @if ($errors->has('email'))
        <span class="help-block">
            @foreach ($errors->get('email') as $item)
            <strong>{{ $item }}</strong>
            @endforeach
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('debt') ? ' has-error' : '' }}">
        <label for="debt" class="col-md-4 control-label">借金</label>

        <input id="debt" type="number" class="form-control" name="debt" value="{{ $user->debt }}" required>

        @if ($errors->has('debt'))
        <span class="help-block">
            @foreach ($errors->get('debt') as $item)
            <strong>{{ $item }}</strong>
            @endforeach </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('duedate') ? ' has-error' : '' }}">
        <label for="duedate" class="col-md-4 control-label">支払い期限</label>

        <input id="duedate" type="date" class="form-control" name="duedate" value="{{ $user->duedate }}" required>

        @if ($errors->has('duedate'))
        <span class="help-block">
            @foreach ($errors->get('duedate') as $item)
            <strong>{{ $item }}</strong>
            @endforeach
        </span>
        @endif
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">
            更新
        </button>
    </div>
</form>
@endsection