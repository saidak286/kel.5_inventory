@extends('admin.index')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="container mt-3">
                    <a class="btn btn-info btn-sm" title="" href="{{ route('barang.create') }}">
                        +
                    </a>
                </div>
                <h5 class="card-header">Data Barang</h5>
                <div class="table-responsive text-nowrap">
                    <div class="container">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                    </div>
                <table class="table">
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
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($barang as $brg)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $brg->kode_barang }}</strong></td>
                            <td>{{ $brg->transaksi->kode_trans }}</td>
                            <td>{{ $brg->jenis->jenis }}</td>
                            <td>{{ $brg->nama }}</td>
                            <td><span class="badge bg-label-primary me-1">{{ $brg->kondisi }}</span></td>
                            <td>{{ $brg->stok }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
        </div>
        <!--/ Basic Bootstrap Table -->
        </div>
    </div>
</div>


@endsection
