@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($group) )
                {!! Form::open(['route' => ['backend.group.update', $group->id], 'method' => 'PUT']) !!}
                {!! Form::hidden('id', $group->id) !!}
            @else
                {!! Form::open(['route' => 'backend.group.store', 'method' => 'post']) !!}
            @endif

            <div class="form-group">
                <label>Title (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('title', isset($group) ? $group->title : old('title'), ['class' => 'form-control', 'placeholder' => 'Title'] ) !!}
                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Description (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::textarea('description', isset($group) ? $group->description : old('description'), ['class' => 'form-control', 'placeholder' => 'Description'] ) !!}
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <a href="{{route('backend.group.index')}}" class="btn btn-warning">Cancel</a>
                @if(isset($group))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-primary', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}

        </div>
    </div>


@stop