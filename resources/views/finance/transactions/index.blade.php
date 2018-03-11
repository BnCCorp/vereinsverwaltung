@extends('menu')

@section('title', '| Finanzen - Transaktionen')

@section('content')

    {{ Breadcrumbs::render('transactions') }}
    <a href="{!! route('finance.transactions.create') !!}" class="btn-floating btn-large waves-effect waves-light green btn-category-add"><i class="material-icons">add</i></a>
    <div class="row">
        {{--large 8, offset large 1; medium 8, offset medium 1; small 10, offset small 1--}}
        <div class="col l8 offset-l1 m8 offset-m1 s10 offset-s1">
            <h4>Transaktionen</h4>
        </div>
    </div>
    <div class="row">
        <div class="col l10 offset-l1 m10 offset-m1 s12">
            <table class="striped highlight responsive-table">
            {{--<table class="bordered">--}}
                <thead>
                    <th>#</th>
                    <th>Rechungsdatum</th>
                    <th>Bezahldatum</th>
                    <th>Verwendungszweck</th>
                    <th>Konto</th>
                    <th>Betrag</th>
                    <th>Kategorie</th>
                    <th>Belegnummer</th>
                    <th>Person</th>
                    <th>Tags</th>
                    <th>Typ</th>
                </thead>
                @foreach($transactions as $transaction)
                <tr>
                    <th>{{ $transaction->id }}</th>
                    <td>{{ date("d.m.Y", strtotime($transaction->invoicedate)) }}</td>
                    <td>{{ date("d.m.Y", strtotime($transaction->paydate)) }}</td>
                    {{--sticky width. Nicht schön, aber besser als ein hässliches Design. Grid löst das Problem sicherlich--}}
                    <td style="max-width: 180px;">{{ $transaction->purpose }}</td>
                    {{--Der Eintrag kann, aufgrund von foreignkey, null sein--}}
                    <td>{!! $transaction->finance_account_id ? App\FinanceAccount::find($transaction->finance_account_id)->name : 'undefined' !!}</td>
                    <td>{{ $transaction->amount }}</td>
                    {{--Der Eintrag kann, aufgrund von foreignkey, null sein--}}
                    <td>{!! $transaction->finance_category_id ? App\FinanceCategory::find($transaction->finance_category_id)->name : 'undefined' !!}</td>
                    <td>{{ $transaction->receiptnumber }}</td>
                    {{--Der Eintrag kann, aufgrund von foreignkey, null sein--}}
                    <td>{!! $transaction->member_id ? App\Member::find($transaction->member_id)->lastname : 'undefined' !!}</td>
                    {{--<td>{!! $transaction->tags /* ? $transaction->tags() : 'undefined'*/ !!}</td>--}}
                    <td> @foreach($transaction->tags as $tags) {!! $tags->name !!} <br> @endforeach{{--? $transaction->tags() : 'undefined'--}} </td>
                    <td>{{ $transaction->type }}</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light yellow lighten-1 button-edit">
                            {{ Form::open(['route' => ['finance.transactions.edit', $transaction->id], 'method' => 'get']) }}
                            {{ Form::button('<i class="material-icons left">edit</i>', ['type' => 'submit', 'class' => 'btn-floating waves-effect waves-light yellow lighten-1 button-edit']) }}
                            {{ Form::close() }}
                        </a>
                        <a class="btn-floating waves-effect waves-light red lighten-1">
                            {{ Form::open(['route' => ['finance.transactions.destroy', $transaction->id], 'method' => 'delete']) }}
                            {{ Form::button('<i class="material-icons left">delete</i>', ['type' => 'submit', 'class' => 'btn-floating waves-effect waves-light red lighten-1']) }}
                            {{ Form::close() }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection