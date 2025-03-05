<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    private $apiUrl = 'https://656ca88ee1e03bfd572e9c16.mockapi.io/products';

    public function index() {
        $response = Http::get($this->apiUrl);
        $products = $response->json();
        return view('products.index', $products);
    }

    public function create() {
        return view('products.create');
    }

    public function store(StoreProductRequest $request) {
        $response = Http::post($this->apiUrl, $request->validated());

        if($response->successful()) {
            return redirect()->route('products.index')->with('message', 'Product created successfully');
        }

        return back()->withErrors('message', 'Errors during creating new product process');
    }

    public function edit($id) {
        $response = Http::get("$this->apiUrl/$id");

        if($response->successful()) {
            $product = $response->json();

            return view('products.edit', compact('product'));
        }

        return redirect()->rotue('products.index')->withErrors(['message'=>'Product Not Found']);
    }

    public function update(StoreProductRequest $request, $id) {
        $response = Http::put("$this->apiUrl/$id", $request->validated());
        
        if($response->successful()) {
            return redirect()->route('products.index')->withErrors(['success'=>'Product updated successfully']);
        }

        return back()->withErrors(['message'=> 'Errors during update product']);
    }

    public function destroy($id) {
        $response =  Http::delete("$this->apiUrl/$id");

        if($response->successful()) {
            return redirect()->route('products.index')->with(['success'=>'Product deleted successfully']);
        }

        return back()->withErrors(['message'=>'Errors during delete product']);
    }
}
