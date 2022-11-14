@extends('admin.index')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="">
            <!-- Basic Bootstrap Table -->
        <div class="card">
                <h5 class="card-header">Data Transaksi</h5>
                <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Pegawai</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($transaksi as $trans)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $trans->pegawai->nama }}</strong></td>
                            <td>{{ $trans->kode_trans }}</td>
                            <td>{{ $trans->tanggal }}</td>
                            <td>{{ $trans->status }}</td>
                            <td>{{ $trans->catatan }}</td>
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
