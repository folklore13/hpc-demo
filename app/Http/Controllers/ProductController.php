<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        $categories = Category::all();

        return view('dashboard.products', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('manage-data')) {
            abort(403);
        }

        $newProduct = Validator::make($request->all(), [
            'name' => 'required|string',
            'category_id' => 'required',
            'description' => 'required|string',
            'price' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp,gif|max:2048'
        ]);

        if ($newProduct->fails()) {
            Alert::error($newProduct->errors()->first());
            return back();
        }
        $imageName = time() . '-' . $newProduct->validated()['name'] . '.' . $request->image->extension();

        Alert::success('Berhasil!', 'Product baru berhasil ditambahkan');

        Storage::disk('public')->putFileAs('images', $request->file('image'), $imageName);

        if ($product = Product::create($newProduct->validated())) {
            $product->image = $imageName;
            $product->save();
        }
        ;

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $data = $product->get();
        return view('dashboard.products', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if (!Gate::allows('manage-data')) {
            abort(403);
        }
        $data = Validator::make($request->all(), [
            'name' => 'required|string|min:8',
            'category_id' => 'numeric',
            'description' => 'required|string|min:10',
            'price' => 'required|numeric',
            'image' => 'file|image|mimes:png,jpg,jpeg,webp|max:1024'
        ]);

        if ($data->fails()) {
            Alert::error($data->errors()->first());
            return back();
        }
        $imageName = '';

        Storage::disk('public')->delete('images/' . $product->image);
        Storage::disk('public')->putFileAs('images', $imageName);
        Alert::success("Update successful!", "Produk berhasil diupdate");

        $product->updateOrFail($data->validated());

        return redirect()->to('/products')->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (!Gate::allows('manage-data')) {
            abort(403);
        }

        Storage::delete($product->image);

        Alert::success('Delete successful!', 'Produk berhasil dihapus');
        $product->deleteOrFail();

        return back();
    }
}
