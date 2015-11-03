@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($role) )
                {!! Form::open(['route' => ['backend.role.update', $role->id], 'method' => 'PUT', 'files' => true]) !!}
                {!! Form::hidden('id', $role->id) !!}
            @else
                {!! Form::open(['route' => 'backend.role.store', 'method' => 'post', 'files' => true]) !!}
            @endif

            <div class="form-group">
                <label>Name (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('name', isset($role) ? $role->name : old('name'), ['class' => 'form-control', 'placeholder' => 'admin'] ) !!}
                {!! $errors->first('name', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Display Name</label>
                {!!Form::text('display_name', isset($role) ? $role->display_name : old('display_name'), ['class' => 'form-control', 'placeholder' => 'Administrator'] ) !!}
                {!! $errors->first('display_name', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Description</label>
                {!!Form::text('description', isset($role) ? $role->description : old('description'), ['class' => 'form-control', 'placeholder' => 'admin'] ) !!}
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>

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