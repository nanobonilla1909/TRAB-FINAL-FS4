<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {

    	$products = Product::paginate(10);

    	return view('admin.products.index')->with(compact('products')); // listado

    }

	public function create() {


		return view('admin.products.create'); // formulario de registro

	    }

	public function store(Request $request) {

		// dd($request->all());
		$product = new Product();
		$product->name = $request->input('name');
		$product->price = $request->input('price');
		$product->description = $request->input('description');
		$product->long_description = $request->input('long_description');
		$product->save();

		return redirect('/admin/products');

	}


	public function edit($id) {

		$product = Product::find($id);
		return view('admin.products.edit')->with(compact('product')); // formulario de registro

	    }

	public function update(Request $request, $id) {

		// dd($request->all());
		$product = Product::find($id);
		$product->name = $request->input('name');
		$product->price = $request->input('price');
		$product->description = $request->input('description');
		$product->long_description = $request->input('long_description');
		$product->save(); // update

		return redirect('/admin/products');

	}


}
