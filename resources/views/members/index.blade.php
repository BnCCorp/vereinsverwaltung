@extends('menu')

@section('title', '| Mitlgieder')

@section('content')

    {{ Breadcrumbs::render('members') }}
    <a href="{!! route('members.create') !!}" class="btn-floating btn-large waves-effect waves-light green btn-category-add"><i class="material-icons">add</i></a>
    <div class="row">
        {{--large 8, offset large 1; medium 8, offset medium 1; small 10, offset small 1--}}
        <div class="col l8 offset-l1 m8 offset-m1 s10 offset-s1">
            <h4>Mitglieder</h4>
        </div>
    </div>
    <div class="row">
        <div class="col l10 offset-l1 m10 offset-m1 s12">
            <table class="striped highlight responsive-table">
            {{--<table class="bordered">--}}
                <thead>
                    <th>#</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Straße</th>
                    <th>PLZ</th>
                    <th>Stadt</th>
                    <th>Email</th>
                    <th>Telefonnummer</th>
                </thead>
                @foreach($members as $member)
                <tr>
                    <th>{{ $member->id }}</th>
                    <td>{{ $member->firstname }}</td>
                    <td>{{ $member->lastname }}</td>
                    <td>{{ $member->street }}</td>
                    <td>{{ $member->zipcode }}</td>
                    <td>{{ $member->city }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phonenumber }}</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light yellow lighten-1 button-edit">
                            {{ Form::open(['route' => ['members.edit', $member->id], 'method' => 'get']) }}
                            {{ Form::button('<i class="material-icons left">edit</i>', ['type' => 'submit', 'class' => 'btn-floating waves-effect waves-light yellow lighten-1 button-edit']) }}
                            {{ Form::close() }}
                        </a>
                        <a class="btn-floating waves-effect waves-light red lighten-1">
                            {{ Form::open(['route' => ['members.destroy', $member->id], 'method' => 'delete']) }}
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