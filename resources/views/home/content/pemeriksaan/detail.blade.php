@extends('home.dashboard.layouts.index')

@section('title')
    <h3>Detail Riwayat: <u>{{ $patient->name }}</u></h3>
@endsection


@section('container')

<div class="card mb-3 text-dark">
    <div class="card-header border-bottom px-3 py-2">
        <h5>Data Pasien</h5>
    </div>
    <div class="card-body p-0">
        <div class="row px-3">
            <div class="col">
                <table cellpadding="5" class="mb-3">
                    <tbody>
                        <tr>
                            <td>Nomor Registrasi</td>
                            <td>:</td>
                            <td>{{ $kode }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Rekam Medis</td>
                            <td>:</td>
                            <td>{{ $patient->medical_record_numb }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $patient->name }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $patient->address }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $patient->gender }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <table cellpadding="5px">
                    <tbody>
                        <tr>
                            <td>Tanggal Periksa</td>
                            <td>:</td>
                            <td>{{ $inspection->created_at->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                        <td>{{ $patient->date_birth }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Hp</td>
                            <td>:</td>
                            <td>{{ $patient->hp_numb }}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td>{{ $patient->nik_numb }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('container2')
        <div class="card col-md-12 mt-3 mb-3">
            <div class="card-header border-bottom px-3 py-2">
                <h5>Fisik</h5>
            </div>

        <div class="card-body text-dark">
            <div class="row">
            
            <div class="col-md-6">
                    <div class="mb-3">
                    <label
                        class="form-label"
                        for="td"
                    >Tekanan Darah (mmHG)</label>
            
                    <input
                        class="form-control @error('td') is-invalid @enderror"
                        id="td"
                        name="td"
                        type="number"
                        value="{{ $inspection->td }}"
                        readonly
                    >
            
                    @error('td')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="mb-3">
                    <label
                        class="form-label"
                        for="suhu"
                    >Suhu (derajat C)</label>

                    <input
                        class="form-control @error('suhu') is-invalid @enderror"
                        id="suhu"
                        name="suhu"
                        type="number"
                        value="{{ $inspection->suhu }}"
                        readonly
                    >

                    @error('suhu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="nadi"
                    >Nadi (bpm)</label>

                    <input
                        class="form-control @error('nadi') is-invalid @enderror"
                        id="nadi"
                        name="nadi"
                        type="number"
                        value="{{ $inspection->nadi }}"
                        readonly
                    >

                    @error('nadi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="so2"
                    >SO2 (%)</label>

                    <input
                        class="form-control @error('so2') is-invalid @enderror"
                        id="so2"
                        name="so2"
                        type="number"
                        value="{{ $inspection->so2 }}"
                        readonly
                    >

                    @error('so2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="pernafasan"
                    >Pernafasan (x/menit)</label>

                    <input
                        class="form-control @error('pernafasan') is-invalid @enderror"
                        id="pernafasan"
                        name="pernafasan"
                        type="number"
                        value="{{ $inspection->pernafasan }}"
                        readonly
                    >

                    @error('pernafasan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="deha"
                    >Deha....</label>

                    <input
                        class="form-control @error('deha') is-invalid @enderror"
                        id="deha"
                        name="deha"
                        type="number"
                        value="{{ $inspection->deha }}"
                        readonly
                    >

                    @error('deha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="tb"
                    >Tinggi Badan (m)</label>

                    <input
                        class="form-control @error('tb') is-invalid @enderror"
                        id="tb"
                        name="tb"
                        type="number"
                        value="{{ $inspection->tb }}"
                        readonly
                    >

                    @error('tb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="bb"
                    >Berat Badan (kg)</label>

                    <input
                        class="form-control @error('bb') is-invalid @enderror"
                        id="bb"
                        name="bb"
                        type="number"
                        value="{{ $inspection->bb }}"
                        readonly
                    >

                    @error('bb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    </div>
        <div class="card col-md-12 mt-3 mb-3">
        <div class="card-header border-bottom px-3 py-2">
            <h5>Anamnesis</h5>
        </div>

        <div class="card-body text-dark">
            @csrf
            <div class="row">
            
            <div class="col-md-6">
                    <div class="mb-3">
                    <label
                        class="form-label"
                        for="subjektif"
                    >Subjective (Subjektif)</label>
            
                    <input
                        type="text"
                        class="form-control"
                        id="subjektif"
                        name="subjektif"
                        value="{{ $inspection->subjektif }}"
                        readonly
                    >
            
                    @error('subjektif')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="mb-3">
                    <label
                        class="form-label"
                        for="objektif"
                    >Objective (Objektif)</label>

                    <input
                        type="text"
                        class="form-control"
                        id="objektif"
                        name="objektif"
                        value="{{ $inspection->objektif }}"
                        readonly
                    >

                    @error('objektif')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="assesment"
                    >Assessment (Penilaian)</label>

                    <input
                        type="text"
                        class="form-control"
                        id="assesment"
                        name="assesment"
                        value="{{ $inspection->assesment }}"
                        readonly
                    >
                    @error('assesment')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="plan"
                    >Plan (Perencanaan)</label>

                    <input
                        type="text"
                        class="form-control"
                        id="plan"
                        name="plan"
                        value="{{ $inspection->plan }}"
                        readonly
                    >

                </div>
            </div>
        </div>
    </div>
    </div>
        <div class="card col-md-12 mt-3 mb-3">
        <div class="card-header border-bottom px-3 py-2">
            <h5>Diagnosa</h5>
        </div>

        <div class="card-body text-dark">
            <div class="row">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="diagnosa">Diagnosa utama</label>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Nama Diagnosa..." value="{{ $inspection->diagnosa }}" readonly>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="diagnosa_lainnya">Diagnosa lainnya...</label>

                        <div class="card" style="width: 18rem; background-color: rgb(233,236,239)">
                            <div class="card-body px-3 py-3">
                                <ul>
                                    @foreach ($diagnosa_lainnya as $row )
                                        <li><b>-</b> {{ $row }}</li>
                                    @endforeach
                                </ul>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
        <div class="card col-md-12 mt-3 mb-3">
        <div class="card-header border-bottom px-3 py-2">
            <h5>Tindakan</h5>
        </div>

        <div class="card-body text-dark">
            <div class="row">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="tindakan">Layanan / Tindakan</label>

                        <div class="input-group">
                            <input type="text" class="form-control" name="searchLayanan" id="searchLayanan" value="{{ $inspection->tindakan }}" readonly> 
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-auto">
                                    <label for="harga" class="px-1">Harga:</label>
                                </div>
                                <div class="col-auto p-0">
                                    <input name="harga_tindakan" class="form-control form-control-sm w-50" value="{{ $inspection->harga_tindakan }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="tindakan_lainnya">Layanan lainnya...</label>

                        <div class="card" style="width: 18rem; background-color: rgb(233,236,239)">
                            <div class="card-body px-3 py-3">
                                <ul>
                                    @foreach ($layanan_lainnya as $row )
                                        <li><b>-</b> {{ $row }}</li>
                                    @endforeach
                                </ul>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('pemeriksaan.show', $patient->id ) }}" class="btn btn-secondary">Kembali</a>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
        <script>
            $(document).ready(function() {

                fetch_icdx_data();

                function fetch_icdx_data(query = '') {

                    // alert('test' + '' + query);

                    $.ajax({
                        url: "{{ route('icd') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#list').html(data.table_data);

                        }
                    })

                }

                $(document).on('keyup', '#search', function() {
                    let query = $(this).val();
                    fetch_icdx_data(query);
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                fetch_icdx_data();
                function fetch_icdx_data(query = '') {
                    // alert('test' + '' + query);
                    $.ajax({
                        url: "{{ route('icd.lainnya') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#listIcdLainnya').html(data.table_data);
                        }
                    })
                }
                $(document).on('keyup', '#searchIcdLainnya', function() {
                    let query = $(this).val();
                    fetch_icdx_data(query);
                });
            });
        </script>
        <script>
            $(document).ready(function() {

                fetch_service_data();

                function fetch_service_data(query = '') {

                    // alert('test' + '' + query);

                    $.ajax({
                        url: "{{ route('service') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#listLayanan').html(data.table_data);

                        }
                    })

                }

                $(document).on('keyup', '#searchLayanan', function() {
                    let query = $(this).val();
                    fetch_service_data(query);
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                fetch_service_data();
                function fetch_service_data(query = '') {
                    // alert('test' + '' + query);
                    $.ajax({
                        url: "{{ route('service.lainnya') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#listLayananLainnya').html(data.table_data);
                        }
                    })
                }
                $(document).on('keyup', '#searchLayananLainnya', function() {
                    let query = $(this).val();
                    fetch_service_data(query);
                });
            });
        </script>
@endsection
