@extends('layouts.base')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <div class="header-text">
        新規会員登録
    </div>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">なまえ</label>

        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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

        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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

        <input id="debt" type="number" class="form-control" name="debt" value="{{ old('debt') }}" required>

        @if ($errors->has('debt'))
        <span class="help-block">
            @foreach ($errors->get('debt') as $item)
            <strong>{{ $item }}</strong>
            @endforeach </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('duedate') ? ' has-error' : '' }}">
        <label for="duedate" class="col-md-4 control-label">支払い期限</label>

        <input id="duedate" type="date" class="form-control" name="duedate" value="{{ old('duedate') }}" required>

        @if ($errors->has('duedate'))
        <span class="help-block">
            @foreach ($errors->get('duedate') as $item)
            <strong>{{ $item }}</strong>
            @endforeach
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">パスワード</label>

        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
        <span class="help-block">
            @foreach ($errors->get('password') as $item)
            <strong>{{ $item }}</strong>
            @endforeach
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label">パスワード（確認）</label>

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">
            登録
        </button>
    </div>
</form>
@endsection