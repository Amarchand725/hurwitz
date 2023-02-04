@if (isset($audios) && $audios->count() > 0)
    @foreach ($audios as $key => $value)
        <tr id="tr-{{ $value->id }}">
            <td>
                <audio controls>
                    <source src="{{ asset('public/images/books/audios/' . $value->audio) }}" type="audio/ogg">
                    <source src="{{ asset('public/images/books/audios/' . $value->audio) }}" type="audio/mpeg">
                    Your browser does not support
                    the audio element.
                </audio>
            </td>
            <td>
                <button type="button" class="deleteRecord btn btn-danger btn-sm" data-id="{{ $value->id }}" data-delete-url="{{ route('books.destroyAudio', $value->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                </button>
            </td>
        </tr>
    @endforeach
@endif
