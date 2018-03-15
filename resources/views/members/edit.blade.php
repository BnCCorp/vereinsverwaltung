@extends('menu')

@section('title', '| Mitglieder - Editiere Mitglied')

@section('content')

    {{ Breadcrumbs::render('member', $member) }}
    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Editiere Mitglied</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => ['members.update', $member->id], 'method' => 'put']) !!}
            <div class="input-field col s6">
                {{ Form::label('firstname', 'Vorname:') }}
                {{ Form::text('firstname', $member->firstname, ['class' => 'input-field', 'autofocus']) }}
            </div>

            <div class="input-field col s6">
                {{ Form::label('lastname', 'Nachname:') }}
                {{ Form::text('lastname', $member->lastname, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s12">
                {{ Form::label('street', 'Straße & Hausnummer:') }}
                {{ Form::text('street', $member->street, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s6">
                {{ Form::label('zipcode', 'PLZ:') }}
                {{ Form::text('zipcode', $member->zipcode, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s6">
                {{ Form::label('city', 'Stadt:') }}
                {{ Form::text('city', $member->city, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s6">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', $member->email, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s6">
                {{ Form::label('phonenumber', 'Telefonnummer:') }}
                {{ Form::text('phonenumber', $member->phonenumber, ['class' => 'input-field']) }}
            </div>
            <div>
                <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5" href="{!! route('members.index') !!}">Abbrechen<i class="material-icons left">cancel</i></a>
                {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection