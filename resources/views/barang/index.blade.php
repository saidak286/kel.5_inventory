@extends('admin.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h2 class="card-header">Data Barang</h2>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="w-75 p-3">
            <a class="btn btn-primary" title="Tambah Barang" href=" {{ route('barang.create') }}">
                <i class='bx bx-plus'></i>
            </a>
            &nbsp;
            <a class="btn btn-danger" title="Export to PDF Barang" href=" {{ url('barang-pdf') }}">
                <i class='bx bxs-file-export'></i>
            </a>
            &nbsp;
            <a class="btn btn-success" title="Export to Excel Barang" href=" {{ url('barang-excel') }}">
                <i class='bx bxs-file-export'></i>
            </a>
        </div>
        <br />
        <div class="table-responsive text-nowrap">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Transaksi</th>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php $no= 1; @endphp
                    @foreach($barang as $row)
                    <tr>
                        <td scope="row">{{ $no++ }}</td>
                        <td>{{ $row->kode_barang }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->transaksi->kode_trans }}</td>
                        <td>{{ $row->jenis_barang->jenis}}</td>
                        <td>{{ $row->kondisi }}</td>
                        <td>{{ $row->stok }}</td>
                        <td width="15%">
                            <form method="POST" action="{{ route('barang.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail Barang" href=" {{ route('barang.show',$row->id) }}">
                                    <i class='bx bx-detail'></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-warning btn-sm" title="Ubah Barang" href=" {{ url('barang-edit',$row->id) }}">
                                    <i class='bx bx-edit-alt'></i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Barang" onclick="return confirm('Anda Yakin Data akan diHapus?')">
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