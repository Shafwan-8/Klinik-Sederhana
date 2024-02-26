<div class="card recent-orders">
    <div class="card-body text-dark">
        <form action="{{ route('keterangan-dokter.update', $surat->uuid) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-center mb-2">
                        <b>SURAT KETERANGAN DOKTER</b>
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <input type="text" class="form-control form-control" name="nomor_surat" id="nomor_surat"
                        placeholder="masukkan nomor surat" value="{{ $surat->nomor_surat }}" readonly>
                </div>
            </div>
            <div class="row d-flex justify-content-end">
                <div class="col-4">
                    <p class="mt-3">Kepada Yth,</p>
                    <div class="d-flex justify-content-center mt-1">
                        <input type="text" class="form-control form-control-md" name="departemen" id="departemen"
                            placeholder="nama departemen" style="width: 60%;" value="{{ $surat->departemen }}">
                    </div>
                </div>
            </div>

            <div class="mt-0">
                <div class="row">
                    <div class="col">
                        <p class="mb-3 mt-0">Dengan surat keterangan ini menerangkan bahwa : </p>

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
                    <div class="col-4 justify-content-end">
                        <p class="mb-3">di - </p>
                        <p class="text-center mt-4"><u>Tempat</u></p>
                    </div>
                </div>

                <div class="row mt-3 d-flex">
                    <div class="col-4">
                        <p>Oleh karena sakit, maka perlu diberi istirahat selama</p>
                    </div>
                    <div class="m-0 p-0 d-flex align-items-center">
                        :
                    </div>
                    <div class="col-3">
                        <div class="input-icon">
                            <input type="text" class="form-control form-control" style="width: 110%" name="lama_hari"
                                id="lama_hari" placeholder="masukkan lama istirahat" value="{{ $surat->lama_hari }}">
                        </div>
                    </div>
                    <div class="mx-3 d-flex align-items-center">
                        <p>Hari</p>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-4 d-flex align-items-center">
                        <p>Terhitung mulai tanggal,</p>
                    </div>
                    <div class="m-0 p-0 d-flex align-items-center">
                        :
                    </div>
                    <div class="col-3">
                        <div class="">
                            <div class="input-icon">
                                <input type="date" class="form-control form-control" name="tanggal_mulai"
                                    id="tanggal_mulai" value="{{ $surat->tanggal_mulai }}">
                            </div>
                        </div>
                    </div>
                    <div class="mx-2 d-flex align-items-center">
                        <p>s/d tanggal</p>
                    </div>
                    <div class="m-0 p-0 d-flex align-items-center">
                        :
                    </div>
                    <div class="col-3">
                        <div class="">
                            <div class="input-icon">
                                <input type="date" class="form-control form-control" name="tanggal_selesai"
                                    id="tanggal_selesai" value="{{ $surat->tanggal_selesai }}">
                            </div>
                        </div>
                    </div>
                </div>

                <p class="my-4">Demikian surat keterangan ini diberikan kepada yang bersangkutan untuk dipergunakan
                    seperlunya.</p>

                <div class="row">
                    <div class="col-1">
                        <p>Note</p>
                    </div>
                    <div class="mx-2">
                        :
                    </div>
                    <div class="col-4">
                        <textarea name="catatan" id="catatan" cols="5" rows="3" class="form-control" placeholder="catatan">{{ $surat->catatan }}</textarea>
                    </div>
                </div>

                <div class="row d-flex justify-content-end mb-3 mx-1">
                    <div class="">
                        <div class="input-icon">
                            <input type="text" class="form-control form-control" name="lokasi" id="lokasi"
                                placeholder="Makassar" value="{{ $surat->lokasi }}" readonly>
                        </div>
                    </div>
                    <div class="">
                        <div class="input-icon">
                            <input type="date" class="form-control form-control" name="tanggal" id="tanggal"
                                value="{{ $surat->tanggal }}" readonly>
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
                                    @if ($d->nama == $surat->pengirim) selected @endif
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