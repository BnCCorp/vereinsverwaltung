@extends('menu')

@section('title', '| Finanzen - Neue Transaktionen')

@section('content')

    {{ Breadcrumbs::render('new transaction') }}
    <div class="row">
        <div class="col s8 offset-l2">
            {{--<div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">--}}
            <h4>Neue Transaktionen</h4>
            <div class="divider form-divider"></div>
            <h5>Vorlagen</h5>
            <a class="waves-effect waves-light btn" href="{!! route('finance.transactions.create') !!}">Clear</a>
            <a class="waves-effect waves-light btn" href="{!! action('FinanceTransactionController@bonus'); !!}">Aufwandsentschädigung</a>
            {{--<a class="waves-effect waves-light btn" href="{!! action('FinanceTransactionController@garagerent'); !!}">Garagenmiete</a>--}}
            <br>
            <div class="divider form-divider"></div>
                {!! Form::open(['route' => 'finance.transactions.store']) !!}
                <div class="input-field col s6">
                    {{ Form::label('invoicedate', 'Rechungsdatum:') }}
                    {{ Form::text('invoicedate', null, ['class' => 'datepicker', 'autocomplete' => "off"]) }}
                </div>

                <div class="input-field col s6">
                    {{ Form::label('paydate', 'Bezahldatum:') }}
                    {{ Form::text('paydate', null, ['class' => 'datepicker', 'autocomplete' => "off"]) }}
                </div>

                <div class="input-field col s12">
                    {{ Form::label('purpose', 'Zweck:') }}
                    {{ Form::text('purpose', !empty($transaction) ? $transaction->purpose : null) }}
                </div>

                <div class="input-field col s6">
                    {{ Form::label('receiptnumber', 'Belegnummer:') }}
                    {{ Form::text('receiptnumber', null) }}
                </div>

                <div class="input-field col s6">
                    {{ Form::label('amount', 'Betrag:') }}
                    {{ Form::text('amount', !empty($transaction) ? $transaction->amount : null) }}
                </div>

                <div class="col s6">
                    {{--Select --}}
                    {{ Form::label('finance_account_id', 'Konto:') }}
                    {{ Form::select('finance_account_id', $accounts, "") }}
                </div>

                <div class="col s6">
                    {{--Select --}}
                    {{ Form::label('finance_category_id', 'Kategorie:') }}
                    {{ Form::select('finance_category_id', $categories, !empty($transaction) ? $transaction->finance_category_id : null) }}
                </div>

                <div class=" col s6">
                    {{--Select --}}
                    {{ Form::label('member_id', 'Mitglied:') }}
                    {{ Form::select('member_id', $members, null) }}
                </div>

                <div class="col s6">
                    {{ Form::label('type', 'Art der Transaktion:') }}
                    {{ Form::select('type', ['Ausgabe' => 'Ausgabe', 'Einnahme' => 'Einnahme'], !empty($transaction) ? $transaction->type : null) }}
                </div>

                <div class="col s12">
                    {{--Select --}}
                    {{ Form::label('tag_id', 'Tag:') }}
                    {!! Form::select('tag_id[]', $tags, null, ['multiple' => 'multiple']) !!}
                </div>
                <div>
                    <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5"
                       href="{!! route('finance.transactions.index') !!}">Abbrechen<i class="material-icons left">cancel</i></a>
                    {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/finance_transaction_create.js') !!}"></script>
@endsection