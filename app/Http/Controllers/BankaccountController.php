<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 06.02.2018
 * Time: 09:41
 */

namespace App\Http\Controllers;

use App\Bankaccount;
use Illuminate\Http\Request;
use Session;

/**
 * Class BankaccountController
 * @package App\Http\Controllers
 */
class BankaccountController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankaccounts = Bankaccount::all();
        return view('bankaccounts.index')->with('bankaccounts', $bankaccounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bankaccounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *  $table->string('name')->unique();
        $table->string('type');
        $table->string('startamount');
        $table->string('amount');
        $table->string('address')
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'bail|required|unique:name|max:191',
                'type' => 'bail|required|max:191',
                'startamount' => 'bail|required|max:191',
                'amount' => 'bail|required|max:191',
                'address' => 'bail|required|unique:address|max:191',
            ],
            [
                'name.required' => 'Der Name darf nicht leer sein!',
                'name.max'      => 'Der Name darf höchstens 191 Zeichen enthalten!',
                'name.unique' => 'Der Name ist bereits vergeben!',
                'type.required' => 'Der Typ darf nicht leer sein!',
                'type.max'      => 'Der Typ darf höchstens 191 Zeichen enthalten!',
                'startamount.required' => 'Der Anfangsbetrag darf nicht leer sein!',
                'startamount.max'      => 'Der Anfangsbetrag darf höchstens 191 Zeichen enthalten!',
                'amount.required' => 'Der Betrag darf nicht leer sein!',
                'amount.max'      => 'Der Betrag darf höchstens 191 Zeichen enthalten!',
                'address.required' => 'Die IBAN/Email darf nicht leer sein!',
                'address.max'      => 'Die IBAN/Email darf höchstens 191 Zeichen enthalten!',
                'address.unique' => 'Die IBAN/Email ist bereits vergeben!',
            ]
        );

        $bankaccount = new Bankaccount();
        $bankaccount->name = $request->name;
        $bankaccount->type = $request->type;
        $bankaccount->startamount = $request->startamount;
        $bankaccount->amount = $request->amount;
        $bankaccount->address = $request->address;

        $bankaccount->save();

        Session::flash('success', 'Konto angelegt.');

        return redirect()->route('bankaccounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bankaccount = Bankaccount::find($id);
        return view('bankaccounts.edit')->with('bankaccount', $bankaccount);
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
                'name' => 'bail|required|unique:name|max:191',
                'type' => 'bail|required|max:191',
                'startamount' => 'bail|required|max:191',
                'amount' => 'bail|required|max:191',
                'address' => 'bail|required|unique:address|max:191',
            ],
            [
                'name.required' => 'Der Name darf nicht leer sein!',
                'name.max'      => 'Der Name darf höchstens 191 Zeichen enthalten!',
                'name.unique' => 'Der Name ist bereits vergeben!',
                'type.required' => 'Der Typ darf nicht leer sein!',
                'type.max'      => 'Der Typ darf höchstens 191 Zeichen enthalten!',
                'startamount.required' => 'Der Anfangsbetrag darf nicht leer sein!',
                'startamount.max'      => 'Der Anfangsbetrag darf höchstens 191 Zeichen enthalten!',
                'amount.required' => 'Der Betrag darf nicht leer sein!',
                'amount.max'      => 'Der Betrag darf höchstens 191 Zeichen enthalten!',
                'address.required' => 'Die IBAN/Email darf nicht leer sein!',
                'address.max'      => 'Die IBAN/Email darf höchstens 191 Zeichen enthalten!',
                'address.unique' => 'Die IBAN/Email ist bereits vergeben!',
            ]
        );

        $bankaccount = Bankaccount::find($id);
        $bankaccount->name = $request->name;
        $bankaccount->type = $request->type;
        $bankaccount->startamount = $request->startamount;
        $bankaccount->amount = $request->amount;
        $bankaccount->address = $request->address;

        $bankaccount->save();

        Session::flash('success', 'Änderungen gespeichert.');

        return redirect()->route('bankaccounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bankaccount = Bankaccount::find($id);
        $bankaccount->delete();
        Session::flash('success', 'Konto gelöscht.');
        return redirect()->route('bankaccounts.index');
    }
}