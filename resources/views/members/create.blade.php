@extends('menu')

@section('title', '| Mitglieder - Neues Mitglied')

@section('content')

    {{ Breadcrumbs::render('new member') }}
    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Neues Mitglied</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => 'members.store']) !!}
            <div class="input-field col s6">
                {{ Form::label('firstname', 'Vorname:') }}
                {{ Form::text('firstname', null, ['class' => 'input-field', 'autofocus']) }}
            </div>

            <div class="input-field col s6">
                {{ Form::label('lastname', 'Nachname:') }}
                {{ Form::text('lastname', null, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s12">
                {{ Form::label('street', 'Straße & Hausnummer:') }}
                {{ Form::text('street', null, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s6">
                {{ Form::label('zipcode', 'PLZ:') }}
                {{ Form::text('zipcode', null, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s6">
                {{ Form::label('city', 'Stadt:') }}
                {{ Form::text('city', null, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s6">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s6">
                {{ Form::label('phonenumber', 'Telefonnummer:') }}
                {{ Form::text('phonenumber', null, ['class' => 'input-field']) }}
            </div>
                <div>
                    <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5" href="{!! route('members.index') !!}">Abbrechen<i class="material-icons left">cancel</i></a>
                    {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection