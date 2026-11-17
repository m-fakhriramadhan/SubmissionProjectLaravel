<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('product.index');
    }

    public function show($id) {
        $id = (int) $id;
        $product = "Produk #" . $id;
        return view('product.show', compact('product'));
    }  
}