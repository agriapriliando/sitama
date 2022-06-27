<x-layout title="Admin - SITAMA">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/users/'.$user->id) }}" method="POST" class="rounded-lg mb-3"
        autocomplete="off">
        @method('PATCH')
        @csrf
        <div class="row p-4">
            <div class="col">
                <div class="row">
                    <div class="col mb-2">
                        <p class="text-dark text-center">Hai {{ session()->get('name') }} - Anda <b>{{ session()->get('jenis_akun') }}</b> <a href="{{ url('logout') }}" class="badge badge-danger">Logout</a></p>
                        <p class="h3 text-dark">Edit Akun <b>{{ $user->name }}</b>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <button class="rounded-lg collapsed d-inline buttoncustom mb-2"
                                        data-text="Ubah Akun" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>Ubah Akun</span>
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="h5 text-dark">Ubah Akun Administrator</p>
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
                                                        value="{{ old('name',$user->name) }}">
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
                                                        value="{{ old('username', $user->username) }}">
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
                                                        value="{{ old('email', $user->email) }}">
                                                    @error('email')
                                                    <div id="alert-alert" class="alert alert-warning">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Status Akun</label>
                                                    <select name="check" class="form-control">
                                                        <option value="1" {{ $user->check == 1 ? 'selected' : null }}>Aktif</option>
                                                        <option value="0" {{ $user->check == 0 ? 'selected' : null }}>Non Aktif</option>
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


</x-layout>