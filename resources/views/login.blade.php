@extends('layouts.base')

@section('title','ログインページ')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="header-text">
        ログイン
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">メールアドレス</label>
        <input id="email" type="email" class="form-control w-100" name="email" value="{{ old('email') }}" required
            autofocus>
        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">パスワード</label>
        <input id="password" type="password" class="form-control" name="password" required>
        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <div class="checkbox text-center">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                ログインを保持する。
            </label>
        </div>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">
            ログイン
        </button>
    </div>
    <div class="text-center">
        <a class="btn btn-link" href="{{ route('password.request') }}">
            パスワードを忘れた方へ
        </a>
    </div>
</form>
@endsection