<div class="card recent-orders">
    <div class="card-body text-dark">
            <table id="tableSuratDokter" class="table table-bordered text-dark w-100 mt-3 mb-3">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nomor Surat</th>
                        <th>Nama</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surat as $row)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                        <td>{{ $row->nomor_surat }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <div class="ms-auto">
                                    <a class="btn btn-primary btn-sm" role="button" href="{{ route('keterangan-buta-warna.show', $row->uuid) }}">Detail</a>
                                    <a class="btn btn-secondary btn-sm" role="button" href="{{ route('keterangan-buta-warna.edit', $row->uuid) }}">Sunting</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>