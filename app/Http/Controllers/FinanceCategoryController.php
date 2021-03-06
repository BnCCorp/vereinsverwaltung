<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FinanceCategory;
use Illuminate\Validation\Rule;
use Session;

class FinanceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FinanceCategory::all();
        return view('finance.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'bail|required|max:191|unique:finance_categories'
            ],
            [
                'name.required' => 'Der Name darf nicht leer sein!',
                'name.bail' => 'Der Name darf nicht leer sein!',
                'name.max'      => 'Der Name darf höchstens 191 Zeichen enthalten!',
                'name.unique' => 'Die Kategorie existiert bereits!'
            ]
        );

        $category = new FinanceCategory;
        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'Kategorie angelegt.');

        return redirect()->route('finance.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = FinanceCategory::find($id);
        return view('finance.category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required|max:191'
            ],
            [
                'name.required' => 'Der Name darf nicht leer sein!',
                'name.max'      => 'Der Name darf höchstens 191 Zeichen enthalten!'
            ]
        );

        $category = FinanceCategory::find($id);
        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'Änderungen gespeichert.');

        return redirect()->route('finance.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = FinanceCategory::find($id);
        $category->delete();
        Session::flash('success', 'Kategorie gelöscht.');
        return redirect()->route('finance.category.index');
    }
}
