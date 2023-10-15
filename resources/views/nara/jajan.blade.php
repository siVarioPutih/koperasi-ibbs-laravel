@extends('nara.index')
@section('content')

<div class="col-lg-12">
    <div class="card">

        <div class="card-header">

            <h4 class="card-title">Jajan Santri <span class="badge light badge-success">{{$data->kode_santri}}</span></h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form method="POST" id="aksi" action="{{route('authJajan')}}">
                    @csrf
                    <input type="hidden" name="kode_santri" value="{{$data->kode_santri}}">
                    <input type="hidden" name="saldo_awal" value="{{$data->saldo}}">
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
                        <label class="col-sm-3 col-form-label">Nominal Jajan</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" placeholder="Nominal Jajan" name="tarik" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Keterangan" name="ket" >
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
@endsection
