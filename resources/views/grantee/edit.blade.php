<x-layout title="Dashboard">
    <x-navbar></x-navbar>
    <!-- formulir -->
    <form id="formcustom" action="{{ url('beasiswa/update') }}" method="POST" class="rounded-lg mb-3" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row p-4">
            <div class="col-12 p-2 rounded-lg">
                <p class="text-dark text-center">Hai <b>{{ session()->get('name') }} - Anda adalah Penerima Beasiswa</b> <a href="{{ url('logout') }}" class="badge badge-danger">Logout</a></p>
            </div>
            <div class="col-12">
                <div class="alert {{ $count == 5 ? 'bg-success text-dark' : 'bg-danger text-light' }}" role="alert">
                    @if (session('status'))
                    <h4 class="alert-heading text-light">{{ session('status') }}</h4>
                    @endif
                    <p class="text-light">{{ $status_lengkap }}</p>
                </div>
                <p class="h3 text-dark">Update Data Anda</p>
                <div class="row">
                    <div class="col">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <button class="rounded-lg d-inline mb-2 buttoncustom"
                                        data-text="Update Data Mahasiswa" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        <span>Update Data Mahasiswa</span>
                                    </button>
                                    <button class="rounded-lg collapsed d-inline mb-2 buttoncustom"
                                        data-text="Upload Berkas" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <span>Upload Berkas</span>
                                    </button>
                                    <button class="rounded-lg collapsed d-inline buttoncustom"
                                        data-text="Kelola Akun" type="button" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <span>Kelola Akun</span>
                                    </button>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row" id="isian_untuk_mhs">
                                            <div class="col-12">
                                                <p class="h5 text-dark">Data Mahasiswa</p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Nama Anda</label><small class="text-muted"> - Hanya bisa dirubah oleh Pengelola</small>
                                                    <input type="text" class="form-control" value="{{ $student->user->name }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">NIM (Nomor Induk Mahasiswa)</label><small class="text-muted"> - Hanya bisa dirubah oleh Pengelola</small>
                                                    <input type="text" class="form-control" value="{{ $student->nim }}" disabled>
                                                </div>
                                                <div>
                                                    <img class="mb-2" width="100" src="{{ asset('storage/foto/'.$student->foto) }}" alt="">
                                                    {{-- <img width="100" src="/images/profile_default.jpg" alt=""> --}}
                                                    <div class="form-group" style="top: 40px; right:0">
                                                        <div class="custom-file">
                                                            <input name="foto" type="file" class="custom-file-input @error('img') is-invalid @enderror"
                                                                id="customFileLang" lang="es">
                                                            <label class="custom-file-label" for="customFileLang">Pilih
                                                                Upload Foto</label>
                                                            <small class="form-text text-muted pl-1">Foto 3x4 Formal
                                                                Ukuran Maksimal
                                                                500KB</small>
                                                        </div>
                                                    </div>
                                                    @error('img')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
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
                                                    <select name="bank" class="form-control @error('bank') is-invalid @enderror">
                                                        <option value="">= Pilih Bank =</option>
                                                        <option value="BRI Bank Rakyat Indonesia" {{ $student->bank == "BRI Bank Rakyat Indonesia" ? 'selected' : null}}>BRI Bank Rakyat
                                                            Indonesia</option>
                                                        <option value="BTN Bank Tabungan Negara" {{ $student->bank == "BTN Bank Tabungan Negara" ? 'selected' : null}}>BTN Bank Tabungan
                                                            Negara</option>
                                                    </select>
                                                    @error('bank')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">No Rekening</label>
                                                    <input value="{{ old('no_rekening', $student->no_rekening) }}" name="no_rekening" type="number" class="form-control @error('no_rekening') is-invalid @enderror">
                                                    @error('no_rekening')
                                                    <div id="alert-alert" class="alert alert-warning">{{ $message }}</div>
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
                                                    <input placeholder="Gunakan koma jika lebih dari satu. Cont : 0808080808, 09090909090" name="no_hp" type="text"
                                                        class="form-control @error('no_hp') is-invalid @enderror"
                                                        value="{{ old('no_hp', $student->no_hp) }}">
                                                    @error('no_hp')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Program Studi</label>
                                                            <select class="form-control" disabled>
                                                                <option value="">{{ $student->program->jenjang }} {{ $student->program->name }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Jenis Beasiswa</label>
                                                            <select class="form-control" disabled>
                                                                <option value="">{{ $student->scholarship->name }} Rp{{ number_format($student->scholarship->nominal,0,",",".") }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-center">IP (Indeks Prestasi diisi oleh Admin Fakultas)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">IP Semester 1</label>
                                                            @if ($student->ip_one == null)
                                                            <input value="{{ $student->ip_one }}" type="number" class="form-control" disabled>
                                                            @elseif ($student->ip_one > 2.74)
                                                            <input value="{{ $student->ip_one }}" type="number" class="form-control bg-success" disabled>
                                                            @else    
                                                            <input value="{{ $student->ip_one }}" type="number" class="form-control bg-danger" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 2</label>
                                                            @if ($student->ip_two == null)
                                                            <input value="{{ $student->ip_two }}" type="number" class="form-control" disabled>
                                                            @elseif ($student->ip_two > 2.74)
                                                            <input value="{{ $student->ip_two }}" type="number" class="form-control bg-success" disabled>
                                                            @else    
                                                            <input value="{{ $student->ip_two }}" type="number" class="form-control bg-danger" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 3</label>
                                                            @if ($student->ip_three == null)
                                                            <input value="{{ $student->ip_three }}" type="number" class="form-control" disabled>
                                                            @elseif ($student->ip_three > 2.74)
                                                            <input value="{{ $student->ip_three }}" type="number" class="form-control bg-success" disabled>
                                                            @else    
                                                            <input value="{{ $student->ip_three }}" type="number" class="form-control bg-danger" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 4</label>
                                                            @if ($student->ip_four == null)
                                                            <input value="{{ $student->ip_four }}" type="number" class="form-control" disabled>
                                                            @elseif ($student->ip_four > 2.74)
                                                            <input value="{{ $student->ip_four }}" type="number" class="form-control bg-success" disabled>
                                                            @else    
                                                            <input value="{{ $student->ip_four }}" type="number" class="form-control bg-danger" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">IP Semester 5</label>
                                                            @if ($student->ip_five == null)
                                                            <input value="{{ $student->ip_five }}" type="number" class="form-control" disabled>
                                                            @elseif ($student->ip_five > 2.74)
                                                            <input value="{{ $student->ip_five }}" type="number" class="form-control bg-success" disabled>
                                                            @else    
                                                            <input value="{{ $student->ip_five }}" type="number" class="form-control bg-danger" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 6</label>
                                                            @if ($student->ip_six == null)
                                                            <input value="{{ $student->ip_six }}" type="number" class="form-control" disabled>
                                                            @elseif ($student->ip_six > 2.74)
                                                            <input value="{{ $student->ip_six }}" type="number" class="form-control bg-success" disabled>
                                                            @else    
                                                            <input value="{{ $student->ip_six }}" type="number" class="form-control bg-danger" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 7</label>
                                                            @if ($student->ip_seven == null)
                                                            <input value="{{ $student->ip_seven }}" type="number" class="form-control" disabled>
                                                            @elseif ($student->ip_seven > 2.74)
                                                            <input value="{{ $student->ip_seven }}" type="number" class="form-control bg-success" disabled>
                                                            @else    
                                                            <input value="{{ $student->ip_seven }}" type="number" class="form-control bg-danger" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">IP Semester 8</label>
                                                            @if ($student->ip_eight == null)
                                                            <input value="{{ $student->ip_eight }}" type="number" class="form-control" disabled>
                                                            @elseif ($student->ip_eight > 2.74)
                                                            <input value="{{ $student->ip_eight }}" type="number" class="form-control bg-success" disabled>
                                                            @else    
                                                            <input value="{{ $student->ip_eight }}" type="number" class="form-control bg-danger" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">IPK (Indeks Prestasi Kumulatif)</label>
                                                            @if ($student->ipk == null)
                                                            <input value="{{ $student->ipk }}" type="number" class="form-control" disabled>
                                                            @elseif ($student->ipk > 2.74)
                                                            <input value="{{ $student->ipk }}" type="number" class="form-control bg-success" disabled>
                                                            @else    
                                                            <input value="{{ $student->ipk }}" type="number" class="form-control bg-danger" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <p>Keterangan :</p>
                                                                <p>Warna Merah = IP dibawah ambang batas 2.74</p>
                                                                <p>Warna Hijau = IP diatas ambang batas 2.74</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="h5 text-dark">Upload Berkas <span class="badge badge-warning">File Wajib PDF Ukuran maksimal 500KB</span></p>
                                            </div>
                                            <hr />
                                            <div class="col-md-6 col-11">
                                                <div class="form-group mb-3">
                                                    <label>Rekening Koran
                                                        @if ($student->berkas_one != null)
                                                        <a target="_blank" href="{{ url('download/'.$student->berkas_one) }}" class="badge badge-success">
                                                            Berkas Tersedia | Download
                                                        </a>
                                                        @else
                                                        <a href="#" class="badge badge-danger">
                                                            Berkas Belum Diupload
                                                        </a>
                                                        @endif
                                                    </label>
                                                    <input name="berkas_one" type="file" class="border form-control-file @error('berkas_one') is-invalid @enderror">
                                                    @error('berkas_one')
                                                    <div id="alert-alert" class="alert alert-warning">{{ $message }}</div>
                                                    @enderror
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
                                                <div class="form-group {{ $count == 5 ? 'bg-success text-dark' : 'bg-danger text-light' }} rounded-lg pt-1">
                                                    <p class="text-center text-light">Update Data Terakhir pada {{ date_format($student->updated_at,"d-m-Y H:i") }} WIB<br>
                                                        <span>{{ $status_lengkap }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="h5 text-dark">Akun Anda</p>
                                            </div>
                                            <div class="col-md-6 col-11">
                                                <div class="form-group">
                                                    <label for="">Nama Anda</label><small class="text-muted"> - Hanya bisa dirubah oleh Pengelola</small>
                                                    <input name="name" type="text" class="form-control" value="{{ $student->user->name }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">NIM (Nomor Induk Mahasiswa)</label><small class="text-muted"> - Hanya bisa dirubah oleh Pengelola</small>
                                                    <input type="text" class="form-control" value="{{ $student->nim }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-11">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input name="email" type="email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label><small> - Isi jika ingin mengganti password</small>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input class="form-control" type="password">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i
                                                                    class="bi bi-eye-slash"
                                                                    aria-hidden="true"></i></span>
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

                <label class="mt-2 text-dark">
                    Pastikan data telah terinput dengan benar. Segala kesalahan data yang terinput menjadi tanggung jawab anda.
                </label>
                <button class="buttoncustom" data-text="Perbaharui Data">
                    <span>Perbaharui Data</span>
                </button>
            </div>
        </div>
    </form>
    <!-- end formulir -->
</x-layout>