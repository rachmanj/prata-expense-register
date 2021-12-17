<table>
  <thead>
    <tr>
      <td>id</td>
      <td>tanggal</td>
      <td>aset</td>
      <td>fuel_type</td>
      <td>hm</td>
      <td>km</td>
      <td>qty</td>
      <td>total</td>
      <td>remarks</td>
      <td>operator</td>
      <td>security</td>
      <td>fuelman</td>
      <td>created_at</td>
      <td>updated_at</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($fuels as $fuel)
        <tr>
          <td>{{ $fuel->id }}</td>
          <td>{{ $fuel->tanggal }}</td>
          <td>{{ $fuel->aset->nama_aset }}</td>
          <td>{{ $fuel->fuel_type }}</td>
          <td>{{ $fuel->hm }}</td>
          <td>{{ $fuel->km }}</td>
          <td>{{ $fuel->qty }}</td>
          <td>{{ $fuel->total }}</td>
          <td>{{ $fuel->remarks }}</td>
          <td>{{ $fuel->operator }}</td>
          <td>{{ $fuel->security }}</td>
          <td>{{ $fuel->fuelman }}</td>
          <td>{{ $fuel->created_at }}</td>
          <td>{{ $fuel->updated_at }}</td>
        </tr>
    @endforeach
  </tbody>
</table>