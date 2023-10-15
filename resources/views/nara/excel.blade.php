@extends('nara.index')
@section('content')

            <form action="{{route('unduhExcel')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pilih Tanggal Awal</h4>
                            </div>
                            <div class="card-body">
                                <p class="mb-1">Tanggal Awal</p>
                                <input name="tgl_awal" class="datepicker-default form-control" id="datepicker" required>
                            </div>
                        </div>
                        <!-- Card -->

                    </div>
                    <div class="col-6">
                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pilih Tanggal Akhir</h4>
                            </div>
                            <div class="card-body">
                                <p class="mb-1">Tanggal Akhir</p>
                                <input name="tgl_akhir" class="datepicker-default form-control" id="datepicker" required>
                            </div>
                        </div>
                        <!-- Card -->

                    </div>
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary"> Download Laporan Excel</button>
                    </div>
                </div>
            </form>


@endsection
