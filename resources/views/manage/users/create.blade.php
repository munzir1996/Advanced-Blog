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
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="field">
                    <label for="name" class="label">Name:</label>
                    <p class="control">
                        <input type="text" class="input" name="name" id="name" required>
                    </p>
                </div>

                <div class="field">
                    <label for="email" class="label">Email:</label>
                    <p class="control">
                        <input type="text" class="input" name="email" id="email" required>
                    </p>
                </div>

                <div class="field">
                    <label for="password" class="label">Password:</label>
                    <p class="control">
                        <input type="password" class="input" name="password" id="password" v-if="!auto_password"
                            placeholder="Manually Give Password" required>
                        <b-checkbox name="auto_generate" v-model="auto_password" class="m-t-10">Auto Generated Password</b-checkbox>
                    </p>
                </div>

                <button type="submit" class="button is-success">Create User</button>

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
            auto_password: true
        }
    });

</script>

@endsection
