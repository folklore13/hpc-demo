<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view("dashboard.categories", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('manage-data')) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        Alert::success('Data Created!', 'Berhasil upload kategori baru');


        Category::create($validated);


        return redirect()->to('/categories')->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $data = $category->get();
        return view('dashboard.categories', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if (!Gate::allows('manage-data')) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $category->updateOrFail($validated);
        Alert::success('Berhasil update kategori', 'Update successful!');

        return redirect()->to('/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!Gate::allows('manage-data')) {
            abort(403);
        }

        Alert::success('Berhasil!', 'Kategori berhasil dihapus');
        $category->deleteOrFail();

        return redirect()->to('/categories');
    }
}
