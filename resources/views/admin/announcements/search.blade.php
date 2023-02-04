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
            <a href="{{route('announcements.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Announcement" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger btn-sm delete" data-slug="{{ $model->id }}" data-del-url="{{ route('announcements.destroy', $model->id) }}"><i class="fa fa-trash"></i></button>
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
