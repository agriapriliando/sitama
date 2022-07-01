<x-layout title="Admin - Program Studi">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/users/') }}" method="POST" class="rounded-lg mb-3"
        autocomplete="off">
        @method('POST')
        @csrf
        <div class="row p-4">
            <div class="col">
                <div class="row">
                    <div class="col mb-2">
                        <p class="text-dark text-center">Hai {{ session()->get('name') }} - Anda <b>{{ session()->get('jenis_akun') }}</b> <a href="{{ url('logout') }}" class="badge badge-danger">Logout</a></p>
                        <p class="h3 text-dark">Tambah Administrator</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if (session('status'))
                        <div id="alert-alert" class="alert alert-success">
                            {!! session('status') !!}
                        </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <button class="rounded-lg collapsed d-inline buttoncustom mb-2"
                                        data-text="Tambah Akun" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>Tambah Akun</span>
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="h5 text-dark">Akun Administrator</p>
                                            </div>
                                            <div class="col-md-6 col-11">
                                                <div class="form-group">
                                                    <label for="">Jenis Akun <i class="bi bi-card-checklist"></i></label>
                                                    <select onchange="cekJenisAkun()" name="role" id="jenis_akun"
                                                        class="form-control" disabled>
                                                        <option value="adm">Administrator</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama Pegawai</label>
                                                    <input name="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="{{ old('name') }}">
                                                    @error('name')
                                                    <div id="alert-alert" class="alert alert-warning">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="" id="nim_username">Username</label><small
                                                        class="text-muted pl-1">--
                                                        Digunakan Untuk Login</small>
                                                    <input id="defusername" name="username" type="text"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        value="{{ old('username') }}">
                                                    @error('username')
                                                    <div id="alert-alert" class="alert alert-warning">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-check mt-1">
                                                        <input onchange="cekDefaultPass()" name="defaultpass" class="form-check-input" type="checkbox" value="1" id="cekboxDefaultPass">
                                                        <label class="form-check-label">
                                                          Gunakan Username sebagai password
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-11">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input name="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ old('email') }}">
                                                    @error('email')
                                                    <div id="alert-alert" class="alert alert-warning">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Status Akun</label>
                                                    <select name="check" class="form-control">
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Non Aktif</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input id="defaultPassword" name="password" class="form-control" type="password" >
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="bi bi-eye-slash"
                                                                aria-hidden="true"></i></span>
                                                            </div>
                                                    </div>
                                                    @error('password')
                                                    <div id="alert-alert" class="alert alert-warning">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mt-2">
                                                    Pastikan data telah terinput dengan benar
                                                </label>
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="submit" class="buttoncustom d-inline" data-text="Simpan">
                                                            <span>Simpan</span>
                                                        </button>
                                                        <div class="float-right d-inline"><div onclick="history.back()" class="btn btn-danger btn-sm">Kembali</div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end formulir -->

    {{-- daftar akun --}}
    <div class="row p-3 bg-light rounded-lg">
        <div class="col">
            <table id="example" class="table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }} <br><span class="badge badge-warning">username : {{ $item->username }}</span></td>
                        <td>{{ $item->email ? $item->email : "Email belum diisi" }}</td>
                        <td>
                            @if ($item->id != session()->get('id'))
                            <a href="{{ url('admin/users/'.$item->id.'/edit') }}"
                                class="d-inline btn btn-warning btn-sm mx-1" style="display: none">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form class="d-inline" action="{{ url('admin/users/'.$item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin Hapus Data?')"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                            @endif
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- end daftar akun --}}


</x-layout>