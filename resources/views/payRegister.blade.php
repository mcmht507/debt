@extends('layouts.base')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('pay.register') }}">
    {{ csrf_field() }}

    <div class="header-text">
        支払い項目登録
    </div>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">支払い項目</label>

        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
        <label for="dueday" class="col-md-4 control-label">支払日</label>

        <input id="dueday" type="number" min="1" max="31" class="form-control" name="dueday" value="{{ old('dueday') }}" required>

        @if ($errors->has('dueday'))
        <span class="help-block">
            <strong>{{ $errors->first('dueday') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('debt') ? ' has-error' : '' }}">
        <label for="debt" class="col-md-4 control-label">借金</label>

        <input id="debt" type="number" class="form-control" name="debt" value="{{ old('debt') }}" required>

        @if ($errors->has('debt'))
        <span class="help-block">
            <strong>{{ $errors->first('debt') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('payment') ? ' has-error' : '' }}">
        <label for="payment" class="col-md-4 control-label">支払い金額<br>※毎月の支払い金額の初期値</label>

        <input id="payment" type="number" class="form-control" name="payment" value="{{ old('payment') }}" required>

        @if ($errors->has('payment'))
        <span class="help-block">
            <strong>{{ $errors->first('payment') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">
            登録
        </button>
    </div>
</form>
@endsection