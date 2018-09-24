@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title">Log In</h1>
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="field">
                        <label for="email" class="label">Email Address</label>
                        <p class="control">
                            <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email"
                                id="email" placeholder="name@example.com" value="{{old('email')}}" required>
                        </p>
                        @if($errors->has('email'))
                        <p class="help is-danger">
                            <strong>{{$errors->first('email')}}</strong>
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <p class="control">
                            <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password"
                                id="password" required>
                        </p>
                        @if($errors->has('password'))
                        <p class="help is-danger">
                            <strong>{{$errors->first('password')}}</strong>
                        </p>
                        @endif
                    </div>

                    <b-checkbox name="remember" class="m-t-20">Remember Me</b-checkbox>

                    <button class="button is-primary is-fullwidth is-outline m-t-30">Log In</button>
                </form>
            </div><!-- END .card-content -->
        </div><!-- END .card -->
        <h5 class="has-text-centered m-t-20">
            <a href="{{route('password.request')}}" class="is-muted">Forgot Your Password</a>
        </h5>
    </div>
</div>

@endsection
