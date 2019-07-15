@extends('layouts.base')

@section('title','支払いページ')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('pay.pay') }}">
    {{ csrf_field() }}
    <div class="header-text">
        支払いページ
    </div>
    <div class="user-info text-center">
        <p>{{ $user->name }}</p>
        <p>支払い期限：{{ $user->duedate }}</p>
        <p>金額：<span class="currency-filed">{{ $user->debt }}</span></p>
    </div>

    <div class="pay-header text-center">
        支払い項目一覧
    </div>
    <table class="table pay-table">
        <thead>
            <tr>
                <th>支払う</th>
                <th>支払項目</th>
                <th>金額</th>
                <th>支払日</th>
                <th>支払額</th>
            </tr>
        </thead>
        <tbody class="pay-tbody">
            @foreach ($payments as $payment)
            <tr class="pay-row">
                <td class="pay-check-item">
                    <input type='checkbox' name="pay-check" value='{{ $payment->id }}' id=''>
                </td>
                <td class="pay-name">{{ $payment->name }}</td>
                <td class="pay-debt">{{ $payment->debt }}</td>
                <td class="pay-dueday">{{ $payment->dueday }}</td>
                <td class="pay-payment"><input type='number' value="{{ $payment->payment}}"> </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="form-group text-center">
        <button type="button" id="pay-submit" class="btn btn-primary">
            支払い
        </button>
    </div>
</form>
<script src='/js/index.js'></script>
@endsection