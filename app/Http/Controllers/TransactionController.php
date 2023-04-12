<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = auth()->user()->id;
        $data = Transaction::select("*")
            ->where("id", $id_user)
            ->get();
        $no = 1;
        return view('transaction.create', compact('data', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_user)
    {
        $data = Cart::select("*")
            ->join("products", "products.id_product", "=", "carts.id_product")
            ->where("carts.id", $id_user)
            ->get();
        foreach ($data as $items) {
            Transaction::create([
                'name_product' => $items->name_product,
                'qty' => $items->qty,
                'total_price' => $items->total,
                'id' => $id_user
            ]);
        }
        Cart::where('id', '=', $id_user)->delete();
        return redirect("/transaction");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
