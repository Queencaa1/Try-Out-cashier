<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->get();
        return view('category.index', compact('category'));
        // catch (QueryException)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreCategoryRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        // dd($request->file('foto'));
        $foto = $request->file('foto');
        // Storage::put('foto/'.$request->file('foto'));
        $foto->storeAs('gg', $foto->getClientOriginalName());
        Category::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    // public function store(StoreCategoryRequest $request)
    // {
    //     $validated = $request->validated();
    //     DB::beginTransaction();
    //     $foto=$request->file('foto');
    //     $foto -> storeAs('foto'. $foto -> getClientOriginalName());
    //     // $foto->storeAs('foto', $foto->getClientOriginalName());
    //     category::create($request->all());
    //     DB::commit();
    //     return redirect()->back()->with('success', 'Data berhasil di tambahakan');
    // }

    /**s
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $category)
    {
        try {
            DB::beginTransaction();
            $category = category::findOrFail($category);
            $validate = $request->validated();
            $category->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect('/category')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}