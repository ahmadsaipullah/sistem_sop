@extends('layouts.template_default')
@section('title', 'Create Main Jobs')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Create Main Jobs</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('job.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tugas">Tugas</label>
                            <input type="text" class="form-control @error('tugas') is invalid

              @enderror"
                                id="tugas" name="tugas" placeholder="tugas" value="{{old('tugas')}}" required/>
                            @error('tugas')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="detail_tugas">Detail Tugas</label>

                            <textarea id="summernote" class="form-control" name="detail_tugas">
                              </textarea>
                              @error('detail_tugas')
                              <span class="text-danger"> {{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Type Jobs</label>
                            <select name="type" id="type" class="form-control @error('type') is invalid
                            @enderror" required>
                             <option selected disabled>-- Pilih Type --</option>
                             <option value="Daily">Daily</option>
                             <option value="Weekly">Weekly</option>
                             <option value="Monthly">Monthly</option>
                            </select>

                             </div>
                             @error('type')
                             <span class="text-danger"> {{ $message }}</span>
                         @enderror

                        <div class="form-group">
                            <label for="jabatan_id">Tugas Untuk Jabatan</label>
                            <select class="form-control" id="jabatan_id" name="jabatan_id" required>
                                <option disabled selected>-- Pilih Tugas Jabatan --</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cabang_id">Tugas Untuk Cabang</label>
                            <select class="form-control" id="cabang_id" name="cabang_id" required>
                                <option disabled selected >-- Pilih Tugas Cabang --</option>
                                @foreach ($cabangs as $cabang)
                                    <option value="{{ $cabang->id }}">{{ $cabang->cabang }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="relate_id">Relate Jobs</label>
                            <select class="form-control" id="relate_id" name="relate_id" required>
                                <option disabled selected>-- Pilih Relate Jobs --</option>
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
        </div>
    </div>
@endsection
