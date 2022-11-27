@extends('admin.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Input Transaksi</h5>
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
                <form method="POST" action="{{ route('transaksi.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Transaksi</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-code-curly'></i></span>
                            <input type="text" name="kode_trans" class="form-control" placeholder="AJ0001BKS2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pegawai</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-user'></i></span>
                            <select name="pegawai_id" class="form-select">
                                <option selected>-- Pilih Pegawai --</option>
                                @foreach($ar_pegawai as $peg)
                                <option value="{{ $peg->id }}">{{ $peg->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bxs-component'></i></span>
                            <input type="text" name="nama_barang" class="form-control" placeholder="Toyota Agya" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-calendar-alt'></i></span>
                            <input class="form-control" type="date" name="tanggal" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bxs-keyboard'></i></span>
                            <input type="number" name="jumlah" class="form-control" placeholder="18" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-stats'></i></span>
                            <select name="status" class="form-select">
                                <option selected>-- Pilih Status --</option>
                                @foreach($ar_status as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Catatan</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-comment"></i></span>
                            <textarea name="catatan" class="form-control" placeholder="Catatan"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <div class="input-group input-group-merge">
                            <a class="btn btn-info" title="Kembali" href=" {{ url('transaksi') }}">
                                <i class='bx bx-left-arrow-alt'></i> Kembali
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary" title="Simpan Transaksi">
                                <i class='bx bx-save'></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection