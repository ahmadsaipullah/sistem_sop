@extends('layouts.template_default')
@section('title', 'Halaman Jobs')
@section('job','active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Main Jobs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Jobs</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
@if (auth()->user()->level_id == 1)


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-primary" href="{{route('job.create')}}"><i class="fa fa-plus"></i> Tambah Jobs</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>No</th>
                                            <th>Tugas</th>
                                            <th>Gambar/Vidio</th>
                                            <th>Detail Tugas</th>
                                            <th>Jabatan</th>
                                            {{-- <th>File Laporan</th> --}}
                                            <th>Relate</th>
                                            <th>Cabang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jobs as $job)
                                            <tr>
                                                <td>{{ $job->type }}</td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $job->tugas }}</td>
                                                <td>
                                                    @if (pathinfo($job->image, PATHINFO_EXTENSION) == 'mp4')
                                                        <video width="320" height="240" controls>
                                                            <source src="{{ Storage::url($job->image) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    @else
                                                        <img src="{{ Storage::url($job->image) }}" alt="gambar/vidio" width="320">
                                                    @endif
                                                </td>

                                                <td>{!! $job->detail_tugas !!}</td>
                                                <td>{{ $job->Jabatan->level}}</td>
                                                <td>{{ $job->Relate->level }}</td>
                                                <td>{{ $job->Cabang->cabang}}</td>
                                                <td>

                                             <div class="text-center d-flex">
                                                <a href="{{ route('job.edit', $job->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <form action="{{ route('job.destroy', $job->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm delete_confirm" type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                             </div>
                                                </td>

                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9" class="text-center p-5">Data Kosong</td>
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
        @else
           <!-- Main content -->
           <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jobs as $job)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $job->tugas }}</td>
                                                <td>{!! $job->detail_tugas !!}</td>
                                                <td>{{ $job->type }}</td>
                                                <td>{{ $job->Jabatan->level}}</td>
                                                <td>{{ $job->Cabang->cabang}}</td>
                                                <td>{{ $job->Relate->level }}</td>
                                                <td>
                                                    @if ($job->file_laporan == null)
                                                    <span class="btn btn-xs btn-danger">Belum Laporan</span>
                                                    @else
                                                    <a class="btn btn-xs btn-primary"
                                                    href="{{ Storage::url($job->file_laporan) }}"
                                                    target="_blank">Get Documents</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($job->file_laporan == null)
                                                    <a href="{{ route('job.edit', $job->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pen">Laporan</i>
                                                    </a>
                                                    @else
                                                    <span class="btn btn-xs btn-success">Sudah Laporan</span>
                                                    @endif

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
        @endif
    </div>
@endsection
