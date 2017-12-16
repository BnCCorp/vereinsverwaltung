@extends('menu')

@section('title', '| Finanzen - Editiere Kategorie')

@section('content')

    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h2>Finanzen - Editiere Kategorie</h2>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => ['finance.categories.update', $category->id], 'method' => 'put']) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', $category->name, ['class' => 'input-field']) }}
                {{ Form::label('type', 'Typ:') }}
                {{ Form::select('type', ['Einnahme' => 'Einnahme', 'Ausgabe' => 'Ausgabe'], $category->type, ['placeholder' => 'Typ wählen...']) }}
                {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection