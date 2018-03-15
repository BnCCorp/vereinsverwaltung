@extends('menu')

@section('title', '| Finanzen - Neues Konte')

@section('content')

    {{ Breadcrumbs::render('new account') }}
    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Neues Konto</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => 'finance.accounts.store']) !!}
            <div class="input-field col s12">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'input-field', 'autofocus']) }}
            </div>

            <div class="col s12">
                {{ Form::label('type', 'Typ:') }}
                {{ Form::select('type', ['Barkasse' => 'Barkasse', 'Girokonto' => 'Girokonto', 'Onlinekonto' => 'Onlinekonto'], null, ['id' => 'account-type', 'placeholder' => 'Typ wählen...', 'onchange' => 'accountTypeChanged()']) }}
            </div>

            <div class="input-field col s12">
                {{ Form::label('startamount', 'Anfangsbetrag:') }}
                {{ Form::text('startamount', null, ['class' => 'input-field']) }}
            </div>

            <div class="input-field col s12">
                {{ Form::label('address', 'IBAN/Email:', ['id' => 'address-label']) }}
                {{ Form::text('address', null, ['class' => 'input-field', 'id' => 'address-input']) }}
            </div>
            <div>
                <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5" href="{!! route('finance.accounts.index') !!}">Abbrechen<i class="material-icons left">cancel</i></a>
                {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/finance_account_create.js') !!}"></script>
@endsection