@extends('menu')

@section('title', '| Finanzen - Neuer Tag')

@section('content')

    {{ Breadcrumbs::render('new tag') }}
    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Neuer Tag</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => 'finance.tag.store']) !!}
            <div class="input-field col s12">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'input-field', 'autofocus']) }}
            </div>
            <div>
                <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5" href="{!! route('finance.tag.index') !!}">Abbrechen<i class="material-icons left">cancel</i></a>
                {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection