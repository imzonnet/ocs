@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($product) )
                {!! Form::open(['route' => ['backend.ocs.product.update', $product->id], 'method' => 'PUT']) !!}
                {!! Form::hidden('id', $product->id) !!}
            @else
                {!! Form::open(['route' => 'backend.ocs.product.store', 'method' => 'post']) !!}
            @endif

            <div class="form-group">
                <label>Title (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('title', isset($product) ? $product->title : old('title'), ['class' => 'form-control', 'placeholder' => 'Title'] ) !!}
                {!! $errors->first('title', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Description (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::textarea('description', isset($product) ? $product->description : old('description'), ['class' => 'form-control', 'placeholder' => 'Description'] ) !!}
                {!! $errors->first('description', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <a href="{{route('backend.ocs.product.index')}}" class="btn btn-warning">Cancel</a>
                @if(isset($product))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-primary', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}

        </div>
    </div>


@stop