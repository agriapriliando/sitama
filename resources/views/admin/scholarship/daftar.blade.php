<x-layout title="Admin - Program Studi">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/scholarships') }}" method="POST" class="rounded-lg"
        enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Tambah Jenis Beasiswa</p>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Nama Beasiswa</label>
                            <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Nominal</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input value="{{ old('nominal') }}" name="nominal" type="text"
                                    class="form-control @error('nominal') is-invalid @enderror" placeholder="Masukan hanya angka"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            @error('nominal')
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
                        <th>Jenis Beasiswa</th>
                        <th>Nominal</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scholarships as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }} <span class="badge badge-warning">updated {{ $item->updated_at }}</span>
                        </td>
                        <td>Rp{{ number_format($item->scholarship->nominal,0,",",".") }}</td>
                        <td>
                            <a href="{{ url('admin/scholarships/'.$item->id.'/edit') }}"
                                class="d-inline btn btn-warning btn-sm mx-1">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form class="d-inline" action="{{ url('admin/scholarships/'.$item->id) }}" method="POST">
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