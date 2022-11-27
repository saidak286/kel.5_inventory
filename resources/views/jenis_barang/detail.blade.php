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
                        <h3>Detail Jenis Barang</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-secondary">
                            Jenis Barang: {{ $row->jenis }}
                        </div>
                        <a class="btn btn-info btn-sm" title="Kembali" href=" {{ url('jenis_barang') }}">
                            <i class='bx bx-left-arrow-alt'></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection