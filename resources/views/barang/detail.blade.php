@extends('admin.index')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-6 col-lg-4">
            <div class="card text-left mb-3">
              <div class="card-body">
                <h5 class="card-title">Nama Barang  : <b>{{ $brg->nama }}</b></h5>
                <p class="card-text">Kode Barang    : <b>{{ $brg->kode_barang }}</b> </p>
                <p class="card-text">Kode Transaksi : <b>{{ $brg->transaksi->kode_trans }}</b></p>
                <p class="card-text">Jenis Barang   : <b>{{ $brg->jenis->jenis }}</b></p>
                <p class="card-text">Kondisi Barang : <b>{{ $brg->kondisi }}</b> </p>
                <p class="card-text">Stok Barang    : <b>{{ $brg->stok }}</b></p>
              </div>
            </div>
        </div>
    </div>
</div>


@endsection
