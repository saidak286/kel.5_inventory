@extends('admin.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Data Jenis Barang</h5>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="w-75 p-3">
            <a class="btn btn-primary" title="Tambah Jenis Barang" href=" {{ route('jenis_barang.create') }}">
                <i class='bx bx-plus'></i>
            </a>
        </div>
        <br />
        <div class="table-responsive text-nowrap">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php $no= 1; @endphp
                    @foreach($jenis_barang as $row)
                    <tr>
                        <td scope="row">{{ $no++ }}</td>
                        <td>{{ $row->jenis }}</td>
                        <td width="15%">
                            <form method="POST" action="{{ route('jenis_barang.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail Jenis Barang" href=" {{ route('jenis_barang.show',$row->id) }}">
                                    <i class='bx bx-detail'></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-warning btn-sm" title="Ubah Jenis Barang" href=" {{ url('jenis_barang-edit',$row->id) }}">
                                    <i class='bx bx-edit-alt'></i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Jenis Barang" onclick="return confirm('Anda Yakin Data akan diHapus?')">
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