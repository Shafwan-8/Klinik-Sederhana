<div>
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="text-center mb-2">
                <b>SURAT KETERANGAN DOKTER</b>
            </h2>
        </div>
    </div>
    
    <div class="mt-3">
        <p class="my-3">Dengan surat keterangan ini menerangkan bahwa : </p>

        <style>
            table {
                border-collapse: collapse; /* Untuk menggabungkan border sel-sel tabel */
            }
            td {
                padding: 10px; /* Atur jarak antara isi sel dan tepi sel */
                border: 1px solid black; /* Contoh border untuk sel-sel */
            }
        </style>

        <table cellpadding="5px">
            <tr>
                <td class="pt-0 pb-2">Nama</td>
                <td class="pt-0 pb-2"><div class="mx-3">:</div></td>
                <td class="pt-0 pb-2">{{ $patient->name }}</td>
            </tr>
            <tr>
                <td class="pt-0 pb-2">Nomor Registrasi</td>
                <td class="pt-0 pb-2"><div class="mx-3">:</div></td>
                <td class="pt-0 pb-2">{{ $inspection->no_registrasi }}</td>
            </tr>
            <tr> 
                <td class="pt-0 pb-2">Tanggal Lahir</td>
                <td class="pt-0 pb-2"><div class="mx-3 me-2">:</div></td>
                <td class="pt-0 pb-2">{{ $patient->date_birth }}</td>
            </tr>
            <tr>
                <td class="pt-0 pb-2">Jenis Kelamin</td>
                <td class="pt-0 pb-2"><div class="mx-3 me-2">:</div></td>
                <td class="pt-0 pb-2">{{ $patient->gender }}</td>
            </tr>
            <tr>
                <td class="pt-0 pb-2">Pekerjaan</td>
                <td class="pt-0 pb-2"><div class="mx-3 me-2">:</div></td>
                <td class="pt-0 pb-2">{{ $patient->job }}</td>
            </tr>
            <tr>
                <td class="pt-0 pb-2">Alamat</td>
                <td class="pt-0 pb-2"><div class="mx-3 me-2">:</div></td>
                <td class="pt-0 pb-2">{{ $patient->address }}</td>
            </tr>
        </table>

        <p class="my-3">Berdasarkan pemeriksaan yang telah dilakukan oleh kami, dengan diagnosa : </p>
        <p class="mb-3 mt-4">Maka kami simpulkan : </p>
        
        <table class="w-100 " cellpadding="10px">
            <tr>
                <td class="align-middle d-flex justify-content-center mx-2">
                    <div style="width: 40px;height:30px" class="border border-primary"></div>
                </td>
                <td class="align-middle">
                    Memerlukan istirahat selama .......................... hari terhitung sejak tanggal .......................... sd ..........................
                </td>
            </tr>
            <tr>
                <td class="align-middle d-flex justify-content-center mx-2">
                    <div style="width: 40px;height:30px" class="border border-primary"></div>
                </td>
                <td class="align-middle">
                    Rawat inap di Rumah Sakit, sejak tanggal .......................... sd ..........................
                </td>
            </tr>
            <tr>
                <td class="align-middle d-flex justify-content-center mx-2">
                    <div style="width: 40px;height:30px" class="border border-primary"></div>
                </td>
                <td class="align-middle">
                    Cuti Hamil : <br>
                    Sesuai dengan ketentuan yang berlaku selama .......................... Perhitungan persalinan tanggal ..........................
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p>Rekomendasi/Anjuran lain-lain</p>
                    <div class="border p-4 border-dark mt-2"></div>
                </td>
            </tr>
        </table>

        <p class="my-3">Demikian Surat Keterangan ini dibuat untuk dapat digunakan sesuai keperluan.</p>

        <div class="row mt-4">
            <div class="col-7"></div>
            <div class="col">
                Makassar, 

                <div class="mt-5">Dokter pemeriksa,</div>
            </div>
        </div>
    </div>
</div>