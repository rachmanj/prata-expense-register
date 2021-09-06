<form action="{{ route('transaksi.destroy', $model->id) }}" method="POST">
  @csrf @method('DELETE')
  <a href="{{ route('transaksi.show', $model->id) }}" class="btn btn-xs btn-success">show</a>
  <a href="{{ route('transaksi.edit', $model->id) }}" class="btn btn-xs btn-warning">edit</a>
  @if (! $model->transaksi_details->count() > 0)
  <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Yakin nih mau menghapus data? Ga bisa dibalikin lagi lho datanya..')">delete</button>
  @endif
</form>
