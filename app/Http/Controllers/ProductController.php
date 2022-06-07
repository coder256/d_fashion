<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:10'],
            'stock' => ['required', 'numeric'],
            'main_image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'other_images.*' => 'mimes:jpeg,jpg,png|max:2048',
            'shirt_sleeve' => ['nullable', 'numeric'],
            'chest' => ['nullable', 'numeric'],
            'thigh' => ['nullable', 'numeric'],
            'waist' => ['nullable', 'numeric'],
            'trouser_length' => ['nullable', 'numeric'],
        ]);

        $imageNames = [];
        $mainImage = time() . '-main.' . $request->file('main_image')->extension();
        $request->file('main_image')->move(public_path() . '/items/', $mainImage);

        if ($request->hasFile('other_images')) {
            $counter = 1;
            foreach ($request->file('other_images') as $image) {
                $name = time() . '-other-' . $counter . '.' . $image->extension();
                $image->move(public_path() . '/items/', $name);
                //Storage::disk('public')->put('items/'.$name, $image);
                $imageNames[] = $name;
                $counter++;
            }
        }

        $product = new Product([
            'name' => $request->name,
            'gender' => $request->gender,
            'stock' => $request->stock,
            'user_id' => Auth::id(),
            'shirt_sleeve' => $request->get('shirt_sleeve'),
            'chest' => $request->get('chest'),
            'thigh' => $request->get('thigh'),
            'waist' => $request->get('waist'),
            'trouser_length' => $request->get('trouser_length'),
            'main_image' => $mainImage,
            'other_images' => implode(',', $imageNames)
        ]);

        if ($product->save()) {
            session()->flash('message_success', 'Product saved successfully.');
            return redirect('/dashboard/products');
        } else {
            return back()->with('message_danger', 'Failed to save product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
