<x-layout title="Admin - Dashboard">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- start daftar tabel mahasiswa -->
    <div class="row p-3 bg-light rounded-lg">
        <div class="col">
            <div class="row mb-2">
                <div class="col-12">
                    <p class="h3 text-dark judul-daftar-mahasiswa">Daftar Seluruh Mahasiswa Penerima Beasiswa</p>
                    @if (session('status'))
                    <div id="alert-alert" class="alert alert-success">
                        {!! session('status') !!}
                    </div>
                    @endif
                </div>
                <div class="col-md-6 col-12">
                    <a href="{{ url('admin/students/create') }}" data-text="Tambah" class="buttoncustom btn my-2 my-sm-0">
                        <span><i class="bi bi-plus"></i> Tambah</span>
                    </a>
                </div>
            </div>
            <table id="example" class="table-striped table-bordered display nowrap text-dark" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Beasiswa</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>
                            {{-- cek jika mahasiswa belum melengkapi data --}}
                            @if ($item->nama_rekening == null || $item->no_hp == null || $item->alamat == null || $item->bank == null || $item->no_rekening == null || $item->berkas_one == null || $item->berkas_two == null)
                            <span class="badge badge-danger">Data Belum Lengkap</span><br>
                            @endif
                            {{ $item->user->name }}
                             <br>NIM. {{ $item->nim }}
                             @if (!empty($item->berkas_one))
                             <br><a href="{{ url('admin/berkas_one/'.$item->berkas_one) }}" class="badge badge-success"><i class="bi bi-filetype-pdf"></i> Unduh Rekening Koran</a></span>
                             @endif
                             @if (!empty($item->berkas_two))
                             <br><a href="{{ url('admin/berkas_two/'.$item->berkas_two) }}" class="badge badge-success"><i class="bi bi-filetype-pdf"></i> Unduh Buku Rekening</a></span>
                             @endif
                        </td>
                        <td>{{ $item->program->name }}</td>
                        <td>{{ $item->scholarship->name }}<br><span class="badge badge-warning">Rp{{ number_format($item->scholarship->nominal,0,",",".") }}</span> <span class="badge badge-success">{{ $item->stat->name }}</span></td>
                        <td>
                            <a class="d-inline m-1 btn btn-warning btn-sm" href="{{ url('admin/students/'.$item->id.'/edit') }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ url('admin/students/'.$item->id) }}" method="POST" class="d-inline m-1">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Yakin ingin Hapus Data?')" type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- end daftar tabel mahasiswa -->

</x-layout>