<table>
  <thead>
    <tr>
      <td>id</td>
      <td>tanggal</td>
      <td>nomor</td>
      <td>aset_id</td>
      <td>jenis_perbaikan</td>
      <td>tindakan_perbaikan</td>
      <td>worker</td>
      <td>total</td>
      <td>requestor</td>
      <td>approver</td>
      <td>followup_by</td>
      <td>giver</td>
      <td>receiver</td>
      <td>created_by</td>
      <td>created_at</td>
      <td>updated_at</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($transaksis as $transaksi)
        <tr>
          <td>{{ $transaksi->id }}</td>
          <td>{{ date('d-m-Y', strtotime($transaksi->tanggal)) }}</td>
          <td>{{ $transaksi->nomor }}</td>
          <td>{{ $transaksi->aset->nama_aset }}</td>
          <td>{{ $transaksi->jenis_perbaikan }}</td>
          <td>{{ $transaksi->tindakan_perbaikan }}</td>
          <td>{{ $transaksi->worker }}</td>
          <td>{{ $transaksi->transaksi_details->sum('total') }}</td>
          <td>{{ $transaksi->requestor }}</td>
          <td>{{ $transaksi->approver }}</td>
          <td>{{ $transaksi->followup_by }}</td>
          <td>{{ $transaksi->giver }}</td>
          <td>{{ $transaksi->receiver }}</td>
          <td>{{ $transaksi->created_by }}</td>
          <td>{{ $transaksi->created_at }}</td>
          <td>{{ $transaksi->updated_at }}</td>
        </tr>
    @endforeach
  </tbody>
</table>