@foreach ($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>@if(!empty($model->user)){{ucfirst($model->user->name)}} @else N/A @endif</td>
        <td>@if(!empty($model->name)){{ucfirst($model->name)}} @else N/A @endif</td>
        <td>@if(!empty($model->email)){{$model->email}} @else N/A @endif</td>
        <td>@if(!empty($model->phone)){{ucfirst($model->phone)}} @else N/A @endif</td>
        <td>@if(!empty($model->comment)){{ucfirst($model->comment)}} @else N/A @endif</td>
        <td>
            <a href="{{route('admin.contacts.restore', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Restore Record" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></a>
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
