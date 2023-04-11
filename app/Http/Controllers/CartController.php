<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $carts = DB::table("carts")
                    ->select("*")
                    ->join("products","products.id_product", "=","carts.id_product")
                    ->get();
        $no=1;
        return view('cart.create', compact('product', 'carts','no'));
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
    public function store(Request $request)
    {
        $id_product=$request->id_product;
        $qty=$request->qty;
        $price=$request->price_product;
        $total=$qty*$price;

        $checkData= Cart::select('*')
                        ->where('id_product',$id_product)
                        ->count();
        $data= Cart::select('*')
                    ->where('id_product',$id_product)
                    ->get();
        if($checkData == 0){
            DB::insert('insert into carts(id_product,qty,total) values(?,?,?)',[$id_product,$qty,$total]);
        }else{
            DB::update('update carts set qty='.$data[0]->qty+$qty.' ,total='.$data[0]->total+$total.' where id_product='.$id_product);
        }
        return redirect("/cart/add");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $id_cart)
    {
        $data['products'] = Product::all();
        $data['cart'] = Cart::find($id_cart);

        return view('cart.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update($id_cart , Request $request){
        $find = Cart::find($id_cart);
        $find->update($request->except(['_token']));
        return redirect("/cart");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
