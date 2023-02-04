@foreach ($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <th>{{isset($model->order_id) && !empty($model->order_id)  ? $model->order_id : "-"  }}</th>
        <th>{{isset($model->order_type) && !empty($model->order_type)  ? $model->order_type->title : "-"  }}</th>
        <th>{{isset($model->user) && !empty($model->user)  ? $model->user->name : "-" }}</th>
        <th>
            @if(isset($model->book) && !empty($model->book))
                <a href="{{route('book.show' ,$model->book_id)}}" target="_blank">
                    {{$model->book->title}}
                </a>
            @else
            -
            @endif
        </th>
        <th>
            @if(isset($model->order_status->name) && !empty($model->order_status->name))
                <button class="btn btn-sm  btn-{{getStatusColor($model->order_status_id)}}">{{$model->order_status->name}}</button>
            @endif
        </th>
        <td>
            <a href="{{route('admin.orders.restore', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Restore Order" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> Restore</a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
