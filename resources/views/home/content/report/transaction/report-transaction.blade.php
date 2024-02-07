<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jumlah Transaksi Pasien PDF</title>
    <!-- STYLE CSS -->
    <style>
        table {
            width:95%;
            border-collapse:collapse;
            margin: 50px auto;
        }

        /* Zebra Striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight= bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div style="width:100%; margin: 0 auto;">
        <div style="width: 10%; float: left; margin-right: 20px;">
            <img src="{{ public_path('trika.png') }}"width="100%" alt="">
        </div>
        <div style="width: 50%; float: left; margin-bottom: 40px;">
            <span style="font-size: 35px; font-weight: bolder">Data Jumlah Transaksi Pasien</span> <br>
            <span> {{ $formatted_start_date }} / {{ $formatted_end_date }}</span>
        </div>
    </div>

    <table style="position: relative; top: 60px">
        <thead>
            <tr>
                <th style="text-align:center">No.</th>
                <th style="text-align:center">Tanggal</th>
                <th style="text-align:center">Nama Pasien</th>
                <th style="text-align:center">Layanan</th>
                <th style="text-align:center">Harga</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($dataTransaksi as $transaksi)
            <tr>
                <td style="text-align:center; width:5">{{ $loop->iteration }}</td>
                <td style="text-align:center">{{ $transaksi->tanggal }}</td>
                <td style="text-align:center">{{ $transaksi->nama_pasien }}</td>
                <td style="text-align:center">{{ $transaksi->nama_layanan }}</td>
                <td style="text-align:center">{{ $transaksi->harga_layanan }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>