@extends('layouts.template_default')
@section('title', 'Detail Relate')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Detail Relate</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tugas</th>
                                <th>Detail Tugas</th>
                                <th>Type</th>
                                <th>Jabatan</th>
                                <th>Cabang</th>
                                <th>Relate</th>
                                <th>File Laporan</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $jobs->tugas }}</td>
                                    <td>{!! $jobs->detail_tugas !!}</td>
                                    <td>{{ $jobs->type }}</td>
                                    <td>{{ $jobs->Jabatan->level}}</td>
                                    <td>{{ $jobs->Cabang->cabang}}</td>
                                    <td>{{ $jobs->Relate->level }}</td>
                                    <td>
                                        @if ($jobs->file_laporan == null)
                                        <span class="btn btn-xs btn-danger">Belum Ada File Laporan</span>
                                        @else
                                        <a class="btn btn-xs btn-primary"
                                        href="{{ Storage::url($jobs->file_laporan) }}"
                                        target="_blank">Get Dokumen</a>
                                        @endif
                                    </td>

                                </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tugas">Tugas</label>
                            <span>{{ $jobs->tugas }}</span>
                        </div>

                        <div class="form-group">
                            <label for="detail_tugas">Detail Tugas</label>
                          <span readonly>{!! $jobs->detail_tugas !!}</span>
                        </div>

                        <div class="form-group">
                            <label for="type">Type Jobs</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" readonly>
                                <option value="{{ $jobs->type }}" selected>{{ $jobs->type }}</option>
                            </select>
                            @error('type')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jabatan_id">Tugas Untuk Jabatan</label>
                            <select class="form-control" id="jabatan_id" name="jabatan_id" readonly>
                                <option value="{{ $jobs->jabatan_id }}" selected>{{ $jobs->Jabatan->level }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cabang_id">Tugas Untuk Cabang</label>
                            <select class="form-control" id="cabang_id" name="cabang_id" readonly>
                                <option value="{{ $jobs->cabang_id }}" selected>{{ $jobs->Cabang->cabang }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="relate_id">Relate Jobs</label>
                            <select class="form-control" id="relate_id" name="relate_id" readonly>
                                <option value="{{ $jobs->relate_id }}" selected>{{ $jobs->Relate->level }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>File Laporan</label>
                            @if ($jobs->file_revisi == 0)
                            <input type="text" class="form-control bg-danger" value="Belum Ada File Laporan" readonly>
                                @else
                                <embed src="{{ Storage::url($jobs->file_laporan) }}" type="application/pdf" width="100%" height="1000px">
                            @endif
                        </div>

                    </div>
                </form> --}}
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
