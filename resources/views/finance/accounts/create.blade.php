@extends('menu')

@section('title', '| Finanzen - Konten')

@section('content')

    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Neues Konto</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => 'finance.accounts.store']) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'input-field', 'autofocus']) }}
                {{ Form::label('type', 'Typ:') }}
                {{ Form::select('type', ['Barkasse' => 'Barkasse', 'Girokonto' => 'Girokonto', 'Onlinekonto' => 'Onlinekonto'], null, ['id' => 'account-type', 'placeholder' => 'Typ wählen...', 'onchange' => 'accountTypeChanged()']) }}
                {{ Form::label('startamount', 'Anfangsbetrag:') }}
                {{ Form::text('startamount', null, ['class' => 'input-field']) }}
                {{ Form::label('address', 'IBAN/Email:', ['id' => 'address-label']) }}
                {{ Form::text('address', null, ['class' => 'input-field', 'id' => 'address-input']) }}
                <div>
                    <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5" href="{{ URL::previous() }}">Abbrechen<i class="material-icons left">cancel</i></a>
                    {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/finance_account_create.js') !!}"></script>
@endsection