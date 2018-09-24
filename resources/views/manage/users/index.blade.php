@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title">Manage Users</h1>
        </div>
        <div class="column">
        <a href="{{route('users.create')}}" class="button is-primary"><i class="fa fa-user-plus m-r-10"></i> Create New User</a>
        </div>
    </div>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td>
                    <a class="button is-outlined" href="{{route('users.edit', $user->id)}}">Edit</a>
                    <a class="button is-outlined" href="{{route('users.show', $user->id)}}">Show</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>{!! $users->render() !!}</div>

</div>

@endsection
