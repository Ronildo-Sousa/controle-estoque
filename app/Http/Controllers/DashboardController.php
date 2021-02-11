<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('category', '=', $categories[0]->id)->get();

        
        return view('dashboard', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('createProduct', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $product = $request->except('_token');

        Product::insert($product);

        $request->session()->flash('success', 'Produto inserido com sucesso!');
        return redirect()->route('admin.index');
    }

    public function edit(Request $request)
    {
        $product = Product::find($request->id);

        return view('editProduct', [
            'product' => $product
        ]);
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->price = $request->price;

        $product->save();

        $request->session()->flash('success', 'Produto atualizado com sucesso!');
        return redirect()->route('admin.index');
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();

        $request->session()->flash('success', 'Produto removido com sucesso!');
        return redirect()->route('admin.index');
    }

    public function searchCategory(Request $request)
    {
        $category = Category::where('id', '=', $request->category)
        ->get();
        $products = Product::where('category', '=', $request->category)->get();

        return view('search', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function createCategory()
    {
        return view('createCategory');
    }

    public function storeCategory(Request $request)
    {
        Category::insert(['name' => $request->name]);

        $request->session()->flash('success', 'Categoria criada com sucesso!');
        return redirect()->route('admin.index');   
    }
}
