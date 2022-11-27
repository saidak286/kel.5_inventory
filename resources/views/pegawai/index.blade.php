@extends('admin.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Data Pegawai</h5>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="w-75 p-3">
            <a class="btn btn-primary" title="Tambah Pegawai" href=" {{ route('pegawai.create') }}">
                <i class='bx bx-plus'></i>
            </a>
            &nbsp;
            <a class="btn btn-danger" title="Export to PDF Barang" href=" {{ url('pegawai-pdf') }}">
                <i class='bx bxs-file-export'></i>
            </a>
            &nbsp;
            <a class="btn btn-success" title="Export to Excel Barang" href=" {{ url('pegawai-excel') }}">
                <i class='bx bxs-file-export'></i>
            </a>
        </div>
        <br />
        <div class="table-responsive text-nowrap">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">nip</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php $no= 1; @endphp
                    @foreach($pegawai as $row)
                    <tr>
                        <td scope="row">{{ $no++ }}</td>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jabatan->nama }}</td>
                        <td>{{ $row->gender}}</td>
                        <td>{{ $row->alamat}}</td>
                        <td>{{ $row->telepon }}</td>
                        <td width="10%">
                            @empty($row->foto)
                            <img src="{{ url('admin/assets/img/avatars/nophoto.png') }}" alt class="w-px-40 h-auto rounded-circle">
                            @else
                            <img src="{{ url('admin/assets/img/avatars')}}/{{$row->foto}}" alt class="w-px-40 h-auto rounded-circle">
                            @endempty
                        </td>
                        <td width="15%">
                            <form method="POST" action="{{ route('pegawai.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail Pegawai" href=" {{ route('pegawai.show',$row->id) }}">
                                    <i class='bx bx-detail'></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-warning btn-sm" title="Ubah Pegawai" href=" {{ url('pegawai-edit',$row->id) }}">
                                    <i class='bx bx-edit-alt'></i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Pegawai" onclick="return confirm('Anda Yakin Data akan diHapus?')">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection