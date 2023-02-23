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
        ->with(['status'=>200,
        'toast' => ['message'=>'Registro realizado com sucesso!',
                    'icon' => 'Check icon',
                    'svg' => 'M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z',
                    'submessage' => '',
                    ],
        'message'=>'Registro realizado com sucesso!']);

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
        ->with(['status'=>200,
        'toast' => ['message'=>'Registro atualizado com sucesso!',
                    'icon' => 'Check icon',
                    'svg' => 'M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z',
                    'submessage' => '',
                    ],
        'message'=>'Registro atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category=Category::findOrFail($category->id)->delete();

        return redirect()->back()
        ->with(['status'=>200,
        'toast' =>['message'=>'Registro apagado com sucesso!',
                    'icon' => 'Error icon',
                    'svg' => 'M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z',
                    'submessage' => '',
                    ],
        'message'=>'Registro apagado com sucesso!']);
    }
}
