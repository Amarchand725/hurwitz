@foreach ($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>
            @if (!empty($model->main_image))
                <img src="{{ asset('public/images/blogs/' . $model->main_image) }}"
                    width="60" height="60" alt="" srcset="">
            @else
                N/A
            @endif
        </td>
        <td>
            @if (!empty($model->title))
                {{ ucfirst($model->title) }}
            @else
                N/A
            @endif
        </td>
        <td>{{ Str::limit($model->short_description, 20) }}</td>
        <td>{{  date('d, M-Y', strtotime($model->created_at)) }}</td>
        <td>
            @if($model->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            <a href="{{route('admin.blogs.restore', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Restore Record" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></a>
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
