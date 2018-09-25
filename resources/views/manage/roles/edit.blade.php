@extends('layouts.manage')
@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Edit {{$role->display_name}}</h1>
        </div> <!-- end of column -->

    </div>
    <hr class="m-t-0">

    <form action="{{route('roles.update', $role->id)}}" method="post">
        @csrf
        {{method_field('PUT')}}
        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2 class="title">Role Details:</h2>
                                <div class="field">
                                    <p class="control">
                                        <label for="display_name" class="label">Name (Human Readable)</label>
                                        <input type="text" class="input" id="display_name" name="display_name" value="{{$role->display_name}}">
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <label for="name" class="label">Slug (Can not be edited)</label>
                                        <input type="text" class="input" name="name" id="name" value="{{$role->name}}"
                                            disabled>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <label for="description" class="label">Description</label>
                                        <input type="text" class="input" name="description" id="description" value="{{$role->description}}">
                                    </p>
                                </div>
                                <input type="hidden" :value="permissionsSelected" name="permissions">
                            </div><!-- END OF .content -->
                        </div><!-- END OF .media-content -->
                    </article>
                </div>
            </div><!-- END OF .column -->
        </div><!-- END OF .columns -->

        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2 class="title">Permissions:</h2>
                                @foreach ($permissions as $permission)
                                <div class="field">
                                    <b-checkbox v-model="permissionsSelected" :native-value="{{$permission->id}}">{{$permission->display_name}}
                                        <em>({{$permission->description}})</em></b-checkbox>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </article>
                </div><!-- END OF .box -->
                <button class="button is-primary">Save changes to Roles</button>
            </div><!-- END OF .column -->
        </div><!-- END OF .columns -->
    </form>
</div><!-- END OF .flex-container -->

@endsection


@section('scripts')

<script>
    var app = new Vue({
        el: '#app',
        data: {
            permissionsSelected: {!!$role->permissions->pluck('id')!!}
            },
    });

</script>

@endsection
