@extends('admin.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Jenis Barang</h5>
            <br />
        </div>
        <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                  <p>Terjadi Kesalahan saat input data</p>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>

              @endif
            <form method="POST" action="{{ route('jenis.store') }}">
                @csrf
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Jenis</label>
                <input type="text" class="form-control" id="basic-default-fullname" name="jenis" />
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
