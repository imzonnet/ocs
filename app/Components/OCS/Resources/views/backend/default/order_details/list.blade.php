<tr>
    <td>
        <input type='hidden' name='id' value='{{ $detail->id }}'/>
        {{$detail->product->title}}
    </td>
    <td>{{$detail->service->title}}</td>
    <td><input type="text" name="detail[{{$detail->id}}]['quantity']" value="{{ $detail->quantity }}"/></td>
    <td><input type="checkbox" name="detail[{{$detail->id}}]['is_free']" value="1" {{ $detail->is_free == 1 ? 'checked="checked"' : '' }}/></td>
    <td><input type="text" name="detail[{{$detail->id}}]['price']" value="{{ $detail->price }}"/></td>
    <td><input type="text" name="detail[{{$detail->id}}]['note']" value="{{ $detail->note }}"/></td>
    <td>
        <button type="submit" class="btn btn-danger btn-sm btn-order-delete"
        data-action="{{ route('backend.ocs.order.detail.destroy', [$detail->order_id, $detail->id]) }}">
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>