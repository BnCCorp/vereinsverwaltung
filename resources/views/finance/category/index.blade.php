@extends('menu')

@section('title', '| Finanzen - Kategorien')

@section('content')

    {{ Breadcrumbs::render('categories') }}
    <a href="{!! route('finance.category.create') !!}" class="btn-floating btn-large waves-effect waves-light green btn-category-add"><i class="material-icons">add</i></a>
    <div class="row">
        {{--large 8, offset large 1; medium 8, offset medium 1; small 10, offset small 1--}}
        <div class="col l8 offset-l1 m8 offset-m1 s10 offset-s1">
            <h4>Kategorien</h4>
        </div>
    </div>
    <div class="row">
        <div class="col l10 offset-l1 m10 offset-m1 s12">
            <table class="bordered">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                </thead>
                @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light yellow lighten-1 button-edit">
                            {{ Form::open(['route' => ['finance.category.edit', $category->id], 'method' => 'get']) }}
                            {{ Form::button('<i class="material-icons left">edit</i>', ['type' => 'submit', 'class' => 'btn-floating waves-effect waves-light yellow lighten-1 button-edit']) }}
                            {{ Form::close() }}
                        </a>
                        <a class="btn-floating waves-effect waves-light red lighten-1">
                            {{ Form::open(['route' => ['finance.category.destroy', $category->id], 'method' => 'delete']) }}
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