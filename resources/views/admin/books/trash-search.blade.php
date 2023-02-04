@foreach ($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>
            @if(!empty($model->front_image))
                <img src="{{ asset('public/images/books') }}/{{ $model->front_image }}" class="rounded" width="40px" height="50px" alt="">
            @else
                <img src="{{ asset('public/avatar/default.png') }}" width="50px" alt="">
            @endif
        </td>
        <td>
            @if(!empty($model->back_image))
                <img src="{{ asset('public/images/books') }}/{{ $model->back_image }}" class="rounded" height="40px" width="50px" alt="">
            @else
                <img src="{{ asset('public/avatar/default.png') }}" width="50px" alt="">
            @endif
        </td>

        <td>{{ $model->title??'' }}</td>
        <td>{{ Str::limit($model->short_description, 20) }}</td>
        <td>{{ number_format($model->paper_back_price, 2)??'' }}</td>
        <td>{{  date('d, M-Y', strtotime($model->updated_at)) }}</td>
        <td>
            <a href="{{route('admin.book.restore', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit user" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></a>
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
