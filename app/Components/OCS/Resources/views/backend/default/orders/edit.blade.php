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
                <label>Process Date (<i class="fa fa-star star-validate"></i>)</label>
                <p>{{ $order->process_date }}</p>
            </div>
            <div class="form-group">
                <label>Finish Date (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('finish_date', isset($order) ? $order->finish_date : old('finish_date'), ['class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD', "data-date-format"=>"yyyy-mm-dd"] ) !!}
            </div>
            <div class="form-group">
                <label>Manager</label>
                <p>{{ $order->manager->present()->fullName }}</p>
            </div>
            <div class="form-group">
                <label>Assign To</label>
                {!! Form::select('assigned_to', $customers, isset($order) && $order->histories->first() ? $order->histories->first()->assigned_to : old('assigned_to'), ['class' => 'form-control chosen-select'] ) !!}
            </div>
            <div class="form-group">
                <label>Status</label>
                {!! Form::select('status', $status, isset($order) && $order->histories->first() ? $order->histories->first()->status_id : old('status'), ['class' => 'form-control chosen-select'] ) !!}
            </div>
            <div class="form-group">
                <a href="{{route('backend.ocs.order.index')}}" class="btn btn-warning">Cancel</a>
                {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
            </div>
            {!! Form::close() !!}
            <h3>List Services</h3>
            <table id="list-items" class="table table-striped">
                <tr>
                    <th>Product</th>
                    <th>Service</th>
                    <th>Quantity</th>
                    <th>Is Free</th>
                    <th>Price</th>
                    <th>Note</th>
                </tr>
                @if( $order->details->count() > 0)
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
        <div class="panel-footer">
            <h3>Histories</h3>
            @if( $order->histories->count() > 0)
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Changed By</th>
                    <th>Assigned To</th>
                    <th>Changed Date</th>
                </tr>

            @foreach( $order->histories->all() as $id => $item )
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $item->changed->present()->fullName }}</td>
                    <td>{{ $item->assigned->present()->fullName }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
            </table>
            @else

            @endif
        </div>
    </div>
@stop