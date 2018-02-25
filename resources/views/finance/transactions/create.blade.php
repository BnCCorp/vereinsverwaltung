@extends('menu')

@section('title', '| Finanzen - Neue Transaktionen')

@section('content')

    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Neue Transaktionen</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => 'finance.transactions.store']) !!}
                {{ Form::label('invoicedate', 'Rechungsdatum:') }}
                {{ Form::text('invoicedate', null, ['class' => 'datepicker', 'autocomplete' => "off"]) }}

                {{ Form::label('paydate', 'Bezahldatum:') }}
                {{ Form::text('paydate', null, ['class' => 'datepicker', 'autocomplete' => "off"]) }}

                {{ Form::label('purpose', 'Zweck:') }}
                {{ Form::text('purpose', null, ['class' => 'input-field']) }}

                {{--Select --}}
                {{ Form::label('finance_account_id', 'Konto:') }}
                {{ Form::select('finance_account_id', $accounts, null, ['placeholder' => 'Konto wählen...']) }}

                {{ Form::label('amount', 'Betrag:') }}
                {{ Form::text('amount', null, ['class' => 'input-field']) }}

                {{--Select --}}
                {{ Form::label('finance_category_id', 'Kategorie:') }}
                {{ Form::select('finance_category_id', $categories, null, ['placeholder' => 'Kategorie wählen...']) }}

                {{ Form::label('receiptnumber', 'Belegnummer:') }}
                {{ Form::text('receiptnumber', null, ['class' => 'input-field']) }}

                {{--Select --}}
                {{ Form::label('member_id', 'Mitglied:') }}
                {{ Form::select('member_id', $members, null, ['placeholder' => 'Mitglied wählen...']) }}

                {{ Form::label('type', 'Typ:') }} <br>
                {{--{!! Form::radio('type', '1', false, array('id'=>'type')) !!}--}}
                {{--{!! Form::radio('type', '2', false, array('id'=>'type')) !!}--}}
                {!! Form::radio('type', 'Einnahme', true) !!} Einnahme <br>
                {!! Form::radio('type', 'Ausgabe', true) !!} Ausgabe
                <br>

                {{--Select --}}
                {{ Form::label('tag_id', 'Tag:') }}
                {!! Form::select('tag_id', $tags, null, ['multiple' => 'multiple']) !!}




            <div>
                    <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5" href="{{ URL::previous() }}">Abbrechen<i class="material-icons left">cancel</i></a>
                    {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/finance_transaction_create.js') !!}"></script>
@endsection