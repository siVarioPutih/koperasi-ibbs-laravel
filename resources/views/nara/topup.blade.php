@extends('nara.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
        <div class="card">

            <div class="card-header">

                <h4 class="card-title">TopUp Saldo Santri <span class="badge light badge-success">{{$data->kode_santri}}</span> </h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST" id="aksi" action="{{route('authTopup')}}">
                        @csrf
                        <input type="hidden" name="kode_santri" value="{{$data->kode_santri}}">
                        <input type="hidden" name="petugas" value="{{session()->get('email')}}">

                        <div class="form-group row">

                            <label class="col-sm-3 col-form-label">Kode Santri</label>
                            <div class="col-sm-9">
                                <label class="col-form-label">: <strong>{{$data->kode_santri}}</strong> </label>

                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Santri</label>
                            <div class="col-sm-9">
                                <label class="col-form-label">: <strong>{{$data->nama}}</strong> </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kelas</label>
                            <div class="col-sm-9">
                                <label class="col-form-label">: <strong>Kelas {{$data->kelas}}</strong> </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label disabled">Saldo Awal</label>
                            <div class="col-sm-9">
                                <label class="col-form-label">: <strong>{{$data->saldo}}</strong> </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tambah Saldo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Tambah Saldo" name="topup" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Transfer/Topup</label>
                            <div class="col-sm-9">
                                <input name="tgl" class="datepicker-default form-control" id="datepicker" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Keterangan" name="keterangan">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary formSubmit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</div>
@endsection
