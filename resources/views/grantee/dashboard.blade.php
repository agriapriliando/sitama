<x-layout title="Dashboard">
    <x-navbar></x-navbar>

    {{-- dashboard --}}
    <div class="row p-3 bg-light rounded-lg">
        <div class="col-12 p-2 rounded-lg">
            <p class="text-dark text-center">Hai <b>{{ session()->get('name') }} - Anda adalah Penerima Beasiswa</b> <a href="{{ url('logout') }}" class="badge badge-danger">Logout</a></p>
            @if ($count != 6)
            <p class="bg-danger text-light p-2 rounded-lg text-center">Anda Belum Perbaharui Data <br>Siapkan Scan Rekening Koran dan Scan Buku Rekening, klik Tombol<br>
                <a class="text-light" style="text-decoration: underline;" href="{{ url('beasiswa/update') }}">Perbaharui Data</a>
            </p>
            @endif
        </div>
        <div class="col-md-6 col-12">
            <div>
                <a href="{{ url('beasiswa/update') }}" data-text="Perbaharui Data" class="btn my-2 my-sm-0 buttoncustom"><span><i
                    class="bi bi-person-circle"></i> Perbaharui Data</span></a>
            </div>
            <p class="h4 text-dark pt-3">Kilas Indeks Prestasi Anda <span class="badge {{ $student->ipk > 2.74 ? 'badge-success' : 'badge-danger' }}">IPK = {{ $student->ipk }}</span></p>
            </p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>IPS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Semester 1</th>
                        @if ($student->ip_one == null)
                        <th>Belum ditempuh</th>
                        @elseif ($student->ip_one > 2.74)
                        <th class="bg-success text-light">{{ $student->ip_one }}</th>
                        @else
                        <th class="bg-danger text-light">{{ $student->ip_one }}</th>
                        @endif
                    </tr>
                    <tr>
                        <th>Semester 2</th>
                        @if ($student->ip_two == null)
                        <th>Belum ditempuh</th>
                        @elseif ($student->ip_two > 2.74)
                        <th class="bg-success text-light">{{ $student->ip_two }}</th>
                        @else
                        <th class="bg-danger text-light">{{ $student->ip_two }}</th>
                        @endif
                    </tr>
                    <tr>
                        <th>Semester 3</th>
                        @if ($student->ip_three == null)
                        <th>Belum ditempuh</th>
                        @elseif ($student->ip_three > 2.74)
                        <th class="bg-success text-light">{{ $student->ip_three }}</th>
                        @else
                        <th class="bg-danger text-light">{{ $student->ip_three }}</th>
                        @endif
                    </tr>
                    <tr>
                        <th>Semester 4</th>
                        @if ($student->ip_four == null)
                        <th>Belum ditempuh</th>
                        @elseif ($student->ip_four > 2.74)
                        <th class="bg-success text-light">{{ $student->ip_four }}</th>
                        @else
                        <th class="bg-danger text-light">{{ $student->ip_four }}</th>
                        @endif
                    </tr>
                    <tr>
                        <th>Semester 5</th>
                        @if ($student->ip_five== null)
                        <th>Belum ditempuh</th>
                        @elseif ($student->ip_five> 2.74)
                        <th class="bg-success text-light">{{ $student->ip_five}}</th>
                        @else
                        <th class="bg-danger text-light">{{ $student->ip_five}}</th>
                        @endif
                    </tr>
                    <tr>
                        <th>Semester 6</th>
                        @if ($student->ip_six == null)
                        <th>Belum ditempuh</th>
                        @elseif ($student->ip_six > 2.74)
                        <th class="bg-success text-light">{{ $student->ip_six }}</th>
                        @else
                        <th class="bg-danger text-light">{{ $student->ip_six }}</th>
                        @endif
                    </tr>
                    <tr>
                        <th>Semester 7</th>
                        @if ($student->ip_seven == null)
                        <th>Belum ditempuh</th>
                        @elseif ($student->ip_seven > 2.74)
                        <th class="bg-success text-light">{{ $student->ip_seven }}</th>
                        @else
                        <th class="bg-danger text-light">{{ $student->ip_seven }}</th>
                        @endif
                    </tr>
                    <tr>
                        <th>Semester 8</th>
                        @if ($student->ip_eight == null)
                        <th>Belum ditempuh</th>
                        @elseif ($student->ip_eight > 2.74)
                        <th class="bg-success text-light">{{ $student->ip_eight }}</th>
                        @else
                        <th class="bg-danger text-light">{{ $student->ip_eight }}</th>
                        @endif
                    </tr>
                </tbody>
            </table>
            <p class="text-dark">Keterangan IP : <br> Hijau = Melewati ambang batas 2.75 <br> Merah = dibawah ambang batas 2.75 </p>
        </div>
        <div class="col-md-6 col-12">
            <p class="h4 text-dark text-center">Pengumuman Terbaru</p>
            <div class="row">
                @foreach ($notices as $item)
                <div class="col-12">
                    <div class="card text-dark">
                        <div class="card-body bg-warning">
                            <div class="card-subtitle"><i class="bi bi-alarm"></i> Rilis : {{ $item->updated_at }} <span>oleh {{ $item->user->name }}</span></div>
                            <p class="h5">{{ $item->title }}</p>
                            <div class="card-text">{!! $item->content !!}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- end dashboard --}}
    <!-- start daftar tabel mahasiswa -->
    <div class="row p-3 bg-light rounded-lg">
        <div class="col">
            <p class="h3 text-dark">Daftar Mahasiswa Penerima Beasiswa</p>
            <table id="example" class="table-striped table-bordered display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Status | Beasiswa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }} <br>NIM {{ $item->nim }}</td>
                        <td>{{ $item->program->name }}</td>
                        <td>{{ $item->stat->name }} | {{ $item->scholarship->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- end daftar tabel mahasiswa -->
</x-layout>