<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Slide;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $slide = Slide::all();
        $new_product = Product::where('new', 1)->paginate(4);
        $promotion_product = Product::where('promotion_price', '<>', 0)->paginate(8);
        return view('pages.trangchu', compact('slide', 'new_product', 'promotion_product'));
    }

    public function addCart() {
        
    }

    public function getLoaiSp($type) {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $type_product = ProductType::all();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
        return view('pages.product_type', compact('sp_theoloai', 'type_product', 'sp_khac'));
    }

    public function getDetail($id) {
        
    } 
}
