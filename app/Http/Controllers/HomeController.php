<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index() {
        return view('home.index');
    }

    public function search(Request $request) {
        if (!Auth::check()) {
            $products = Product::where('name', 'like', '%' . $request->s . '%')
                ->get();
        } else {
            $products = Product::where('name', 'like', '%' . $request->s . '%')
                ->whereBetween('shirt_sleeve', [$request->user()->shirt_sleeve-2, $request->user()->shirt_sleeve+2])
                ->orWhereBetween('chest', [$request->user()->chest-2, $request->user()->chest+2])
                ->orWhereBetween('thigh', [$request->user()->thigh-2, $request->user()->thigh+2])
                ->orWhereBetween('waist', [$request->user()->waist-2, $request->user()->waist+2])
                ->orWhereBetween('trouser_length', [$request->user()->trouser_length-2, $request->user()->trouser_length+2])
                ->get();
        }

        return view('home.search',array(
            "products" => $products
        ));
    }
}
