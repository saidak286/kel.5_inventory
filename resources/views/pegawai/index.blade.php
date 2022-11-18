@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Pegawai</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br /> <a class="btn btn-info btn-sm" title="Kembali" href=" {{ route('pegawai.create') }}">
                <i class="bi bi-save"></i>
            </a>
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">Nip</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Temp Lahir</th>
                        <th scope="col">Tgl Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($pegawai as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->jabatan_id }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->tmp_lahir }}</td>
                        <td>{{ $row->tgl_lahir }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->telepon }}</td>
                        <td>{{ $row->foto }}</td>
                        

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection