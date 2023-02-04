@foreach ($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>{{  $model->subject }}</td>
        <td>{{  $model->url }}</td>
        <td>{{  $model->method }}</td>
        <td>{{  $model->ip }}</td>
        <td>{{  $model->agent }}</td>
        <td>{{  $model->hasUser->name??'N/A' }}</td>
        <td>{{  date('d, M-Y', strtotime($model->created_at)) }}</td>
        <td>
            <a href="{{route('admin.logactivity.restore', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></a>
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
