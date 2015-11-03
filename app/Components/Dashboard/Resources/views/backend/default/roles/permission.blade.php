@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <label><input type="checkbox" name="check_all" id="check_all"/> Check All</label>
        </div>
        <div class="panel-body">
            {!! Form::open(['route' => ['backend.role.permission.store', $role->id], 'method' => 'POST']) !!}

            @foreach( $permissions as $name => $perms )
                <fieldset class="group-permission">
                    <legend> {{ $name }}</legend>
                    <div id="group-{{ $name }}" class="form-group">
                        @foreach( $perms as $id => $key )
                            <label>{!!Form::checkbox('perms[]', $id, in_array($id, $currentPerms) ? true : false ) !!} {{ $key }} </label>
                        @endforeach
                    </div>
                </fieldset>

            @endforeach

            <div class="form-group">
                <a href="{{route('backend.role.index')}}" class="btn btn-warning">Cancel</a>
                @if(isset($role))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-primary', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}

        </div>
    </div>

@stop

@section('scripts')
    <script>
        (function($) {
            $('#check_all').change(function() {
                if( $(this).is(':checked') ) {
                    $('input[name="perms[]"]').prop('checked', true);
                } else {
                    $('input[name="perms[]"]').prop('checked', false);
                }
            });
        }(jQuery));
    </script>
@stop