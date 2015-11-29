@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            {!! Form::open(['route' => ['backend.ocs.order.update', $order->id], 'method' => 'PUT']) !!}
            {!! Form::hidden('id', $order->id) !!}

            <div class="form-group">
                <label>Order Code (<i class="fa fa-star star-validate"></i>)</label>
                <p>{!!$order->order_code!!}</p>
                {!! $errors->first('order_code', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Customer </label>
                <p>{{ $order->customer->present()->fullName }}</p>
            </div>

            <div class="form-group">
                <label>Organize </label>
                <p>{{ $order->organize->name }}</p>
            </div>

            <div class="form-group">
                <label>Order Address (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('order_address', isset($order) ? $order->order_address : old('order_address'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
            </div>

            <div class="form-group">
                <label>Manager</label>
                {!! Form::select('manager_by', $customers, isset($order) ? $order->manager_by : old('manager_by'), ['class' => 'form-control chosen-select'] ) !!}
            </div>

            <div class="form-group">
                <a href="{{route('backend.ocs.order.index')}}" class="btn btn-warning">Cancel</a>
                {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
            </div>
            {!! Form::close() !!}
            <h3>List Services</h3>
            <table id="list-items" class="table table-stripped">
                <tr>
                    <th>Product</th>
                    <th>Service</th>
                    <th>Quantity</th>
                    <th>Is Free</th>
                    <th>Price</th>
                    <th>Note</th>
                </tr>
                @if( $order->details()->count() > 0)
                    @foreach( $order->details->all() as $detail)
                        <tr>
                            <td>
                                {{$detail->product->title}}
                            </td>
                            <td>{{$detail->service->title}}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->is_free == 1 ? 'Free' : 'No' }}</td>
                            <td>{{ $detail->price }}</td>
                            <td>{{ $detail->note }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr class="table-msg">
                        <td colspan="6">
                            Don't have any products
                        </td>
                    </tr>
                @endif
            </table>
            <div class="form-group">
                <a href="{{route('backend.ocs.order.detail.create', $order->id)}}" class="btn btn-warning">Edit Service</a>
            </div>
        </div>
    </div>
@stop