<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 align="center">Data Barang</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Transaksi</th>
            <th>Jenis Barang</th>
            <th>Nama</th>
            <th>Kondisi</th>
            <th>Stok</th>
        </tr>
        </thead>
        <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($barang as $brg)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $brg->kode_barang }}</td>
                    <td>{{ $brg->transaksi->kode_trans }}</td>
                    <td>{{ $brg->jenis->jenis }}</td>
                    <td>{{ $brg->nama }}</td>
                    <td>{{ $brg->kondisi }}</td>
                    <td>{{ $brg->stok }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
