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
        // $data = Product::with('category')->get();
        $data = Product::join('categories', 'categories.id_category', '=', 'products.id_category')
            ->select('*')
            ->get();
        return view('product.create', compact('data'));
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
        $validatedData = $request->validate([
            'name_product' => 'required',
            'id_category' => 'required',
            'description_product' => 'required',
            'price_product' => 'required|numeric',
            'image_product' => 'required'
        ], [
            'name_product.required' => 'Nama Produk harus diisi',
            'id_category.required' => 'Pilih salah 1 Kategori',
            'description_product.required' => 'Deskripsi Produk harus diisi',
            'price_product.required' => 'Harga Produk harus diisi',
            'price_product.numeric' => 'Harga Produk harus berupa angka',
            'image_product.required' => 'Gambar Produk harus diisi'
        ]);

        $validatedData['image_product'] = $request->file('image_product')->storeAs('photo_product', $validatedData['name_product'] . '.jpg');
        // $validatedData['gambar_produk'] = $request->file('gambar_produk')->storeAs('fotoProduk',$validatedData['name_product'].'.jpg');
        // Product::create([
        //     'name_product' => $request->name_product,
        //     // 'image_product' => $image_product,
        //     'description_product' => $request->description_product,
        //     'price_product' => $request->price_product,
        //     'id_category' => $request->id_category
        // ]);

        Product::create($validatedData);
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
        $data['categories'] = Category::all();
        $data['product'] = Product::find($id_product);

        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_product)
    {
        $validated = $request->validate([
            'name_product' => 'required',
            'id_category' => 'required',
            'description_product' => 'required',
            'price_product' => 'required|numeric',
            'image_product' => 'required'
        ], [
            'name_product.required' => 'Nama Produk harus diisi',
            'id_category.required' => 'Pilih salah 1 Kategori',
            'description_product.required' => 'Deskripsi Produk harus diisi',
            'price_product.required' => 'Harga Produk harus diisi',
            'price_product.numeric' => 'Harga Produk harus berupa angka',
            'image_product.required' => 'Gambar Produk harus diisi'
        ]);
        $checkName = Product::select('*')
            ->where('id_product', $id_product)
            ->get();
        $path = 'storage/' . $checkName[0]->image_product;
        unlink($path);
        $validated['image_product'] = $request->file('image_product')->storeAs('photo_product', $validated['name_product'] . '.jpg');

        Product::where('id_product', $id_product)->update($validated);
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
        $checkName = Product::select('*')
            ->where('id_product', $id_product)
            ->get();
        $path = 'storage/' . $checkName[0]->image_product;
        unlink($path);

        Product::destroy($id_product);
        return redirect('/product');
    }
}
