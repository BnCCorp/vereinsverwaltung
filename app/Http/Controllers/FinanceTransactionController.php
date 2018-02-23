<?php

namespace App\Http\Controllers;

use App\FinanceAccount;
use App\FinanceCategory;
use App\FinanceTransaction;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;

class FinanceTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = FinanceTransaction::all();
        return view('finance.transactions.index')->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FinanceCategory::pluck('name', 'id');
        $accounts = FinanceAccount::pluck('name', 'id');
        $members = Member::pluck('lastname', 'id');
        return view('finance.transactions.create')->with('categories', $categories)->with('accounts', $accounts)->with('members', $members);
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
                'invoicedate' => 'bail|required|date|before_or_equal:paydate|max:191',
                'paydate' => 'bail|date|required|max:191',
                'purpose' => 'bail|required|string',
                'finance_account_id' => 'bail|required|max:191',
                'amount' => 'bail|required|max:191',
                'finance_category_id' => 'bail|required|max:191',
                'receiptnumber' => 'bail|required|string|max:191|unique:finance_transactions',
                'member_id' => 'bail|required|max:191',
            ],
            [
                'invoicedate.required' => 'Das Rechungsdatum darf nicht leer sein!',
                'invoicedate.date'      => 'Das Rechungsdatum muss ein Datum sein!',
                'invoicedate.max'      => 'Das Rechungsdatum darf höchstens 191 Zeichen enthalten!',
                'invoicedate.before_or_equal' => 'Das Rechungsdatum darf nicht später als das Bezahldatum sein!',
//                'type.required' => 'Der Typ darf nicht leer sein!',
//                'type.max'      => 'Der Typ darf höchstens 191 Zeichen enthalten!',
//                'startamount.required' => 'Der Anfangsbetrag darf nicht leer sein!',
//                'startamount.numeric'      => 'Der Anfangsbetrag muss ein Geldbetrag sein!',
//                'address.required_if' => 'Die IHab /Email darf nicht leer sein!',
//                'address.max'      => 'Die IBAN/Email darf höchstens 191 Zeichen enthalten!',
            ]
        );

//        \Log::info("Member ID: " . $request->member_id);

        $transaction = new FinanceTransaction();
        $transaction->invoicedate = date("Y-m-d",strtotime(str_replace('.','-',$request->invoicedate)));
        $transaction->paydate = date("Y-m-d",strtotime(str_replace('.','-',$request->paydate)));
        $transaction->purpose = $request->purpose;
        $transaction->finance_account_id = $request->finance_account_id;
        $transaction->amount = $request->amount;
        $transaction->finance_category_id = $request->finance_category_id;
        $transaction->receiptnumber = $request->receiptnumber;
        $transaction->member_id = $request->member_id;

        $transaction->save();

        Session::flash('success', 'Transaktion angelegt.');

        return redirect()->route('finance.transactions.index');
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
        $transaction = FinanceTransaction::find($id);
//        return view('finance.transactions.edit')->with('transaction', $transaction);

        $categories = FinanceCategory::pluck('name', 'id');
        $accounts = FinanceAccount::pluck('name', 'id');
        $members = Member::pluck('lastname', 'id');
        return view('finance.transactions.edit')->with('transaction', $transaction)->with('categories', $categories)->with('accounts', $accounts)->with('members', $members);
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
//                'name' => 'bail|required|unique:finance_transactions|max:191',
            ],
            [
//                'name.required' => 'Der Name darf nicht leer sein!',
//                'name.max'      => 'Der Name darf höchstens 191 Zeichen enthalten!',
//                'name.unique' => 'Der Name ist bereits vergeben!',
//                'receiptnumber' => 'bail|required|string|max:191|unique:finance_transactions,' . $this->receiptnumber->id,
            ]
        );

        $transaction = new FinanceTransaction();
        $transaction->invoicedate = date("Y-m-d",strtotime(str_replace('.','-',$request->invoicedate)));
        $transaction->paydate = date("Y-m-d",strtotime(str_replace('.','-',$request->paydate)));
        $transaction->purpose = $request->purpose;
        $transaction->finance_account_id = $request->finance_account_id;
        $transaction->amount = $request->amount;
        $transaction->finance_category_id = $request->finance_category_id;
        $transaction->receiptnumber = $request->receiptnumber;
        $transaction->member_id = $request->member_id;

        $transaction->save();

        Session::flash('success', 'Änderungen gespeichert.');

        return redirect()->route('finance.transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = FinanceTransaction::find($id);
        $transaction->delete();
        Session::flash('success', 'Transaktion gelöscht.');
        return redirect()->route('finance.transactions.index');
    }
}
