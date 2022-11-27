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
                        <h3>Detail Barang</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-secondary">
                            Kode Barang: {{ $row->kode_barang }}
                            <br />Nama: {{ $row->nama  }}
                            <br />Transaksi: {{ $row->transaksi->kode_trans }}
                            <br />Jenis Barang: {{ $row->jenis_barang->jenis  }}
                            <br />Kondisi: {{ $row->kondisi }}
                            <br />Stok: {{ $row->stok}}
                        </div>
                        <a class="btn btn-info btn-sm" title="Kembali" href=" {{ url('barang') }}">
                            <i class='bx bx-left-arrow-alt'></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection