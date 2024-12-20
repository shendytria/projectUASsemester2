@extends('layout.main')
@section('content')
    @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>
            Login successfull!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calender</h6>
                    <a href="">Show All</a>
                </div>
                <div id="calender"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">To Do List</h6>
                    <a href="">Show All</a>
                </div>
                <form action="{{ route('task.store') }}" method="post">
                    @csrf
                    <div class="d-flex mb-2">
                        <input class="form-control bg-transparent" name="nama_tugas" type="text" placeholder="Enter task">
                        <button type="submit" class="btn btn-primary ms-2">Add</button>
                    </div>
                </form>
                @foreach ($task as $item)
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span>{{ $item->nama_tugas }}</span>
                                <form action="{{ route('task.hapus', $item->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm"><i class="fa fa-times"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Sales Start -->
        <div class="container-fluid pt-15 px-15">
            <div class="bg-light text-center rounded p-15">
                <div class="container mt-5">
                    <h2 class="mb-4">Jadwal Kelas</h2>
                    <form action="/update-schedule" method="POST">
                        @csrf
                        <table class="table schedule-table">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jumat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>08:00 - 10:00</td>
                                    <td><input type="text" name="monday_0800" class="form-control" value="Matematika">
                                    </td>
                                    <td><input type="text" name="tuesday_0800" class="form-control"
                                            value="Bahasa Inggris"></td>
                                    <td><input type="text" name="wednesday_0800" class="form-control" value="Kimia">
                                    </td>
                                    <td><input type="text" name="thursday_0800" class="form-control" value="Biologi">
                                    </td>
                                    <td><input type="text" name="friday_0800" class="form-control" value="Sejarah"></td>
                                </tr>
                                <tr>
                                    <td>10:00 - 12:00</td>
                                    <td><input type="text" name="monday_1000" class="form-control" value="Fisika"></td>
                                    <td><input type="text" name="tuesday_1000" class="form-control" value="Ekonomi"></td>
                                    <td><input type="text" name="wednesday_1000" class="form-control" value="Matematika">
                                    </td>
                                    <td><input type="text" name="thursday_1000" class="form-control" value="Geografi">
                                    </td>
                                    <td><input type="text" name="friday_1000" class="form-control"
                                            value="Bahasa Indonesia"></td>
                                </tr>
                                <tr>
                                    <td>12:00 - 14:00</td>
                                    <td><input type="text" name="monday_1200" class="form-control"
                                            value="Bahasa Inggris"></td>
                                    <td><input type="text" name="tuesday_1200" class="form-control" value="Biologi">
                                    </td>
                                    <td><input type="text" name="wednesday_1200" class="form-control" value="Sejarah">
                                    </td>
                                    <td><input type="text" name="thursday_1200" class="form-control" value="Matematika">
                                    </td>
                                    <td><input type="text" name="friday_1200" class="form-control" value="Fisika">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if (Auth::user()->id_jenis_user == 'admin')
                            <button type="submit" class="btn btn-primary">Update Schedule</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <!-- Widgets End -->
    @endsection
