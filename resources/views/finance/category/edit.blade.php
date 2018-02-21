@extends('menu')

@section('title', '| Finanzen - Editiere Kategorie')

@section('content')

    {{ Breadcrumbs::render('category', $category) }}
    <div class="row">
        <div class="col l8 offset-l2 m8 offset-m2 s10 offset-s1">
            <h4>Editiere Kategorie</h4>
            <div class="divider form-divider"></div>
            {!! Form::open(['route' => ['finance.categories.update', $category->id], 'method' => 'put']) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', $category->name, ['class' => 'input-field']) }}
                {{ Form::label('type', 'Typ:') }}
                {{ Form::select('type', ['Einnahme' => 'Einnahme', 'Ausgabe' => 'Ausgabe'], $category->type, ['placeholder' => 'Typ wählen...']) }}
                <div>
                    <a class="btn btn-submit-form waves-effect waves-light red lighten-1 col l5" href="{{ URL::previous() }}">Abbrechen<i class="material-icons left">cancel</i></a>
                    {{ Form::button('Speichern<i class="material-icons right">send</i>', ['type' => 'submit', 'class' => 'btn btn-submit-form waves-effect waves-light green lighten-1 col l5 offset-l2']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection