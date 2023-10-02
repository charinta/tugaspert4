<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        //get data product 
        $data_product = Product::get();
        return response()->json($data_product);
        //render view dengan view data product
        // return view('product.index', compact('data_product'));
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request) {
        //validate form
        $this->validate($request, [
            'kode_produk'  => 'required',
            'nama_produk' => 'required',
            'harga'  => 'required'
        ]);

        //create product
        Product::create([
            'kode_produk'  => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga'  => $request->harga
        ]);

        //redirect to index
        return response()->json(["success" => "Data Berhasil Disimpan!"]);
    }

    public function show(string $id){
        //get product by id
        $data_product = Product::findOrFail($id);

        //render view with product 
        return response()->json([
            'id' => $data_product->id,
            'kode_produk' => $data_product->kode_produk,
            'nama_produk' => $data_product->nama_produk,
            'harga' => $data_product->harga,
        ]);
    }
    
    public function edit(string $id){
        //get product by id
        $data_product = Product::findOrFail($id);

        //render view with product
        return view('product.edit', compact('data_product'));
    }

    public function update(Request $request, $id){
        //validate form
        $this->validate($request, [
            'kode_produk'  => 'required',
            'nama_produk' => 'required',
            'harga'  => 'required'
        ]);

        //get product by id
        $data_product = Product::findOrFail($id);

        //update product
        $data_product->update([
            'kode_produk'  => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga'  => $request->harga
        ]);

        //redirect to index
        return response()->json(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id){
        //get product by id
        $data_product = Product::findOrFail($id);

        //delete product
        $data_product->delete();
        
        //redirect to index
        return response()->json(['success'=>'Data Berhasil Dihapus!']);
    }
}