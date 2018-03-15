@extends('menu')

@section('title', '| Finanzen - Neue Kategorie')

@section('content')

    {{ Breadcrumbs::render('new category') }}
    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Neue Kategorie</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => 'finance.category.store']) !!}
            <div class="input-field col s12">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'input-field', 'autofocus']) }}
            </div>
            <div>
                <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5" href="{!! route('finance.category.index') !!}">Abbrechen<i class="material-icons left">cancel</i></a>
                {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection