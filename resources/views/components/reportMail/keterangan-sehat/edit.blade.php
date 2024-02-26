<div class="card recent-orders">
    <div class="card-body text-dark">
        <form action="{{ route('keterangan-sehat.update', $surat->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-center mb-2">
                        <b>SURAT KETERANGAN SEHAT</b>
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <input type="text" class="form-control form-control" name="nomor_surat" id="nomor_surat"
                        placeholder="masukkan nomor surat" value="{{ $surat->nomor_surat }}" readonly>
                </div>
            </div>

            <div class="mt-3">
                <div class="row">
                    <div class="col">
                        <p class="mb-3 mt-0">Yang bertanda tangan di bawah ini, dengan mengingat sumpah jabatan Dokter menyatakan bahwa: </p>

                        <table cellpadding="5">
                            <tr>
                                <td class="pt-0 pb-2">Nama</td>
                                <td class="pt-0 pb-2">
                                    <div class="mx-3">:</div>
                                </td>
                                <td class="pt-0 pb-2" style="width: 60%;">
                                    <div class="input-icon">
                                        <input type="text" class="form-control form-control-sm" name="nama"
                                            id="nama" placeholder="masukkan nama lengkap" value="{{ $surat->nama }}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-0 pb-2">NIK</td>
                                <td class="pt-0 pb-2">
                                    <div class="mx-3 me-2">:</div>
                                </td>
                                <td class="pt-0 pb-2">
                                    <div class="input-icon">
                                        <input type="number" class="form-control form-control-sm" name="nik"
                                            id="nik" placeholder="masukkan nomor identitas" min="0" value="{{ $surat->nik }}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-0 pb-2">Umur</td>
                                <td class="pt-0 pb-2">
                                    <div class="mx-3 me-2">:</div>
                                </td>
                                <td class="pt-0 pb-2">
                                    <div class="input-icon">
                                        <input type="number" class="form-control form-control-sm" name="umur"
                                            id="umur" placeholder="masukkan umur" min="0" value="{{ $surat->umur }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="mx-3">Tahun</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-0 pb-2">Pekerjaan</td>
                                <td class="pt-0 pb-2">
                                    <div class="mx-3 me-2">:</div>
                                </td>
                                <td class="pt-0 pb-2">
                                    <div class="input-icon">
                                        <input type="text" class="form-control form-control-sm" name="pekerjaan"
                                            id="pekerjaan" placeholder="masukkan nama pekerjaan" value="{{ $surat->pekerjaan }}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-0 pb-2">Alamat</td>
                                <td class="pt-0 pb-2">
                                    <div class="mx-3 me-2">:</div>
                                </td>
                                <td class="pt-0 pb-2">
                                    <div class="input-icon">
                                        <input type="text" class="form-control form-control-sm" name="alamat"
                                            id="alamat" placeholder="masukkan nama alamat" value="{{ $surat->alamat }}">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="mt-3">
                    <p class="mb-4">Setelah dilakukan pemeriksaan pada pasien tersebut di atas, di sampaikan bahwa pada saat ini yang bersangkutan dalam kondisi sehat</p>
                    <p class="mb-4">Demikian surat keterangan ini diberikan kepadanya untuk dipergunakan sebagaimaan mestinya</p>
                </div>

                {{-- <p class="my-4">Demikian surat keterangan ini diberikan kepada yang bersangkutan untuk dipergunakan
                    seperlunya.</p> --}}

                <div class="row d-flex justify-content-end mb-3 mx-1">
                    <div class="">
                        <div class="input-icon">
                            <input type="text" class="form-control form-control" name="lokasi" id="lokasi"
                                placeholder="{{ $surat->lokasi }}" value="{{ $surat->lokasi }}" readonly>
                        </div>
                    </div>
                    <div class="">
                        <div class="input-icon">
                            <input type="date" class="form-control form-control" name="tanggal" id="tanggal"
                                placeholder="" value="{{ $surat->tanggal }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-end">
                    <div class="col-2">
                        <h6>Trika Klinik</h6>
                    </div>
                </div>
                <div id="pemisah" style="margin-top: 100px"></div>
                <div class="d-flex justify-content-end">
                    (
                    <div class="input-icon mx-1">
                        <select name="pengirim" id="pengirim" class="custom-select m-0">
                            <option value="" selected disabled hidden>- Pilih Dokter -</option>
                            @foreach ($dokter as $d)
                                <option 
                                    value="{{ $d->nama }}" 
                                    @if ($surat->pengirim == $d->nama) selected @endif
                                >
                                    {{ $d->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    )
                </div>
            </div>
    </div>
    <div class="card-footer">
        <div class="row d-flex justify-content-end">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" onclick="return confirm('Apakah anda yakin ingin kembali?')">Kembali</a>
            <button type="submit" class="btn btn-primary mx-2">Simpan</button>
        </div>
    </div>
    </form>
</div>