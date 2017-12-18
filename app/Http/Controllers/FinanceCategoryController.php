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
                'name' => 'bail|required|max:191',
                'type' => ['bail|required',
                'max:191',
                Rule::in(['Einnahme', 'Ausgabe'])]
            ],
            [
                'name.required' => 'Der Name darf nicht leer sein!',
                'name.max'      => 'Der Name darf höchstens 191 Zeichen enthalten!',
                'type.required' => 'Der Typ darf nicht leer sein!',
                'type.max'      => 'Der Typ darf höchstens 191 Zeichen enthalten!',
                'type.in'       => 'Der Typ muss Einnahme oder Ausgabe sein!'
            ]
        );

        $category = new FinanceCategory;
        $category->name = $request->name;
        $category->type = $request->type;

        $category->save();

        Session::flash('success', 'Kategorie angelegt.');

        return redirect()->route('finance.categories.index');
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
                'name' => 'required|max:191',
                'type' => ['required',
                    'max:191',
                    Rule::in(['Einnahme', 'Ausgabe'])]
            ],
            [
                'name.required' => 'Der Name darf nicht leer sein!',
                'name.max'      => 'Der Name darf höchstens 191 Zeichen enthalten!',
                'type.required' => 'Der Typ darf nicht leer sein!',
                'type.max'      => 'Der Typ darf höchstens 191 Zeichen enthalten!',
                'type.in'       => 'Der Typ muss Einnahme oder Ausgabe sein!'
            ]
        );

        $category = FinanceCategory::find($id);
        $category->name = $request->name;
        $category->type = $request->type;

        $category->save();

        Session::flash('success', 'Änderungen gespeichert.');

        return redirect()->route('finance.categories.index');
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
        return redirect()->route('finance.categories.index');
    }
}
