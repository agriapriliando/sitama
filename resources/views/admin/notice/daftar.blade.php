<x-layout title="Admin - Pengumuman">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/notices') }}" method="POST" class="rounded-lg"
        enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Tambah Pengumuman</p>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Judul Pengumuman</label>
                            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Isi Pengumuman</label>
                            <textarea name="content" cols="5" class="form-control @error('content') is-invalid @enderror"></textarea>
                            @error('content')
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
            <table id="example" class="table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notices as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }} <br><span class="badge badge-warning">updated {{ $item->updated_at }}</span></td>
                        <td>{{ Str::limit($item->content, 20, '...') }}</td>
                        <td>
                            <a href="{{ url('admin/notices/'.$item->id.'/edit') }}"
                                class="d-md-inline btn btn-warning btn-sm m-1">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form class="d-md-inline m-1" action="{{ url('admin/notices/'.$item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm  
                                @if ($item->title == "Pendaftaran" || $item->title == "Persyaratan" || $item->title == "Narahubung")
                                    d-none
                                @endif"
                                    onclick="return confirm('Yakin ingin Hapus Data?')"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- end formulir -->

</x-layout>