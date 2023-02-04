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
        <td>{{  date('d, M-Y', strtotime($model->created_at)) }}</td>
        <td>
            <a href="{{route('book.show', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Show Details" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
            <a href="{{route('book.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit user" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger btn-sm delete" data-slug="{{ $model->id }}" data-del-url="{{ route('book.destroy', $model->id) }}"><i class="fa fa-trash"></i></button>
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

<script>
    //delete record
    $('.delete').on('click', function(){
        var slug = $(this).attr('data-slug');
        var delete_url = $(this).attr('data-del-url');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : delete_url,
                    type : 'DELETE',
                    success : function(response){
                        if(response.status){
                            $('#id-'+slug).hide();
                            $('#trash-record-count').html(response.trash_records);
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }else{
                            Swal.fire(
                                'Not Deleted!',
                                'Sorry! Something went wrong.',
                                'danger'
                            )
                        }
                    }
                });
            }
        })
    });
</script>
