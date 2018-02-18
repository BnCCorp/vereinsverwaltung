@extends('menu')

@section('title', '| Finanzen - Konten')

@section('content')

    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Neues Konto</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => 'finance.bankaccounts.store']) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'input-field', 'autofocus']) }}
                {{ Form::label('type', 'Typ:') }}
                {{ Form::select('type', ['Barkasse' => 'Barkasse', 'Girokonto' => 'Girokonto', 'Onlinekonto' => 'Onlinekonto'], null, ['id' => 'new-account-type', 'placeholder' => 'Typ wählen...', 'onchange' => 'checkBarkasse()']) }}
                {{ Form::label('startamount', 'Anfangsbetrag:') }}
                {{ Form::text('startamount', null, ['class' => 'input-field']) }}
                {{ Form::label('amount', 'Betrag:') }}
                {{ Form::text('amount', null, ['class' => 'input-field']) }}
                {{ Form::label('address', 'IBAN/Email:') }}
                {{ Form::text('address', null, ['class' => 'input-field', 'id' => 'new-iban']) }}
                {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection