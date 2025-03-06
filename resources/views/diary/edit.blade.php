<!-- diary/edit.blade.php -->
<tr id="diary-{{ $diary->id }}">
    <td>
        <form hx-put="{{ route('diary.update', $diary->id) }}"
              hx-target="#diary-{{ $diary->id }}"
              hx-swap="outerHTML">
            @csrf
            @method('PUT')
            <input type="text" class="form-control" name="title" value="{{ $diary->title }}" required>
            <textarea class="form-control mt-2" name="content" rows="3" required>{{ $diary->content }}</textarea>
            <button type="submit" class="btn btn-success mt-2">Save</button>
            <button hx-get="{{ route('diary.show', $diary->id) }}"
                    hx-target="#diary-{{ $diary->id }}"
                    hx-swap="outerHTML"
                    class="btn btn-secondary mt-2">
                Cancel
            </button>
        </form>
    </td>
    <td></td>
</tr>