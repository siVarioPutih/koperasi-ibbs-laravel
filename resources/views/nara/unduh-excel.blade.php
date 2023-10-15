<table>
    <tr>
        <td colspan="6">Laporan Penjualan Koperasi</td>
    </tr>
    <tr>
        <td colspan="6">Imam Bukhari Boarding School</td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td colspan="6">Tanggal : {{date('Y-m-d')}}</td>
    </tr>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo</th>
        <th>Keterangan</th>
    </tr>

    @foreach($data as $data)
    <tr>

        <td>{{$loop->iteration}}</td>
        <td>{{$data->kode_santri}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->debet}}</td>
        <td>{{$data->kredit}}</td>
        <td>{{$data->saldo}}</td>
        <td>{{$data->ket}}</td>

    </tr>
    @endforeach

</table>
