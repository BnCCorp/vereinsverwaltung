@extends('menu')

@section('title', '| Finanzen - Kategorien')

@section('content')

    <div class="row">
        <div class="col l8 offset-l1 m8 offset-m1 s10 offset-s1">
            <h2>Finanzen - Kategorien</h2>
        </div>
        <div class="col l2 m3 s12">
            <a href="{!! route('finance.categories.create') !!}" class=" btn-large btn-full-width waves-effect waves-light green button-h2"><i class="material-icons left">add</i>Neu</a>
            <!--<a href="{!! route('finance.categories.create') !!}" class=" btn-floating waves-effect waves-light green button-h2"><i class="material-icons left">add</i></a>-->
        </div>
    </div>
    <div class="row">
        <div class="col l8 offset-l1 m10 offset-m1 s12">
            <table class="bordered">
                <thead>
                    <th>#</th>
                    <th>Typ</th>
                    <th>Name</th>
                    <th></th>
                </thead>
                @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->type }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light green lighten-1 button-edit"><i class="material-icons left">search</i></a>
                        <a class="btn-floating waves-effect waves-light yellow lighten-1 button-edit"><i class="material-icons left">edit</i></a>
                        <a class="btn-floating waves-effect waves-light red lighten-1"><i class="material-icons left">delete</i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection