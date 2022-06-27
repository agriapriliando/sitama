<x-layout title="Admin - Status Beasiswa">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/stats/'.$stat->id) }}" method="POST" class="rounded-lg">
        @method('PUT')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Ubah Status Penerima Beasiswa</p>
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Nama Status Penerima Beasiswa</label>
                            <input value="{{ old('name',$stat->name) }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Keterangan atau penjelasan</label>
                            <input value="{{ old('note',$stat->note) }}" name="note" type="text" class="form-control @error('name') is-invalid @enderror">
                            @error('note')
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