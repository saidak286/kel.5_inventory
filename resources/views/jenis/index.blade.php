@extends('admin.index')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="">
            <!-- Basic Bootstrap Table -->
            <div class="card">
            <div class="container mt-3">
                <a class="btn btn-info btn-sm" title="" href="{{ route('jenis.create') }}">
                    +
                </a>
            </div>
                <h5 class="card-header">Data Jenis</h5>
                <div class="table-responsive text-nowrap">
                    <div class="container">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                    </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>

                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($jenis as $jns)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $jns->jenis }}</strong></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
        </div>
        <!--/ Basic Bootstrap Table -->
        </div>
    </div>
</div>


@endsection
