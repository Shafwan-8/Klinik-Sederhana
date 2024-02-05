@extends('home.dashboard.layouts.index')

@section('title')
    <h3>Tambah Riwayat: {{ $patient->name }}</h3>
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
                                    <td>
                                        <input type="hidden" name="no_registrasi" value="{{ $kode }}">
                                        {{ $kode }}
                                    </td>
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
                                    <td>{{ $waktu }}</td>
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
    @endsection

    @section('container2')
    <form action="{{ route('pemeriksaan.store', request('pemeriksaan')) }}" method="POST">
        <input type="hidden" name="no_registrasi" value="{{ $kode }}">
        {{ $kode }}
        <div class="card col-md-12 mt-3 mb-3">
            <div class="card-header border-bottom px-3 py-2">
                <h5>Fisik</h5>
            </div>

            <div class="card-body text-dark">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="td">Tekanan Darah (mmHG)</label>

                            <input class="form-control @error('td') is-invalid @enderror" id="td" name="td"
                                type="number">

                            @error('td')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="suhu">Suhu (derajat C)</label>

                            <input class="form-control @error('suhu') is-invalid @enderror" id="suhu" name="suhu"
                                type="number">

                            @error('suhu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nadi">Nadi (bpm)</label>

                            <input class="form-control @error('nadi') is-invalid @enderror" id="nadi" name="nadi"
                                type="number">

                            @error('nadi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="so2">SO2 (%)</label>

                            <input class="form-control @error('so2') is-invalid @enderror" id="so2" name="so2"
                                type="number">

                            @error('so2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="pernafasan">Pernafasan (x/menit)</label>

                            <input class="form-control @error('pernafasan') is-invalid @enderror" id="pernafasan"
                                name="pernafasan" type="number">

                            @error('pernafasan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="detail">Detail Fisik</label>

                            <input class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail"
                                type="text">

                            @error('detail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="tb">Tinggi Badan (m)</label>

                            <input class="form-control @error('tb') is-invalid @enderror" id="tb" name="tb"
                                type="number">

                            @error('tb')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="bb">Berat Badan (kg)</label>

                            <input class="form-control @error('bb') is-invalid @enderror" id="bb" name="bb"
                                type="number">

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
                <div class="row">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="subjektif">Subjektif</label>

                            <textarea class="form-control @error('subjektif') is-invalid @enderror" id="subjektif" name="subjektif"></textarea>

                            @error('subjektif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="objektif">Objektif</label>

                            <textarea class="form-control @error('objektif') is-invalid @enderror" id="objektif" name="objektif"></textarea>

                            @error('objektif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="assesment">Assesment</label>

                            <textarea class="form-control @error('assesment') is-invalid @enderror" id="assesment" name="assesment"></textarea>

                            @error('assesment')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="plan">Plan</label>

                            <textarea class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan"></textarea>

                            @error('plan')
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
                <h5>Diagnosa</h5>
            </div>

            <div class="card-body text-dark">
                <div class="row">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="diagnosa">Diagnosa utama</label>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Nama Diagnosa...">
                            </div>

                            <div class="form-check" name="list" id="list">

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="diagnosa_lainnya">Diagnosa lainnya...</label>

                            <div class="input-group mb-3">
                                {{-- <input type="text" class="form-control" name="search" id="search" placeholder="..."> --}}
                                <textarea class="form-control" name="diagnosa_lainnya" id="diagnosa_lainnya" cols="10" rows="1"></textarea>
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

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="searchLayanan" id="searchLayanan"
                                    placeholder="Nama Layanan..." aria-label="Nama Layanan...">
                            </div>

                            <div class="form-check" name="listLayanan" id="listLayanan">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="tindakan_lainnya">Layanan lainnya...</label>

                            <div class="input-group mb-3">
                                {{-- <input type="text" class="form-control" name="search" id="search" placeholder="..."> --}}
                                <textarea class="form-control" name="tindakan_lainnya" id="tindakan_lainnya" cols="10" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pemeriksaan.show', request('pemeriksaan')) }}" class="btn btn-secondary">Kembali</a>
        </div>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script>
            $(document).ready(function() {

                fetch_icdx_data();

                function fetch_icdx_data(query = '') {

                    // alert('test' + '' + query);

                    $.ajax({
                        url: "{{ route('icd.cari') }}",
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
    </form>
@endsection
