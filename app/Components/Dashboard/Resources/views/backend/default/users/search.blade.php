@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            {!! Form::open(['route' => ['api.user.search'], 'method' => 'get', 'id' => 'form-search']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="reset" class="btn btn-warning" value="Reset Form"/>
                {!! Form::submit('Search', ['class' => 'btn btn-success', 'name' => 'search']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="panel-footer">
            <div id="list-results"></div>
        </div>
    </div>
@stop

@section('scripts')
<script>
jQuery(document).ready(function($) {
    $( "#form-search" ).submit(function( event ) {
        event.preventDefault();
        var form = $(this);
        $('#list-results').html('<div class="loading alert alert-success"><i class="fa fa-refresh fa-spin"></i> Loading...</div>');
        $.ajax({
            type : 'GET',
            url : form.attr('action'),
            data : form.serialize(),
            success: function( res ) {
                $('#list-results').html(res);
            }
        });
    });
});
</script>
@stop

