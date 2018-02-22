<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\FinanceAccount;
use Session;

class FinanceAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = FinanceAccount::all();
        return view('finance.accounts.index')->with('accounts', $accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance.accounts.create');
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
                'name' => 'bail|required|unique:finance_accounts|max:191',
                'type' => ['bail', 'required', 'max:191', Rule::in(['Barkasse', 'Girokonto', 'Onlinekonto'])],
                'startamount' => 'bail|required|numeric',
                'address' => 'bail|required_if:type,Girokonto,Onlinekonto|max:191',
            ],
            [
                'name.required' => 'Der Name darf nicht leer sein!',
                'name.max'      => 'Der Name darf höchstens 191 Zeichen enthalten!',
                'name.unique' => 'Der Name ist bereits vergeben!',
                'type.required' => 'Der Typ darf nicht leer sein!',
                'type.max'      => 'Der Typ darf höchstens 191 Zeichen enthalten!',
                'startamount.required' => 'Der Anfangsbetrag darf nicht leer sein!',
                'startamount.numeric'      => 'Der Anfangsbetrag muss ein Geldbetrag sein!',
                'address.required_if' => 'Die IBAN/Email darf nicht leer sein!',
                'address.max'      => 'Die IBAN/Email darf höchstens 191 Zeichen enthalten!',
            ]
        );

        $account = new FinanceAccount();
        $account->name = $request->name;
        $account->type = $request->type;
        $account->startamount = $request->startamount;
        $account->address = $request->address;

        $account->save();

        Session::flash('success', 'Konto angelegt.');

        return redirect()->route('finance.accounts.index');
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
        $account = FinanceAccount::find($id);
        return view('finance.accounts.edit')->with('account', $account);
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
                'name' => 'bail|required|unique:bankaccounts|max:191',
            ],
            [
                'name.required' => 'Der Name darf nicht leer sein!',
                'name.max'      => 'Der Name darf höchstens 191 Zeichen enthalten!',
                'name.unique' => 'Der Name ist bereits vergeben!',
            ]
        );

        $account = FinanceAccount::find($id);
        $account->name = $request->name;

        $account->save();

        Session::flash('success', 'Änderungen gespeichert.');

        return redirect()->route('finance.accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = FinanceAccount::find($id);
        $account->delete();
        Session::flash('success', 'Konto gelöscht.');
        return redirect()->route('finance.accounts.index');
    }
}
