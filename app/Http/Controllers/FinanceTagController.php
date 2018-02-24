<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FinanceTag;
use Illuminate\Validation\Rule;
use Session;

class FinanceTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = FinanceTag::all();
        return view('finance.tag.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance.tag.create');
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
                'name' => 'bail|required|max:191'
            ],
            [
                'name.required' => 'Der Name darf nicht leer sein!',
                'name.bail' => 'Der Name darf nicht leer sein!',
                'name.max'      => 'Der Name darf höchstens 191 Zeichen enthalten!',
            ]
        );

        $tag = new FinanceTag;
        $tag->name = $request->name;

        $tag->save();

        Session::flash('success', 'Kategorie angelegt.');

        return redirect()->route('finance.tag.index');
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
        $tag = FinanceTag::find($id);
        return view('finance.tag.edit')->with('tag', $tag);
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

        $tag = FinanceTag::find($id);
        $tag->name = $request->name;

        $tag->save();

        Session::flash('success', 'Änderungen gespeichert.');

        return redirect()->route('finance.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = FinanceTag::find($id);
        $tag->delete();
        Session::flash('success', 'Kategorie gelöscht.');
        return redirect()->route('finance.tag.index');
    }
}
