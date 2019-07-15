<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function index(Request $req)
    {
        // login user get
        $user_id = Auth::id();
        // login user's debt get
        $user = User::find($user_id);
        $payments = $user->payments;
        return view('index', ['user' => $user, 'payments' => $payments]);
    }

    public function dispRegister(Request $req)
    {
        return view('payRegister');
    }

    /**
     * pay register
     *
     * @param Request $req
     * @return void
     */
    public function register(Request $req)
    {
        $this->validate($req, Payment::$rules);
        $payment = new Payment;
        $form = $req->all();
        $payment->user_id = Auth::id();
        $payment->fill($form)->save();
        return redirect('/pay/register');
    }

    /**
     * debt pay
     *
     * @param Request $req
     * @return void
     */
    public function pay(Request $req)
    {
        // 支払いを実施。
        $paylist = $req->input('paylist');
        foreach ($paylist as $pay) {
            $payment = new Payment;
            // 借金取得
            $item = $payment->find($pay['id']);
            $diff = $item['debt'] - $pay['payment'];
            $updDebt = $diff <= 0 ? 0 : $diff;
            // 借金更新
            $item->debt = $updDebt;
            $item->save();
        }
        // チェック項目がある借金を支払う
        return ['url' => '/index'];
    }
}
