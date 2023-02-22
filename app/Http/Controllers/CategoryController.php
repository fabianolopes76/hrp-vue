<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::query()->paginate(5);

        return Inertia::render('Categories', [
            'data' => $data
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $data = $request->all();

        $category = Category::create($data);
            
        return redirect()->back()
        ->with(['status'=>200, 'message'=>'Registro realizado com sucesso!']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $data = $request->all();

        $category = Category::findOrFail($data['id']);

        if ($category)
        {
            $category->name = $data['name'];
            $category->label = $data['label'];
            $category->background_color = $data['background_color'];
            $category->font_color = $data['font_color'];
            $category->icon = $data['icon'];
            $category->update();
        };
            
        return redirect()->back()
        ->with(['status'=>200, 'message'=>'Registro atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category=Category::findOrFail($category->id)->delete();

        return redirect()->back()
        ->with(['status'=>200, 'message'=>'Registro apagado com sucesso!']);
    }
}
