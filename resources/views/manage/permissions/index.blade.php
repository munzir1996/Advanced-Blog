@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title">Manage Users</h1>
        </div>
        <div class="column">
        <a href="{{route('permissions.create')}}" class="button is-primary"><i class="fa fa-user-plus m-r-10"></i> Create Permission</a>
        </div>
    </div>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
            <tr>
                <td>{{$permission->display_name}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->description}}</td>
                <td>
                    <a class="button is-outlined" href="{{route('permissions.edit', $permission->id)}}">Edit</a>
                    <a class="button is-outlined" href="{{route('permissions.show', $permission->id)}}">Show</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>

@endsection
