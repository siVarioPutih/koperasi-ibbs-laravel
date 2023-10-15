<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tabungan Santri</title>
    <style>
        body{
            font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
    </style>

</head>
<body>
<hr style="border: 0.7px dashed black;">
<table style="width: 100%; border: 0px solid black; ">
    <tr>
        <td valign="middle" style="text-align: left;width=80%; padding-top:-10px; padding-left: 10px;"><h4 style="margin-bottom: 5px;">YAYASAN AKBAR AS-SHALEH <br> PONDOK PESANTREN TAHFIDZ IMAM BUKHARI BOARDING SCHOOL</h4>Jl. Raya Kota Bunga Gg. SDN Palasari - Cipanas, Cianjur</td>
    </tr>
</table>
<hr style="height: .2mm; background: #000;  ">
<h3 style="text-align: center; text-decoration: underline;">BUKU TABUNGAN SANTRI IMAM BUKHARI BOARDING SCHOOL</h3>
<p style="text-align: center; margin-top: -10px;">Per Tanggal : <b>2023-07-17 s.d {{date('Y-m-d')}}</b></p>
<table style="border: 0.5px black;" style="width: 100%; text-align: center; ">
    <tr style="border: 0.7px;">
        <th style="border: 0.7px black; width: 15%;" >Tanggal <br> Input</th>
        <th style="border: 0.7px black; width: 15%;" >Tanggal <br> Transaksi</th>
        <th style="border: 0.7px black; width: 10%;" >Debet</th>
        <th style="border: 0.7px black; width: 10%;" >Kredit</th>
        <th style="border: 0.7px black; width: 10%;" >Saldo</th>
        <th style="border: 0.7px black; width: 40%;" >Ket</th>
    </tr>
    @foreach($data as $data)
    <tr style="margin-top:-10px;"><td>{{$data->tgl}}</td><td>{{$data->tgl_transaksi}}</td><td>{{$data->debet}}</td><td>{{$data->kredit}}</td><td>{{$data->saldo}}</td><td>{{$data->ket}}</td></tr>
    @endforeach

</table>

<table style="width: 100%; text-align: center; ">
    <tr style="">
        <td style="border: 1px black dashed; width: 100%; padding: 0px; margin-top: 0px; margin-bottom: 0px;">
            <h3 style="margin-top: 0px; margin-bottom: 0px;">Saldo Akhir Santri</h3>
            <h1 style="margin-top: 1px; margin-bottom: 1px;">{{$saldo}}</h1>
        </td>
    </tr>

</table>
<table style="width: 100%;">
    <tr>
        <td style="text-align: center; width: 100%;">
            Ttd,<br>Pengurus Koperasi<br><br><br>
            M. Sultan Alfandi
        </td>
    </tr>
</table>


<hr style="border: 0.7px dashed black;">






</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->

{{--@foreach($data as $data)--}}

{{--    {{$data->kredit}}<br>--}}
{{--@endforeach--}}
