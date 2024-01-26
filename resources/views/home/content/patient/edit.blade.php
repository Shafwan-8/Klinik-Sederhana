@extends('home.dashboard.layouts.index')

@section('title')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Sunting Pasien : {{ $patient->name }}</h1>
</div>

@endsection

@section('container')
<form
        class="card"
        action="{{ route('patient.update', $patient->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        <div class="card-header p-0 d-flex justify-content-start px-4 py-4">
            <a
                class="btn btn-dark"
                href="{{ route('patient.index') }}"
            >Kembali</a>
        </div>
        <div class="card-body text-dark">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="nik_numb"
                        >NIK</label>

                        <input
                            class="form-control @error('nik_numb') is-invalid @enderror"
                            id="nik_numb"
                            name="nik_numb"
                            type="number"
                            value="{{ old('nik_numb') ?? $patient->nik_numb }}"
                        >

                        @error('nik_numb')
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
                            for="name"
                        >Nama</label>

                        <input
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') ?? $patient->name }}"
                        >

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="mb-3">Jenis Kelamin</label>

                        <div class="form-check">
                            <input
                                class="form-check-input @error('gender') is-invalid @enderror"
                                id="gender"
                                name="gender"
                                type="radio"
                                value="lak-laki"
                                @checked(old('gender') == 'laki-laki' || $patient->gender == 'laki-laki')
                            >

                            <label
                                class="form-check-label"
                                for="gender"
                            >
                                Laki-laki
                            </label>
                        </div>

                        <div class="form-check">
                            <input
                                class="form-check-input @error('gender') is-invalid @enderror"
                                id="gender"
                                name="gender"
                                type="radio"
                                value="perempuan"
                                @checked(old('gender') == 'perempuan' || $patient->gender == 'perempuan')
                            >
                            <label
                                class="form-check-label"
                                for="gender"
                            >
                                Perempuan
                            </label>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                        class="form-label"
                        for="date_birth"
                        >Tanggal Kelahiran</label>
                        
                        <input
                        class="form-control @error('date_birth') is-invalid @enderror"
                        id="date_birth"
                        name="date_birth"
                        type="date"
                        value="{{ old('date_birth') ?? $patient->date_birth }}"
                        >
                        
                        @error('date_birth')
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
                        for="address"
                        >Alamat</label>
                        
                        <textarea
                        class="form-control @error('address') is-invalid @enderror"
                        id="address"
                        name="address"
                        >{{ old('address') ?? $patient->address}}</textarea>
                        
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                        class="form-label mb-3"
                        for="hp_numb"
                        >NO HP</label>
                        
                        <input
                        class="form-control @error('hp_numb') is-invalid @enderror"
                        id="hp_numb"
                        name="hp_numb"
                        type="number"
                        value="{{ old('hp_numb') ?? $patient->hp_numb }}"
                        >

                        @error('hp_numb')
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
                        for="bpjs_numb"
                        >NO BPJS</label>
                        
                        <input
                        class="form-control @error('bpjs_numb') is-invalid @enderror"
                        id="bpjs_numb"
                        name="bpjs_numb"
                        type="number"
                        value="{{ old('bpjs_numb') ?? $patient->bpjs_numb }}"
                        >

                        @error('bpjs_numb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                    
                <div class="col-md-4">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="img_ktp"
                        >Foto KTP</label>
            
                        <input
                            class="form-control @error('img_ktp') is-invalid @enderror"
                            id="img_ktp"
                            name="img_ktp"
                            type="file"
                            value="{{ old('img_ktp') ?? $patient->img_ktp   }}"
                            onchange="previewImage()"
                        >
            
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah.</small>
            
                        @error('img_ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <img 
                        class="img-preview img-fluid my-3"
                        width="150px"
                    />
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                        class="form-label"
                        for="email"
                        >Email</label>
                        
                        <input
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        type="text"
                        value="{{ old('email') ?? $patient->email }}"
                        >

                        @error('email')
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
                        for="job"
                        >Pekerjaan</label>
                        
                        <input
                        class="form-control @error('job') is-invalid @enderror"
                        id="job"
                        name="job"
                        type="text"
                        value="{{ old('job') ?? $patient->job }}"
                        >

                        @error('job')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="medical_record_numb"
                        >No Rekam Medis</label>

                        <input
                            class="form-control @error('medical_record_numb') is-invalid @enderror"
                            id="medical_record_numb"
                            name="medical_record_numb"
                            type="text"
                            value="{{ old('medical_record_numb') ?? $patient->medical_record_numb }}"
                            readonly
                        >

                        @error('medical_record_numb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-dark" type="submit">Simpan Perubahan</button>
        </div>
    </form>


<script>

    function previewImage() {
        const image = document.querySelector('#img_ktp');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader .readAsDataURL(image.files[0]);

        oFReader.onload = function(ofREvent) {
            imgPreview.src = event.target.result;    
        }
    }

</script>

@endsection