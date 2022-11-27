@extends('admin.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Input Jenis Barang</h5>
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
                <form method="POST" action="{{ route('jenis_barang.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Jenis Barang</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bxs-category' ></i></span>
                            <input type="text" name="jenis" class="form-control"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <div class="input-group input-group-merge">
                            <a class="btn btn-info" title="Kembali" href=" {{ url('jenis_barang') }}">
                                <i class='bx bx-left-arrow-alt'></i> Kembali
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary" title="Simpan Jenis Barang">
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