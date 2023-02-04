@foreach ($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>
            @if(!empty($model->image))
                <img src="{{asset('public/images/announcements/' . $model->image )}}" alt="{{$model->title}}" width="80" height="80">
            @else
                <span class="text-danger"> Image Not Found </span>
            @endif
        </td>
        <td>
            {{isset($model->title) && !empty($model->title) ? ucfirst($model->title) : '-'}}
        </td>
        <td>@if(!empty($model->description)){{$model->description}} @else N/A @endif</td>
        <td>
            <a href="{{route('admin.announcements.restore', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Restore Record" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></a>
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
