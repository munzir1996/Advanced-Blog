@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Create New User</h1>
        </div>
    </div>

    <hr class="m-t-0">

    <div class="columns">
        <div class="column">
            <form action="{{route('users.update', $user->id)}}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="field">
                    <label for="name" class="label">Name:</label>
                    <p class="control">
                        <input type="text" class="input" name="name" id="name" value="{{$user->name}}">
                    </p>
                </div>

                <div class="field">
                    <label for="email" class="label">Email:</label>
                    <p class="control">
                        <input type="text" class="input" name="email" id="email" value="{{$user->email}}">
                    </p>
                </div>

                <div class="field">
                    <label for="password" class="label">Password:</label>
                    <p class="control">
                        <div class="field">
                            <b-radio native-value="keep" name="password_options" v-model="password_options">
                                Do Not Change Password
                            </b-radio>
                        </div>
                        <div class="field">
                            <b-radio native-value="auto" name="password_options" v-model="password_options">
                                Auto-generate New Password
                            </b-radio>
                        </div>
                        <div class="field">
                            <b-radio native-value="manual" name="password_options" v-model="password_options">
                                Manually Set New Password
                            </b-radio>
                        </div>
                        <input type="password" class="input" name="password" id="password" v-if="password_options == 'manual'"
                            placeholder="Manually Give Password" required>
                    </p>
                </div>

                <button type="submit" class="button is-primary">Edit User</button>

            </form>
        </div>
    </div>

</div><!-- END .flex-vontainer -->

@endsection

@section('scripts')

<script>
    var app = new Vue({
        el: '#app',
        data: {
            password_options: 'keep'
        }
    });

</script>

@endsection
