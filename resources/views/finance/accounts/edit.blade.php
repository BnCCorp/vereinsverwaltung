@extends('menu')

@section('title', '| Finanzen - Editiere Konto')

@section('content')

    {{ Breadcrumbs::render('account', $account) }}
    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Editiere Konto</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => ['finance.accounts.update', $account->id], 'method' => 'put']) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', $account->name, ['class' => 'input-field', 'autofocus']) }}
                <div>
                    <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5" href="{{ URL::previous() }}">Abbrechen<i class="material-icons left">cancel</i></a>
                    {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection