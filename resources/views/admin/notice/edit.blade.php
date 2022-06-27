<x-layout title="Admin - Pengumuman">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/notices/'.$notice->id) }}" method="POST" class="rounded-lg">
        @method('PUT')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Ubah Pengumuman</p>
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Judul</label>
                            <input value="{{ old('title',$notice->title) }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            @if ($notice->title == "Pendaftaran" || $notice->title == "Persyaratan" || $notice->title == "Narahubung")
                                readonly
                            @endif>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Isi</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" cols="6">{{ old('content',$notice->content) }}</textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
                <button id="buttoncustom" data-text="Simpan" class="btn btn-purple">
                    <span>Simpan</span>
                </button>
            </div>
        </div>
        <hr />
    </form>
    <!-- end formulir -->

</x-layout>