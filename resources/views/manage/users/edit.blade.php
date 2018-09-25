@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Create New User</h1>
        </div>
    </div>

    <hr class="m-t-0">


    <form action="{{route('users.update', $user->id)}}" method="post">
    <div class="columns">
        <div class="column">
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

        </div><!-- END .column -->

        <div class="column">
            <label for="roles" class="label">Roles</label>
            <input type="hidden" name="roles" :value="rolesSelected">
            @foreach ($roles as $role)
            <div class="field">
                <b-checkbox v-model="rolesSelected" :native-value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
            </div>
            @endforeach
        </div><!-- END .column -->

    </div><!-- END .columns -->

    <div class="columns">
        <div class="column">
            <button type="submit" class="button is-primary is-pulled-left">Edit User</button>
        </div><!-- END .column -->
    </div><!-- END .columns -->
    </form>
</div><!-- END .flex-vontainer -->

@endsection

@section('scripts')

<script>
    var app = new Vue({
        el: '#app',
        data: {
            password_options: 'keep',
            rolesSelected: {!!$user->roles->pluck('id')!!},
        }
    });

</script>

@endsection
