@extends('layouts.template_default')
@section('title', 'Halaman Relate')
@section('relate','active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Main Relate</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Relate</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <a class="btn btn-primary" href="{{route('relate.create')}}"><i class="fa fa-plus"></i> Tambah Relate</a>
                            </div> --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tugas</th>
                                            <th>Detail Tugas</th>
                                            <th>Type</th>
                                            <th>Jabatan</th>
                                            <th>Cabang</th>
                                            <th>Relate</th>
                                            <th>File Laporan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($relates as $relate)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $relate->tugas }}</td>
                                                <td>{!! $relate->detail_tugas !!}</td>
                                                <td>{{ $relate->type }}</td>
                                                <td>{{ $relate->Jabatan->level}}</td>
                                                <td>{{ $relate->Cabang->cabang}}</td>
                                                <td>{{ $job->Relate->level }}</td>
                                                <td>
                                                    @if ($relate->file_laporan == null)
                                                    <span class="btn btn-xs btn-danger">Belum Ada File Laporan</span>
                                                    @else
                                                    <a class="btn btn-xs btn-success"
                                                    href="{{ Storage::url($relate->file_laporan) }}"
                                                    target="_blank">Get Dokumen</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary"
                                                    href="{{route('relate.show', $relate->id)}}">Detail</a>
                                                </td>

                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center p-5">Data Kosong</td>
                                         </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
