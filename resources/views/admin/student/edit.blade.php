<x-layout title="Admin - Akun">
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/students/'.$student->id) }}" method="POST" class="rounded-lg mb-3"
        autocomplete="off">
        @method('PUT')
        @csrf
        <div class="row p-4">
            <div class="col">
                <div class="row">
                    <div class="col mb-2">
                        <p class="h4 text-dark" style="font-weight: bold">Ubah Data Mahasiswa</p>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <button class="rounded-lg collapsed d-inline buttoncustom mb-2"
                                        data-text="Akun" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>Akun</span>
                                    </button>
                                    <button class="rounded-lg d-inline buttoncustom mb-2"
                                        data-text="Data Mahasiswa" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <span>Data Mahasiswa</span>
                                    </button>
                                    <button class="rounded-lg d-inline buttoncustom"
                                        data-text="Lihat Berkas" type="button" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span>Lihat Berkas</span>
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="h5 text-dark">Akun Mahasiswa</p>
                                            </div>
                                            <div class="col-md-6 col-11">
                                                <div class="form-group">
                                                    <label for="">Jenis Akun <i
                                                            class="bi bi-card-checklist"></i></label>
                                                    <select onchange="cekJenisAkun()" name="role" id="jenis_akun"
                                                        class="form-control" disabled>
                                                        <option value="mhs">Mahasiswa</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama</label>
                                                    <input name="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="{{ old('name', $student->user->name) }}">
                                                    @error('name')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="" id="nim_username">Username / NIM Mahasiswa</label><small
                                                        class="text-muted pl-1">--
                                                        Digunakan Untuk Login</small>
                                                    <input id="defusername" name="username" type="text"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        value="{{ old('username', $student->user->username) }}">
                                                    @error('username')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-check mt-1">
                                                        <input onchange="cekDefaultPass()" name="defaultpass" class="form-check-input" type="checkbox" value="1" id="cekboxDefaultPass">
                                                        <label class="form-check-label">
                                                          Pilih Maka Password sama dengan Username / NIM Mahasiswa
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-11">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input name="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ old('email', $student->user->email) }}">
                                                    @error('email')
                                                    <div class="alert alert-warning">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Status Akun</label>
                                                    <select name="check" class="form-control">
                                                        <option value="1" {{ $student->user->check == 1 ? 'selected' :
                                                            null }}>Aktif</option>
                                                        <option value="0" {{ $student->user->check == 0 ? 'selected' :
                                                            null }}>Non Aktif</option>
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
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row" id="isian_untuk_mhs">
                                            <div class="col-12">
                                                <p class="h5 text-dark">Data Mahasiswa</p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Pilih Program Studi</label>
                                                    <select name="program_id" class="form-control">
                                                        <option value="">= Pilih Prodi =</option>
                                                        @foreach ($programs as $item)
                                                        <option value="{{ $item->id }}" {{ old('program_id',$student->
                                                            program_id) == $item->id ? 'selected' : null }}>{{
                                                            $item->jenjang }} - {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Pilih Jenis Beasiswa</label>
                                                    <select name="scholarship_id"
                                                        class="form-control @error('scholarship_id') is-invalid @enderror">
                                                        <option value="">= Pilih Jenis Beasiswa =</option>
                                                        @foreach ($scholarships as $item)
                                                        <option value="{{ $item->id }}" {{
                                                            old('scholarship_id',$student->scholarship_id) == $item->id
                                                            ? 'selected' : null }}>{{ $item->name }} - RP {{ number_format($item->nominal,0,",",".") }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('scholarship_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Status Penerima Beasiswa</label>
                                                    <select name="stat_id"
                                                        class="form-control @error('stat_id') is-invalid @enderror">
                                                        <option value="">= Pilih Status Penerima Beasiswa =</option>
                                                        @foreach ($stats as $item)
                                                        <option value="{{ $item->id }}" {{
                                                            old('stat_id',$student->stat_id) == $item->id
                                                            ? 'selected' : null }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('scholarship_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Tahun Mulai Menerima Beasiswa</label>
                                                    <select name="tahun_beasiswa" class="form-control @error('tahun_beasiswa') is-invalid @enderror">
                                                        @foreach (range( date('Y'), 2010 ) as $item)
                                                            @if (old('tahun_beasiswa', $student->tahun_beasiswa) == $item)
                                                                <option value="{{ $item }}" selected>{{ $item }}</option>
                                                            @else
                                                                <option value="{{ $item }}">{{ $item }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('tahun_beasiswa')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">NIM Mahasiwa</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->nim }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama sesuai Rekening Bank</label>
                                                    <input name="nama_rekening" type="text"
                                                        class="form-control @error('nama_rekening') is-invalid @enderror"
                                                        value="{{ old('nama_rekening', $student->nama_rekening) }}">
                                                    @error('nama_rekening')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Pilih Bank</label>
                                                    <select name="bank" class="form-control">
                                                        <option value="">= Pilih Bank =</option>
                                                        <option value="BRI Bank Rakyat Indonesia" {{ $student->bank ==
                                                            'BRI Bank Rakyat Indonesia' ? 'selected' : null }}>BRI Bank
                                                            Rakyat Indonesia</option>
                                                        <option value="BTN Bank Tabungan Negara" {{ $student->bank ==
                                                            'BTN Bank Tabungan Negara' ? 'selected' : null }}>BTN Bank
                                                            Tabungan Negara</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">No Rekening</label><small class="text-muted"> - Tanpa memakai Spasi</small>
                                                    <input name="no_rekening" type="number"
                                                        class="form-control @error('no_rekening') is-invalid @enderror"
                                                        value="{{ old('no_rekening', $student->no_rekening) }}">
                                                    @error('no_rekening')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Alamat</label>
                                                    <small class="form-text text-muted pb-2 mt-0 pt-0">Isi Alamat
                                                        Lengkap; Jalan, RT RW
                                                        Kecamatan Kelurahan</small>
                                                        <textarea placeholder="Jalan ... RT RW Kelurahan .. Kecamatan .. Kabupaten Kota.." name="alamat" rows="3"
                                                        class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $student->alamat) }}</textarea>
                                                    @error('alamat')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">No Handphone</label><small class="text-muted"> Utamakan Whatsapp Aktif</small>
                                                    <input placeholder="Gunakan koma jika lebih dari satu. Contoh : 0808080808, 09090909090" name="no_hp" type="text"
                                                        class="form-control @error('no_hp') is-invalid @enderror"
                                                        value="{{ old('no_hp', $student->no_hp) }}">
                                                    @error('no_hp')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <a target="_blank" href="{{ asset('images/profile_default.jpg') }}">
                                                        <img src="{{ asset('images/profile_default.jpg') }}"
                                                            style="max-width: 100px">
                                                    </a>
                                                    <div class="custom-file">
                                                        <input name="img" type="file"
                                                            class="custom-file-input @error('img') is-invalid @enderror"
                                                            id="customFileLang" lang="es">
                                                        <label class="custom-file-label" for="customFileLang">Pilih
                                                            Upload Foto</label>
                                                        <small class="form-text text-muted pl-1">Foto 3x4 Formal, Ukuran
                                                            Maksimal
                                                            400KB</small>
                                                    </div>
                                                    @error('img')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-dark">Gunakan Titik sebagai pemisah. <span class="text-muted">Contoh : 3.25</span></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">IP Semester 1</label>
                                                            <input value="{{ old('ip_one', $student->ip_one) }}" name="ip_one" type="text"
                                                                class="form-control @error('ip_one') is-invalid @enderror">
                                                            @error('ip_one')
                                                            <div id="alert-alert" class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 2</label>
                                                            <input value="{{ old('ip_two', $student->ip_two) }}" name="ip_two" type="text"
                                                                class="form-control @error('ip_two') is-invalid @enderror">
                                                            @error('ip_two')
                                                            <div id="alert-alert" class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 3</label>
                                                            <input value="{{ old('ip_three', $student->ip_three) }}" name="ip_three" type="text"
                                                                class="form-control @error('ip_three') is-invalid @enderror">
                                                            @error('ip_three')
                                                            <div id="alert-alert" class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 4</label>
                                                            <input value="{{ old('ip_four', $student->ip_four) }}" name="ip_four" type="text"
                                                                class="form-control @error('ip_four') is-invalid @enderror">
                                                            @error('ip_four')
                                                            <div id="aler-alert" class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">IP Semester 5</label>
                                                            <input value="{{ old('ip_five', $student->ip_five) }}" name="ip_five" type="text"
                                                                class="form-control @error('ip_five') is-invalid @enderror">
                                                            @error('ip_five')
                                                            <div id="alert-alert" class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 6</label>
                                                            <input value="{{ old('ip_six', $student->ip_six) }}" name="ip_six" type="text"
                                                                class="form-control @error('ip_six') is-invalid @enderror">
                                                            @error('ip_six')
                                                            <div id="alert-alert" class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 7</label>
                                                            <input value="{{ old('ip_seven', $student->ip_seven) }}" name="ip_seven" type="text"
                                                                class="form-control @error('ip_seven') is-invalid @enderror">
                                                            @error('ip_seven')
                                                            <div id="alert-alert" class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 8</label>
                                                            <input value="{{ old('ip_eight', $student->ip_eight) }}" name="ip_eight" type="text"
                                                                class="form-control @error('ip_eight') is-invalid @enderror">
                                                            @error('ip_eight')
                                                            <div id="alert-alert" class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>IPK</label><small class="text-muted"> - Indeks Prestasi Kumulatif</small>
                                                            @if ($student->ipk == 0 || $student->ipk == null)
                                                            <input class="form-control" type="text" value="IPS Belum Diisi, IPK tidak bisa terhitung" readonly>
                                                            @else
                                                            <input class="form-control" type="text" value="{{ $student->ipk }}" readonly>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Catatan</label>
                                                            <small class="form-text text-muted pb-2 mt-0 pt-0">Keterangan tertentu</small>
                                                                <textarea placeholder="Contoh : Aktif-Mutasi sejak tahun akademik 2021 Ganjil melanjutkan NIM 90909090 , scan rekening koran tidak terbaca, belum mengumpulkan berkas fisik" name="note" rows="3"
                                                                class="form-control @error('note') is-invalid @enderror">{{ old('note', $student->note) }}</textarea>
                                                            @error('note')
                                                            <div id="alert-alert" class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="h5 text-dark">Daftar Berkas <span class="badge badge-warning">File Wajib PDF Ukuran maksimal 500KB</span></p>
                                            </div>
                                            <hr />
                                            <div class="col-md-6 col-11">
                                                <div class="form-group mb-3">
                                                    <label>Rekening Koran
                                                        @if ($student->berkas_one != null)
                                                        <a target="_blank" href="{{ url('admin/file/'.$student->berkas_one) }}" class="badge badge-success">
                                                            Berkas Tersedia | Download
                                                        </a>
                                                        @else
                                                        <a href="#" class="badge badge-danger">
                                                            Berkas Belum Diupload
                                                        </a>
                                                        @endif
                                                    </label>
                                                    {{-- <input name="berkas_one" type="file" class="border form-control-file @error('berkas_one') is-invalid @enderror">
                                                    @error('berkas_one')
                                                    <div id="alert-alert" class="alert alert-warning">{{ $message }}</div>
                                                    @enderror --}}
                                                </div>
                                                <div class="form-group mb-3 d-none">
                                                    <label>Pakta Integritas <a href="#" class="badge badge-success">Download Berkas</a></label>
                                                    <input name="" type="file" class="border form-control-file">
                                                </div>
                                                <div class="form-group mb-3 d-none">
                                                    <label>Rekening Koran <a href="#" class="badge badge-success">Download Berkas</a></label>
                                                    <input name="" type="file" class="border form-control-file">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-11">
                                                <div class="form-group mb-3 d-none">
                                                    <label>Rekening Koran <a href="#" class="badge badge-success">Download Berkas</a></label>
                                                    <input name="" type="file" class="border form-control-file">
                                                </div>
                                                <div class="form-group mb-3 d-none">
                                                    <label>Rekening Koran <a href="#" class="badge badge-success">Download Berkas</a></label>
                                                    <input name="" type="file" class="border form-control-file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
    </form>
    <!-- end formulir -->
</x-layout>