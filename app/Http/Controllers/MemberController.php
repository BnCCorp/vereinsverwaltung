<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Session;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
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
                'firstname' => 'bail|required|max:191',
                'lastname' => 'bail|required|max:191',
                'street' => 'bail|required|max:191',
                'zipcode' => 'bail|required|max:191',
                'city' => 'bail|required|max:191',
                'email' => 'bail|required|unique:members|email|max:191',
                'phonenumber' => 'bail|max:191',
            ],
            [
                'firstname.required' => 'Der Vorname darf nicht leer sein!',
                'firstname.max'      => 'Der Vorname darf höchstens 191 Zeichen enthalten!',
                'lastname.required' => 'Der Nachname darf nicht leer sein!',
                'lastname.max'      => 'Der Nachname darf höchstens 191 Zeichen enthalten!',
                'street.required' => 'Der Straße darf nicht leer sein!',
                'street.max'      => 'Der Straße darf höchstens 191 Zeichen enthalten!',
                'zipcode.required' => 'Der PLZ darf nicht leer sein!',
                'zipcode.max'      => 'Der PLZ darf höchstens 191 Zeichen enthalten!',
                'city.required' => 'Der Stadt darf nicht leer sein!',
                'city.max'      => 'Der Stadt darf höchstens 191 Zeichen enthalten!',
                'email.required' => 'Der Email darf nicht leer sein!',
                'email.unique' => 'Der Email ist bereits vergeben!',
                'email.email' => 'Das ist keine gültige Email-Adresse!',
                'email.max'      => 'Der Email darf höchstens 191 Zeichen enthalten!',
                'phonenumber.max'      => 'Der Telefonnummer darf höchstens 191 Zeichen enthalten!',
            ]
        );

        $member = new Member();
        $member->firstname = $request->firstname;
        $member->lastname = $request->lastname;
        $member->street = $request->street;
        $member->zipcode = $request->zipcode;
        $member->city = $request->city;
        $member->email = $request->email;
        $member->phonenumber = $request->phonenumber;

        $member->save();

        Session::flash('success', 'Mitglied angelegt.');

        return redirect()->route('members.index');
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
        $member = Member::find($id);
        return view('members.edit')->with('member', $member);
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
        $member = Member::find($id);
        $this->validate($request,
            [
                'firstname' => 'bail|required|max:191',
                'lastname' => 'bail|required|max:191',
                'street' => 'bail|required|max:191',
                'zipcode' => 'bail|required|max:191',
                'city' => 'bail|required|max:191',
                'email' => 'bail|required|unique:members,email, '. $member->id .'|email|max:191',
                // unique:finance_transactions,receiptnumber,'. $transaction->id .'
                'phonenumber' => 'bail|max:191',
            ],
            [
                'firstname.required' => 'Der Vorname darf nicht leer sein!',
                'firstname.max'      => 'Der Vorname darf höchstens 191 Zeichen enthalten!',
                'lastname.required' => 'Der Nachname darf nicht leer sein!',
                'lastname.max'      => 'Der Nachname darf höchstens 191 Zeichen enthalten!',
                'street.required' => 'Der Straße darf nicht leer sein!',
                'street.max'      => 'Der Straße darf höchstens 191 Zeichen enthalten!',
                'zipcode.required' => 'Der PLZ darf nicht leer sein!',
                'zipcode.max'      => 'Der PLZ darf höchstens 191 Zeichen enthalten!',
                'city.required' => 'Der Stadt darf nicht leer sein!',
                'city.max'      => 'Der Stadt darf höchstens 191 Zeichen enthalten!',
                'email.required' => 'Der Email darf nicht leer sein!',
                'email.unique' => 'Der Email ist bereits vergeben!',
                'email.max'      => 'Der Email darf höchstens 191 Zeichen enthalten!',
                'email.email' => 'Das ist keine gültige Email-Adresse!',
                'phonenumber.max'      => 'Der Telefonnummer darf höchstens 191 Zeichen enthalten!',
            ]
        );

        $member->firstname = $request->firstname;
        $member->lastname = $request->lastname;
        $member->street = $request->street;
        $member->zipcode = $request->zipcode;
        $member->city = $request->city;
        $member->email = $request->email;
        $member->phonenumber = $request->phonenumber;

        $member->save();

        Session::flash('success', 'Änderungen gespeichert.');

        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        Session::flash('success', 'Mitglied gelöscht.');
        return redirect()->route('members.index');
    }
}
