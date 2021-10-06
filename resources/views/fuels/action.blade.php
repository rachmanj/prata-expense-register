<form action="{{ route('fuels.destroy', $model->id) }}" method="POST">
  @csrf @method('DELETE')
  <a href="{{ route('fuels.show', $model->id) }}" class="btn btn-xs btn-success">show</a>
  <a href="{{ route('fuels.edit', $model->id) }}" class="btn btn-xs btn-warning">edit</a>
  <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Yakin nih mau menghapus data? Ga bisa dibalikin lagi lho datanya..')">delete</button>
</form>
