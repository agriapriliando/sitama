<x-layout title="Admin - Program Studi">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/programs') }}" method="POST" class="rounded-lg"
        enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Tambah Program Studi</p>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Nama Program Studi</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Jenjang</label>
                            <select name="jenjang" class="form-control @error('jenjang') is-invalid @enderror">
                                <option value="S1">S1 Sarjana</option>
                                <option value="S2">S2 Magister</option>
                                <option value="S3">S3 Doktor</option>
                            </select>
                            @error('jenjang')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Fakultas</label>
                            <select name="fakultas" class="form-control @error('fakultas') is-invalid @enderror">
                                <option value="Fakultas Keguruan dan Ilmu Pendidikan Kristen">Fakultas Keguruan dan Ilmu
                                    Pendidikan Kristen</option>
                                <option value="Fakultas Ilmu Sosial Keagamaan Kristen">Fakultas Ilmu Sosial Keagamaan
                                    Kristen</option>
                                <option value="Fakultas Seni Keagamaan Kristen">Fakultas Seni Keagamaan Kristen</option>
                                <option value="Pascasarjana">Pascasarjana</option>
                            </select>
                            @error('fakultas')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
                <button type="submit" id="buttoncustom" data-text="Simpan" class="btn btn-purple">
                    <span>Simpan</span>
                </button>
            </div>
        </div>
        <hr />
        
    </form>
    <div class="row p-3 bg-light rounded-lg">
        <div class="col">
            <table id="example" class="table table-striped table-bordered display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Program Studi</th>
                        <th>Fakultas</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programs as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }} <span class="badge badge-warning">{{ $item->jenjang }}</span></td>
                        <td>{{ $item->fakultas }}</td>
                        <td>
                            <a href="{{ url('admin/programs/'.$item->id.'/edit') }}"
                                class="d-inline btn btn-warning btn-sm mx-1">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form class="d-inline" action="{{ url('admin/programs/'.$item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin Hapus Data?')"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Program Studi</th>
                        <th>Jenjang</th>
                        <th>Kelola</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- end formulir -->

</x-layout>