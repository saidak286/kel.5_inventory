@extends('admin.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Input Pegawai</h5>
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
                <form method="POST" action="{{ route('pegawai.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bxs-user-detail'></i></span>
                            <input type="text" name="nip" class="form-control" placeholder="11325">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-user'></i></span>
                            <input type="text" name="nama" class="form-control" placeholder="Galih Aditya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bxs-business'></i></span>
                            <select class="form-select" name="jabatan_id">
                                <option selected>-- Pilih Jabatan --</option>
                                @foreach($ar_jabatan as $jab)
                                <option value="{{ $jab->id }}">{{ $jab->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            @foreach($ar_gender as $gender)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="{{ $gender }}">
                                <label class="form-check-label" for="gridRadios1">
                                    {{ $gender }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bxs-building-house'></i></span>
                            <input type="text" name="tmp_lahir" class="form-control" placeholder="Jakarta">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-calendar-alt'></i></span>
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="input-group input-group-merge">
                            <textarea class="form-control" name="alamat" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Telepon</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-phone'></i></span>
                            <input type="text" name="telepon" class="form-control" placeholder="+62-896-4566-7162">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" type="file" name="foto">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="input-group input-group-merge">
                            <a class="btn btn-info" title="Kembali" href=" {{ url('pegawai') }}">
                                <i class='bx bx-left-arrow-alt'></i> Kembali
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary" title="Simpan Pegawai">
                                <i class='bx bx-save'></i> Simpan
                            </button>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </div>
</div>
@endsection