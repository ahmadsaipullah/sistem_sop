@extends('layouts.template_default')
@section('title', 'Update Main Jobs')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            @if (auth()->user()->level_id == 1)
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Update Main Jobs</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('job.update', $jobs->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tugas">Tugas</label>
                            <input type="text" class="form-control @error('tugas') is-invalid @enderror" id="tugas" name="tugas" placeholder="Tugas" value="{{ old('tugas') ?? $jobs->tugas }}" required/>
                            @error('tugas')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="detail_tugas">Detail Tugas</label>
                            <textarea id="summernote" class="form-control" name="detail_tugas">{{ $jobs->detail_tugas }}</textarea>
                            @error('detail_tugas')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Type Jobs</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                <option value="{{ $jobs->type }}" selected>{{ $jobs->type }}</option>
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                            </select>
                            @error('type')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jabatan_id">Tugas Untuk Jabatan</label>
                            <select class="form-control" id="jabatan_id" name="jabatan_id" required>
                                <option value="{{ $jobs->jabatan_id }}" selected>{{ $jobs->Jabatan->level }}</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cabang_id">Tugas Untuk Cabang</label>
                            <select class="form-control" id="cabang_id" name="cabang_id" required>
                                <option value="{{ $jobs->cabang_id }}" selected>{{ $jobs->Cabang->cabang }}</option>
                                @foreach ($cabangs as $cabang)
                                    <option value="{{ $cabang->id }}">{{ $cabang->cabang }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="relate_id">Relate Jobs</label>
                            <select class="form-control" id="relate_id" name="relate_id" required>
                                <option value="{{ $jobs->relate_id }}" selected>{{ $jobs->Relate->level }}</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
         @else
         <div class="card card-primary">
            <div class="card-header">
                <h3 class="text-center">Update Main Jobs</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('job.update', $jobs->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="file_laporan">File Laporan</label>

                        <input type="file" accept=
                        " application/pdf"
                            class="form-control @error('file_laporan') is invalid
          @enderror"
                            id="file_laporan" name="file_laporan" placeholder="file_laporan"
                            value="{{ old('file_laporan') }}" required />
                            <p><span class="text-danger text-xs">*PDF Only</span></p>
                        @error('file_laporan')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
            @endif
        </div>
    </div>
@endsection
