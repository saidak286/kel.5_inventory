@extends('admin.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Data Barang</h5>
            <br />
            @if ($errors->any())
            <div class="alert alert-danger">
                <p>Terjadi Kesalahan saat input data</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            @endif
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('barang.update',$barang->id) }}">
                @csrf
                @method('PUT')
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Kode Barang</label>
                <input type="text" class="form-control" name="kode_barang" value="{{ $barang->kode_barang }}" />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Kode Transaksi</label>
                <select class="form-select" name="transaksi_id" aria-label="Default select example">
                  <option value="1" selected>-- Pilih Kode Transaksi --</option>
                  @foreach ($arrTransaksi as $trans)
                    @php
                        $transSelect = ($trans->id == $barang->transaksi_id) ? 'selected' : '';
                    @endphp
                    <option value="{{ $trans->id }}" {{ $transSelect }}>{{ $trans->kode_trans }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Jenis Barang</label>
                <select class="form-select" name="jenis_barang_id" aria-label="Default select example">
                    <option value="" selected>-- Pilih Jenis Barang --</option>
                @foreach ($arrJenis as $jenis)
                    @php
                        $jenisSelect = ($jenis->id == $barang->jenis_barang_id) ? 'selected' : '';
                    @endphp
                    <option value="{{ $jenis->id }}" {{ $jenisSelect }}>{{ $jenis->jenis }}</option>
                @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company"></label>Nama Barang</label>
                <input type="text" class="form-control" name="nama" value="{{ $barang->nama }}" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-phone">Kondisi</label>
                <input
                  type="text"
                  name="kondisi"
                  class="form-control phone-mask"
                  placeholder=""
                  value="{{ $barang->kondisi }}"
                />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Stok</label>
                <input
                  id="basic-default-message"
                  class="form-control"
                  name="stok"
                  value="{{ $barang->stok }}"
                >
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
