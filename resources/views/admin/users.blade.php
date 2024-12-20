@extends('layout.main')
@section('content')
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header">
            <h3>Daftar User</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No WA</th>
                        <th>No HP</th>
                        <th>Status User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_user }}</td>
                            <td>{{ $item->email }}</td>

                            {{-- no wa --}}
                            @if (empty($item->wa))
                                <td>Belum Diisi</td>
                            @else
                                <td>{{ $item->wa }}</td>
                            @endif

                            {{-- no hp --}}
                            @if (empty($item->no_hp))
                                <td>Belum Diisi</td>
                            @else
                                <td>{{ $item->no_hp }}</td>
                            @endif

                            {{-- status user --}}
                            @if ($item->status_user == 1)
                                <td class="text-success">AKTIF</td>
                            @else
                                <td class="text-danger">TIDAK AKTIF</td>
                            @endif
                            <td>
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('users.hapus', $item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
