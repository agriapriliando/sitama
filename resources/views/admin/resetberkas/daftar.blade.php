<x-layout title="Admin - FAQ">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <div class="row p-3 bg-light rounded-lg">
        <div class="col-12">
            <p class="h4 text-dark">Halaman Reset Berkas</p>
            <div class="bg-warning rounded-lg mb-2 pt-1 px-2">
                <p class="text-dark">Perhatian !!!!, ini adalah halaman reset berkas. Berkas Mahasiswa yang telah direset akan dihapus secara permanen. 
                    <br>Pastikan kebenaran berkas tersebut sebelum melakukan reset berkas. <br>
                Daftar Berkas yang dihapus permanen : Scan Rekening Koran dan Scan Buku Tabungan</p>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {!! session('status') !!}
                </div>
            @endif
        </div>
        <div class="col-12">
            <table id="example" class="table-striped table-bordered display text-dark" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa /
                            <br>NIM
                        </th>
                        <th>Unduh Berkas</th>
                        <th>Reset Berkas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }} /<br>
                            NIM {{ $item->nim }}</td>
                        <td>
                            @if ($item->berkas_one == null && $item->berkas_two == null)
                                <p>Berkas Tidak Tersedia</p>
                            @endif
                            @if (!empty($item->berkas_one))
                            <a href="{{ url('admin/berkas_one/'.$item->berkas_one) }}" class="badge badge-success"><i class="bi bi-filetype-pdf"></i> Unduh Rekening Koran</a></span>
                            @endif
                            @if (!empty($item->berkas_two))
                            <br><a href="{{ url('admin/berkas_two/'.$item->berkas_two) }}" class="badge badge-success"><i class="bi bi-filetype-pdf"></i> Unduh Buku Rekening</a></span>
                            @endif
                        </td>
                        <td>
                            @if ($item->berkas_one != null || $item->berkas_two != null)
                            <form action="{{ url('admin/resetberkas/'.$item->id) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin Reset Berkas?')">
                                <i class="bi bi-recycle"></i></button>
                            </form>
                            @endif
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- end formulir -->

</x-layout>