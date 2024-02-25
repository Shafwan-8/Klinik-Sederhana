<div class="card recent-orders">
    <div class="card-body text-dark">
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-center mb-2" style="text-decoration: underline">
                        <b>SURAT KETERANGAN DOKTER</b>
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <h3 class="text-center">{{ $surat->nomor_surat }}</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-end">
                <div class="col-4">
                    <p class="mt-3">Kepada Yth,</p>
                    <div class="d-flex justify-content-center mt-1">
                        <p style="text-decoration: underline">{{ $surat->departemen }}</p>
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
                                    <p>{{ $surat->nama }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-0 pb-2">NIK</td>
                                <td class="pt-0 pb-2">
                                    <div class="mx-3 me-2">:</div>
                                </td>
                                <td class="pt-0 pb-2">
                                    <p>{{ $surat->nik }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-0 pb-2">Umur</td>
                                <td class="pt-0 pb-2">
                                    <div class="mx-3 me-2">:</div>
                                </td>
                                <td class="pt-0 pb-2">
                                    <p>{{ $surat->umur }} Tahun</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-0 pb-2">Pekerjaan</td>
                                <td class="pt-0 pb-2">
                                    <div class="mx-3 me-2">:</div>
                                </td>
                                <td class="pt-0 pb-2">
                                    <p>{{ $surat->pekerjaan }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-0 pb-2">Alamat</td>
                                <td class="pt-0 pb-2">
                                    <div class="mx-3 me-2">:</div>
                                </td>
                                <td class="pt-0 pb-2">
                                    <p>{{ $surat->alamat }}</p>
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
                        <p>{{ $surat->lama_hari }} Hari</p>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-4 d-flex align-items-center">
                        <p>Terhitung mulai tanggal,</p>
                    </div>
                    <div class="m-0 p-0 d-flex align-items-center">
                        :
                    </div>
                    <div class="mx-2">
                        <p style="text-decoration: underline">{{ date('d/m/Y', strtotime($surat->tanggal_mulai)) }}</p>
                    </div>
                    <div class="mx-2 d-flex align-items-center">
                        <p>s/d tanggal</p>
                    </div>
                    <div class="m-0 p-0 d-flex align-items-center">
                        :
                    </div>
                    <div class="col-3">
                        <p style="text-decoration: underline">{{ date('d/m/Y', strtotime($surat->tanggal_selesai)) }}</p>
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
                        <p>{{ $surat->catatan }}</p>
                    </div>
                </div>

                <div class="row d-flex justify-content-end mb-3 mx-1">
                    <p>{{ $surat->lokasi }},</p>
                    <div class="mx-2">
                        <p>{{ date('d/m/Y', strtotime($surat->created_at)) }}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-end">
                    <div class="col-4 text-right mr-6">
                        <h6>Trika Klinik</h6>
                    </div>
                </div>
                <div id="pemisah" style="margin-top: 100px"></div>
                <div class="row d-flex justify-content-end">
                    <div class="col-4 mr-4">
                        <p class="text-right">
                            (
                                {{ $surat->pengirim }}
                            )
                        </p>
                    </div>
                </div>
            </div>
    </div>
</div>