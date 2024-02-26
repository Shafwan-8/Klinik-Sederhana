<div class="card recent-orders">
    <div class="card-body text-dark">
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-center mb-2" style="text-decoration: underline">
                        <b>SURAT KETERANGAN SEHAT</b>
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <h3 class="text-center">{{ $surat->nomor_surat }}</h3>
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
                </div>

                <div class="mt-3">
                    <p class="mb-4">Setelah dilakukan pemeriksaan pada pasien tersebut di atas, di sampaikan bahwa pada saat ini yang bersangkutan dalam kondisi sehat</p>
                    <p class="mb-4">Demikian surat keterangan ini diberikan kepadanya untuk dipergunakan sebagaimaan mestinya</p>
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