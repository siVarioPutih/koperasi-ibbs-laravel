@extends('nara.index')
@section('content')

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Santri Imam Bukhari Boarding School </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display min-w850">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Kode Santri</th>
                                        <th>Nama Santri</th>
                                        <th>Kelas</th>
                                        <th class="text-center">Saldo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rowSantri as $data)
                                        <tr>
                                            <td class="text-center">{{$data->kode_santri}}</td>
                                            <td>{{$data->nama}}</br>
                                                @if($data->sum == 0)
                                                    <span class="badge badge-primary badge-sm light ">Jajan Hari Ini : Rp{{$data->sum}}
                                                    </span>
                                                @elseif($data->sum < 10000)
                                                    <span class="badge badge-warning badge-sm light ">Jajan Hari Ini : Rp{{$data->sum}}
                                                    </span>
                                                @elseif($data->sum > 10000)
                                                    <span class="badge badge-danger badge-sm light ">Jajan Hari Ini : Rp{{$data->sum}}
                                                    </span>
                                                @endif




                                            </td>

                                        <td class="text-center">Kelas {{$data->kelas}}</td>
                                        <td class="text-center"><span class="badge light badge-primary">Rp{{$data->saldo}}</span></td>


                                        <td class="text-center">
                                            <a href="{{route('rootNaraRoute')}}/topup/{{$data->kode_santri}}" class="btn btn-success  btn-xs"><i class="fa fa-check"></i> TopUp</a>
                                            <a href="{{route('rootNaraRoute')}}/tarik/{{$data->kode_santri}}" class="btn btn-warning  btn-xs"><i class="fa fa-check"></i> Tarik</a>
                                            <a target="" href="{{route('rootNaraRoute')}}/jajan/{{$data->kode_santri}}" class="btn btn-danger  btn-xs"><i class="fa fa-check"></i> Jajan</a>
                                            <a target="_blank" href="{{route('rootNaraRoute')}}/laporan/{{$data->kode_santri}}" class="btn btn-danger  btn-xs"><i class="fa fa-check"></i> Buku</a>

                                        </td>

                                    </tr>
                                    @endforeach



                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th class="text-center">Kode Santri</th>
                                        <th>Nama Santri</th>
                                        <th>Kelas</th>
                                        <th class="text-center">Saldo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

@push('css')
    <!-- Datatable -->
    <link href="{{asset('')}}vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@push('js')
    <!-- Datatable -->
    <script src="{{asset('')}}vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('')}}js/plugins-init/datatables.init.js"></script>
@endpush
