@extends('layout.main')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit User</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="{{ $data->email }}"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Nama User</label>
                            <input type="text" name="nama_user" class="form-control" id="exampleInputEmail1" value="{{ $data->nama_user }}"
                                placeholder="Nama User">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" value="{{ $data->username }}"
                                placeholder="Nama User">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">No HP</label>
                            <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" value="{{ $data->no_hp }}"
                                placeholder="08554xxxx">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputPassword1">No WA</label>
                            <input type="text" name="wa" class="form-control" id="exampleInputPassword1" value="{{ $data->wa }}"
                                placeholder="0813xxxxx">
                        </div>
                        {{-- <div class="form-group mt-3">
                            <label for="exampleInputPassword1">foto profile</label>
                            <input type="file" name="foto" class="form-control" id="exampleInputPassword1" value="{{ $data->wa }}"
                                placeholder="0813xxxxx">
                        </div> --}}
                        <div class="form-group mt-3">
                            <label for="exampleFormControlSelect1">Status User</label>
                            <select class="form-control" name="status_user" id="exampleFormControlSelect1">
                                <option value="1" {{ $data->status_user == 1 ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $data->status_user == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
