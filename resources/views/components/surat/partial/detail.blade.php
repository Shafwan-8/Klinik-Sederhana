<table>
    <tr>
        <td>Nama</td>
        <td><div class="ms-3 me-2">:</div></td>
        <td>{{$this->rows->patient->name}}</td>
    </tr>
    <tr>
        <td>Nomor Registrasi</td>
        <td><div class="ms-3 me-2">:</div></td>
        <td>{{$this->rows->registration_number}}</td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td><div class="ms-3 me-2">:</div></td>
        <td>{{$this->rows->patient->birth_place}}, {{$this->rows->patient->birthday->format('d-m-Y')}}</td>
    </tr>
    <tr>
        <td>Usia</td>
        <td><div class="ms-3 me-2">:</div></td>
        <td>{{$this->rows->patient->age}}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><div class="ms-3 me-2">:</div></td>
        <td>{{$this->rows->patient->gender}}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td><div class="ms-3 me-2">:</div></td>
        <td>{{$this->rows->patient->job ?? '-'}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><div class="ms-3 me-2">:</div></td>
        <td>{{$this->rows->patient->address}}</td>
    </tr>
</table>