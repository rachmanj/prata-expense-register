<form action="{{ route('transaksi.destroy_detail', $model->id) }}" method="POST">
  @csrf @method('DELETE')
  <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Yakin nih mau menghapus data? Ga bisa dibalikin lagi lho datanya..')">delete</button>
</form>