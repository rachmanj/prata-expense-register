<form action="{{ route('aset.destroy', $model->id) }}" method="POST">
  @csrf @method('DELETE')
  <a href="{{ route('aset.edit', $model->id) }}" class="btn btn-xs btn-warning">edit</a>
  <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Kamu yakin mau menghapus data?')">delete</button>
</form>
