@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($order) )
                {!! Form::open(['route' => ['backend.ocs.order.update', $order->id], 'method' => 'PUT']) !!}
                {!! Form::hidden('id', $order->id) !!}
            @else
                {!! Form::open(['route' => 'backend.ocs.order.store', 'method' => 'post']) !!}
            @endif

            <div class="form-group">
                <label>Order Code (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('order_code', isset($order) ? $order->order_code : old('order_code'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('order_code', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Customer </label>
                {!! Form::select('customer_id', ['Select A Customer'] + $customers, isset($order) ? $order->customer_id : old('customer_id'), ['class' => 'form-control chosen-select'] ) !!}
            </div>

            <div class="form-group">
                <label>Organize </label>
                {!! Form::select('organize_id', ['Select A Organize'] + $organizes->toArray(), isset($order) ? $order->organize_id : old('organize_id'), ['class' => 'form-control chosen-select'] ) !!}
            </div>

            <div class="form-group">
                <label>Order Address (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('order_address', isset($order) ? $order->order_address : old('order_address'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('order_code', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Process Date (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('process_date', isset($order) ? $order->process_date : old('process_date'), ['class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD', "data-date-format"=>"yyyy-mm-dd"] ) !!}
                {!! $errors->first('process_date', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Manager</label>
                {!! Form::select('manager_by', $customers, isset($order) ? $order->manager_by : old('manager_by'), ['class' => 'form-control chosen-select'] ) !!}
            </div>

            <div class="form-group">
                <a href="{{route('backend.ocs.order.index')}}" class="btn btn-warning">Cancel</a>
                @if(isset($order))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-primary', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@stop