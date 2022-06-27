<x-layout title="Admin - Program Studi">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/scholarships/'.$scholarship->id) }}" method="POST" class="rounded-lg">
        @method('PUT')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Ubah Jenis Beasiswa</p>
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Nama Beasiswa</label>
                            <input value="{{ old('name',$scholarship->name) }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
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
                                <input value="{{ old('nominal', $scholarship->nominal) }}" name="nominal" type="number" class="form-control @error('nominal') is-invalid @enderror" placeholder="Nominal" aria-label="Username"
                                    aria-describedby="basic-addon1">
                                @error('nominal')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
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