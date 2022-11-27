@extends('admin.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <h3>Detail Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-secondary">
                            Kode Transaksi: {{ $row->kode_trans }}
                            <br />Nama Pegawai: {{ $row->pegawai->nama  }}
                            <br />Nama Barang: {{ $row->nama_barang }}
                            <br />Tanggal: {{ $row->tanggal }}
                            <br />Jumlah: {{ $row->jumlah }}
                            <br />Status: {{ $row->status }}
                            <br />Catatan: {{ $row->catatan }}
                        </div>
                        <a class="btn btn-info btn-sm" title="Kembali" href=" {{ url('transaksi') }}">
                            <i class='bx bx-left-arrow-alt'></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection