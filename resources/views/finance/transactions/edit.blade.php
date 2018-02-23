@extends('menu')

@section('title', '| Finanzen - Editiere Transaktione')

@section('content')

    {{--{{ Breadcrumbs::render('account', $account) }}--}}
    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Editiere Transaktion</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => ['finance.transactions.update', $transaction->id], 'method' => 'put']) !!}
                {{ Form::label('invoicedate', 'Rechungsdatum:') }}
                {{ Form::text('invoicedate', date("d.m.Y", strtotime($transaction->invoicedate)), ['class' => 'datepicker', 'autocomplete' => "off"]) }}

                {{ Form::label('paydate', 'Bezahldatum:') }}
                {{ Form::text('paydate', date("d.m.Y", strtotime($transaction->paydate)), ['class' => 'datepicker', 'autocomplete' => "off"]) }}

                {{ Form::label('purpose', 'Zweck:') }}
                {{ Form::text('purpose', $transaction->purpose, ['class' => 'input-field']) }}

                {{--Select --}}
                {{ Form::label('finance_account_id', 'Konto:') }}
                {{ Form::select('finance_account_id', $accounts, $transaction->finance_account_id, ['placeholder' => 'Typ wählen...']) }}

                {{ Form::label('amount', 'Betrag:') }}
                {{ Form::text('amount', $transaction->amount, ['class' => 'input-field']) }}

                {{--Select --}}
                {{ Form::label('finance_category_id', 'Kategorie:') }}
                {{ Form::select('finance_category_id', $categories, $transaction->finance_category_id, ['placeholder' => 'Typ wählen...']) }}

                {{ Form::label('receiptnumber', 'Belegnummer:') }}
                {{ Form::text('receiptnumber', $transaction->receiptnumber, ['class' => 'input-field']) }}

                {{--Select --}}
                {{ Form::label('member_id', 'Mitlgied:') }}
                {{ Form::select('member_id', $members, $transaction->member_id, ['placeholder' => 'Typ wählen...']) }}
                <div>
                    <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5" href="{{ URL::previous() }}">Abbrechen<i class="material-icons left">cancel</i></a>
                    {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/finance_transaction_edit.js') !!}"></script>
@endsection