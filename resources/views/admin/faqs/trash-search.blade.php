@foreach ($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>
            {{isset($model->question) && !empty($model->question) ? $model->question : '-'}}
        </td>
        <td>
            {{isset($model->answer) && !empty($model->answer) ? $model->answer : '-'}}
        </td>
        <td>
            @if($model->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            <a href="{{route('admin.faqs.restore', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Restore Record" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> Restore</a>
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
