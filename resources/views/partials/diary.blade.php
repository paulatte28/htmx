<!-- partials/diary.blade.php -->
<tr id="diary-{{ $diary->id }}">
    <td>
        <span hx-target="this" hx-swap="outerHTML" hx-get="{{ route('diary.edit', $diary->id) }}">
            {{ $diary->title }}
        </span>
    </td>
    <td>
        <a href="{{ route('diary.show', $diary->id) }}" class="btn btn-info">View</a>
        <button hx-get="{{ route('diary.edit', $diary->id) }}"
                hx-target="#diary-{{ $diary->id }}"
                hx-swap="outerHTML"
                class="btn btn-warning">
            Edit
        </button>
        <button hx-delete="{{ route('diary.destroy', $diary->id) }}"
                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}" }'
                hx-target="#diary-{{ $diary->id }}"
                hx-swap="outerHTML"
                hx-confirm="Are you sure you want to delete this entry?"
                class="btn btn-danger">
            Delete
        </button>
    </td>
</tr>