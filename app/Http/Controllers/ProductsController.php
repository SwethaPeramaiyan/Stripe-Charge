<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    // Get all products from products table
    public function get_products() {
        try {
            $all_products = Product::all();
            return view('products',['products' => $all_products]);
        } catch (Throwable $e) {
            report($e);     
            return false;
        }
    }

    /**
     * Get single product details
     *
     * @param integer $id => product id     
     */
    public function view_product($id) {
        try {
            $user = auth()->user();
            $product = Product::find($id);
            return view('view-product',['product' => $product, 'intent' => $user->createSetupIntent()]);
        } catch (Throwable $e) {
            report($e);     
            return false;
        }
    }
}
