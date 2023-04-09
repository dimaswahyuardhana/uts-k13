<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with('category')->get();
        return view('product.create', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();

        return view('product.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'name_product' => 'required',
            'id_category' => 'required',
            'description_product' => 'required',
            'price_product' => 'required',
            // 'image_product' => 'required',
            // {{  }}
        ]);
        // $image_product = $request->file('image_product')->store('Product', 'public');
        Product::create([
            'name_product' => $request->name_product,
            // 'image_product' => $image_product,
            'description_product' => $request->description_product,
            'price_product' => $request->price_product,
            'id_category' => $request->id_category
        ]);

        Product::create($$validatedData);
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product)
    {
        $data['product'] = Product::find($id_product);
        $Category = Category::all();
        return view('product.edit', $data,$Category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_product' => 'required',
            'description_product' => 'required',
            'price_product' => 'required',
            'id_category' => 'required'
        ]);

        $update = Product::where(['id'=> $id])->update([
            'name_product' => $request->name_product,
            'description_product' => $request->description_product,
            'price_product' => $request->price_product,
            'id_category' => $request->id_category
        ]);


        Product::where('id_product', $id)->update($validatedData);
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_product)
    {
       $delete = Product::find($id_product)->delete();
        return redirect('produk');
    }
}
