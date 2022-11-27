@extends('admin.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Input Barang</h5>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('barang.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-code-curly'></i></span>
                            <input type="text" name="kode_barang" class="form-control" placeholder="BR001" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bxs-component'></i></span>
                            <input type="text" name="nama" class="form-control" placeholder="Toyota Agya" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Transaksi</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-user'></i></span>
                            <select name="transaksi_id" class="form-select">
                                <option selected>-- Pilih transaksi --</option>
                                @foreach($ar_transaksi as $trans)
                                <option value="{{ $trans->id }}">{{ $trans->kode_trans }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Jenis Barang</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-user'></i></span>
                            <select name="jenis_barang_id" class="form-select">
                                <option selected>-- Pilih Jenis Barang --</option>
                                @foreach($ar_jenis_barang as $jb)
                                <option value="{{ $jb->id }}">{{ $jb->jenis}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Kondisi</label>
                        <div class="input-group input-group-merge">
                            <textarea class="form-control" name="kondisi"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Stok</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bxs-component'></i></span>
                            <input type="number" name="stok" class="form-control" placeholder="12" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="input-group input-group-merge">
                            <a class="btn btn-info" title="Kembali" href=" {{ url('transaksi') }}">
                                <i class='bx bx-left-arrow-alt'></i> Kembali
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary" title="Simpan Transaksi"><i class='bx bx-save'></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection