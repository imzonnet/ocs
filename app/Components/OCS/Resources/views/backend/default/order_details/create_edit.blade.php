@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            {!! Form::open(['route' => ['backend.ocs.order.detail.store', $order->id], 'method' => 'post', 'id' => 'order-details']) !!}
                {!! Form::hidden('id', $order->id) !!}
                <div class="form-group">
                    <label>Product</label>
                    {!! Form::select('product_id', $products->toArray(), null, ['class' => 'form-control chosen-select'] ) !!}
                </div>
                <div class="form-group">
                    <label>Service</label>
                    {!! Form::select('service_id', $services->toArray(), null, ['class' => 'form-control chosen-select'] ) !!}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Quantity</label>
                            {!! Form::text('quantity', 1, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            <label>Is Free
                            {!! Form::checkbox('is_free', 1 ) !!}
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            {!! Form::text('price', 0, ['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Note</label>
                            {!! Form::textarea('note', null, ['class' => 'form-control', 'rows' => 5] ) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('Add Product', ['class' => 'btn btn-primary', 'name' => 'create']) !!}
                </div>
            {!! Form::close() !!}
            <h3>List Services</h3>
            <div class="form-group">
            {!! Form::open(['route' => ['backend.ocs.order.detail.store', $order->id], 'method' => 'post', 'id' => 'order-details']) !!}
                <table id="list-items" class="table table-stripped">
                    <tr>
                        <th>Product</th>
                        <th>Service</th>
                        <th>Quantity</th>
                        <th>Is Free</th>
                        <th>Price</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                    @if( $order->details()->count() > 0)
                        @foreach( $order->details->all() as $detail)
                            <tr>
                                <td>
                                    {{$detail->product->title}}
                                </td>
                                <td>{{$detail->service->title}}</td>
                                <td><input type="text" name="quantity" value="{{ $detail->quantity }}"/></td>
                                <td><input type="checkbox" name="is_free" value="1" {{ $detail->is_free == 1 ? 'checked="checked"' : '' }}/></td>
                                <td><input type="text" name="price" value="{{ $detail->price }}"/></td>
                                <td><input type="text" name="note" value="{{ $detail->note }}"/></td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-sm btn-order-update" title="update"
                                        data-action="{{ route('backend.ocs.order.detail.update', [$order->id, $detail->id]) }}">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-sm btn-order-delete"
                                    data-action="{{ route('backend.ocs.order.detail.destroy', [$order->id, $detail->id]) }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
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
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('scripts')
<script>
    $(document).ready(function() {
        function box_message(type, message) {
            $('body').append('<div class="box-message"><div class="alert alert-'+type+'">'+message+'</div></div>');
            $('.box-message').delay(1500).fadeOut(500, function () {
                $(this).remove();
            });
        }
        $( "#order-details" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            console.log(form.attr('action'));
            $.ajax({
                type : 'POST',
                url : form.attr('action'),
                data : form.serialize(),
                success: function( res ) {
                    $('.table-msg').remove();
                    $('#list-items').append(res);
                }
            });
        });
        $(document).on('click', '.btn-order-delete', function(event) {
            event.preventDefault();
            if( confirm('Do you want delete this item?') ) {
                var thisEl = $(this);
                $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
                });
                $.ajax({
                    type : 'DELETE',
                    url : thisEl.data('action'),
                    success: function( res ) {
                        if(res.status == 200) {
                            thisEl.closest('tr').slideUp(300, function() { $(this).remove()});
                            box_message('success', 'Deleted Success');
                        }
                    }
                })
            }
        });

        $(document).on('click', '.btn-order-update', function(event) {
            event.preventDefault();
            if( confirm('Do you want update this item?') ) {
                var thisEl = $(this),
                parent = $(this).closest('tr'),
                quantity = parent.find('input[name="quantity"]').val(),
                is_free = parent.find('input[name="is_free"]').val(),
                price = parent.find('input[name="price"]').val(),
                note = parent.find('input[name="note"]').val(),
                data = {quantity:quantity, is_free:is_free, price:price, note:note};
                $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
                });
                $.ajax({
                    type : 'PUT',
                    url : thisEl.data('action'),
                    data : data,
                    success: function( res ) {
                        if(res.status == 200) {
                            box_message('success', 'Update Item Success');
                        }
                    }
                })
            }
        });

    });
</script>
@stop