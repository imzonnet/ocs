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
            data-action="{{ route('backend.ocs.order.detail.update', [$detail->order_id, $detail->id]) }}">
            <i class="fa fa-refresh"></i>
        </button>
        <button type="submit" class="btn btn-danger btn-sm btn-order-delete"
        data-action="{{ route('backend.ocs.order.detail.destroy', [$detail->order_id, $detail->id]) }}">
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>