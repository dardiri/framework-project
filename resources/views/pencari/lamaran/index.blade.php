@extends('layouts.pencari_layout')

@section('title')
    Pencari Panel
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lamaran</h1>
</div>

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Lamaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%">
                <thead aria-rowspan="2">
                    <tr>
                        <th>No</th>
                        <th>Nama Pekerjaan</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama Pelamar</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lamaran as $lamar)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lamar->lowongan->nama_pekerjaan }}</td>
                        <td>{{ $lamar->lowongan->perusahaan->nama_perusahaan }}</td>
                        <td>{{ $pencari->nama_lengkap }}</td>
                        <td>@if ($lamar->status_lamaran == 0)
                            Waiting
                        @elseif($lamar->status_lamaran == 1)
                            Accepted
                        @else
                            Decline
                        @endif</td>
                        <td>
                            <form action="{{ route('pencari.lamaran.delete', $lamar->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-icon-split"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
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

@section('pagejs')

<!-- Page level plugins -->
<script src="{{ asset('sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('sb-admin/js/demo/datatables-demo.js') }}"></script>

@endsection
