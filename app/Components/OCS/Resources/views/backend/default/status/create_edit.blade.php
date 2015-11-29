@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($status) )
                {!! Form::open(['route' => ['backend.ocs.status.update', $status->id], 'method' => 'PUT']) !!}
                {!! Form::hidden('id', $status->id) !!}
            @else
                {!! Form::open(['route' => 'backend.ocs.status.store', 'method' => 'post']) !!}
            @endif

            <div class="form-group">
                <label>Title (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('title', isset($status) ? $status->title : old('title'), ['class' => 'form-control', 'placeholder' => 'Title'] ) !!}
                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>CODE (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('status_code', isset($status) ? $status->status_code : old('status_code'), ['class' => 'form-control', 'placeholder' => 'Title'] ) !!}
                {!! $errors->first('status_code', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Description (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::textarea('description', isset($status) ? $status->description : old('description'), ['class' => 'form-control', 'placeholder' => 'Description'] ) !!}
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <a href="{{route('backend.ocs.status.index')}}" class="btn btn-warning">Cancel</a>
                @if(isset($status))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-primary', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}

        </div>
    </div>


@stop