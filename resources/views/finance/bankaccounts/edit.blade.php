@extends('menu')

@section('title', '| Finanzen - Editiere Konto')

@section('content')

    {{ Breadcrumbs::render('bankaccount', $bankaccount) }}
    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Editiere Konto</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => ['finance.categories.update', $bankaccount->id], 'method' => 'put']) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', $bankaccount->name, ['class' => 'input-field']) }}
                {{ Form::label('type', 'Typ:') }}
                {{ Form::select('type', ['Barkasse' => 'Barkasse', 'Girokonto' => 'Girokonto', 'Onlinekonto' => 'Onlinekonto'], $bankaccount->type, ['placeholder' => 'Typ wählen...']) }}
                {{ Form::label('startamount', 'Anfangsbetrag:') }}
                {{ Form::text('startamount', $bankaccount->startamount, ['class' => 'input-field']) }}
                {{ Form::label('amount', 'Betrag:') }}
                {{ Form::text('amount', $bankaccount->amount, ['class' => 'input-field']) }}
                {{ Form::label('address', 'IBAN/Email:') }}
                {{ Form::text('address', $bankaccount->address, ['class' => 'input-field']) }}
                {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection