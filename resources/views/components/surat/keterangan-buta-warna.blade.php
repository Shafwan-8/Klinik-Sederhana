<div class="card-body">
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="text-center mb-2">
                <b>SURAT KETERANGAN BUTA WARNA</b>
            </h2>
        </div>
    </div>
    
    <div class="mt-3">
        <p class="my-3">Yang bertanda tangan di bawah ini menerangkan bahwa : </p>
        
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
                <td class="pt-0 pb-2"><div class="mx-3">:</div></td>
                <td class="pt-0 pb-2">{{ $patient->date_birth }}</td>
            </tr>
            <tr>
                <td class="pt-0 pb-2">Jenis Kelamin</td>
                <td class="pt-0 pb-2"><div class="mx-3">:</div></td>
                <td class="pt-0 pb-2">{{ $patient->gender }}</td>
            </tr>
            <tr>
                <td class="pt-0 pb-2">Pekerjaan</td>
                <td class="pt-0 pb-2"><div class="mx-3">:</div></td>
                <td class="pt-0 pb-2">{{ $patient->job }}</td>
            </tr>
            <tr>
                <td class="pt-0 pb-2">Alamat</td>
                <td class="pt-0 pb-2"><div class="mx-3">:</div></td>
                <td class="pt-0 pb-2">{{ $patient->address }}</td>
            </tr>
        </table>

        <p class="my-3">Telah dilakukan pemeriksaan kesehatan dengan teliti dan menyatakan bahwa, yang bersangkutan dalam keadaan :  </p>
        
        <div class="text-center my-4">
            <h3 class="font-weight-bold">TIDAK BUTA WARNA / BUTA WARNA PARSIAL / BUTA WARNA TOTAL</h3>
        </div>

        <p>Surat Keterangan ini digunakan untuk ................................................</p>

        <p class="my-3">Demikian Surat Keterangan Sehat ini dibuat, agar dapat digunakan sebagaimana mestinya.</p>

        <div class="row mt-4">
            <div class="col-7"></div>
            <div class="col">
                Makassar, 

                <div class="mt-5">Dokter pemeriksa,</div>
            </div>
        </div>
    </div>
</div>