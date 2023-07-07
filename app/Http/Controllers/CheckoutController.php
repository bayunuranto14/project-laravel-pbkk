<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //  show the checkout page transaction with tour package, transaction detail , and user 
    //  return to view with items 
    public function index($id)
    {
        $item = Transaction::with(['details', 'concert', 'user'])->findOrFail($id);

        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    // 
    public function process($id)
    {
        $transaction = Transaction::where('users_id', Auth::user()->id)
            ->where('concerts_id', $id)
            ->whereIn('transaction_status', ['IN_CART', 'PENDING'])
            ->first();


        if (!$transaction) {
            $tour_package = Concerts::findOrFail($id);
            $transaction = Transaction::create([
                'concerts_id' => $id,
                'users_id' => Auth::user()->id,
                'transaction_total' => $tour_package->price,
                'transaction_status' => 'IN_CART'
            ]);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'username' => Auth::user()->username,
            ]);
        }
        // return "$transaction->id";
        return redirect()->route('checkout', $transaction->id);
    }

    //
    public function remove($detail_id)
    {
        $item = TransactionDetail::findorFail($detail_id);

        $transaction = Transaction::with(['details', 'concert'])
            ->findOrFail($item->transactions_id);


        $transaction->transaction_total -= $transaction->concert->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }


    //
    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['concert'])->find($id);


        $transaction->transaction_total += $transaction->concert->price;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    //
    public function success($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        return view('pages.success');
    }
}
