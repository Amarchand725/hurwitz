@foreach ($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>@if(!empty($model->country->name)){{$model->country->name}} @else "-" @endif</td>
        <td>@if(!empty($model->name)){{ucfirst($model->name)}} @else "-" @endif</td>
        <td>@if(!empty($model->price)){{number_format($model->price, 2)}} @else 0 @endif</td>
        <td>{{$model->updated_at->format('d M Y / h:i A')}}</td>
        <td>
            <a href="{{route('states.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Order Type" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger btn-sm delete" data-slug="{{ $model->id }}" data-del-url="{{ route('states.destroy', $model->id) }}"><i class="fa fa-trash"></i></button>
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
