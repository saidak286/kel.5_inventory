@extends('admin.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Input Jabatan</h5>
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
                <form method="POST" action="{{ route('jabatan.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bxs-business'></i></span>
                            <input type="text" name="nama" class="form-control"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <div class="input-group input-group-merge">
                            <a class="btn btn-info" title="Kembali" href=" {{ url('jabatan') }}">
                                <i class='bx bx-left-arrow-alt'></i> Kembali
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary" title="Simpan Jabatan">
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