@foreach ($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>
            @if (!empty($model->image))
                <img src="{{ asset('public/images/testimonials/' . $model->image) }}"
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
        <td>{{ Str::limit($model->description, 20) }}</td>
        <td>{{  date('d, M-Y', strtotime($model->created_at)) }}</td>
        <td>
            @if($model->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            <a href="{{route('testimonials.show', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Show Details" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
            <a href="{{route('testimonials.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Order Type" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger btn-sm delete" data-slug="{{ $model->id }}" data-del-url="{{ route('testimonials.destroy', $model->id) }}"><i class="fa fa-trash"></i></button>
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
