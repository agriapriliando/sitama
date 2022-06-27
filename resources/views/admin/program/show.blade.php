<x-layout title="Admin - Program Studi">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/programs/'.$program->id) }}" method="POST" class="rounded-lg">
        @method('PUT')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Ubah Program Studi</p>
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Nama Program Studi</label>
                            <input value="{{ old('name',$program->name) }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Jenjang</label>
                            <select name="jenjang" class="form-control">
                                <option value="S1" {{ $program->jenjang == 'S1' ? 'selected' : '' }}>S1 Sarjana</option>
                                <option value="S2" {{ $program->jenjang == 'S2' ? 'selected' : '' }}>S2 Magister</option>
                                <option value="S3" {{ $program->jenjang == 'S3' ? 'selected' : '' }}>S3 Doktor</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Fakultas</label>
                            <select name="fakultas" class="form-control">
                                <option value="Fakultas Keguruan dan Ilmu Pendidikan Kristen" {{ $program->fakultas == 'Fakultas Keguruan dan Ilmu Pendidikan Kristen' ? 'selected' : '' }}>Fakultas Keguruan dan Ilmu Pendidikan Kristen</option>
                                <option value="Fakultas Ilmu Sosial Keagamaan Kristen" {{ $program->fakultas == 'Fakultas Ilmu Sosial Keagamaan Kristen' ? 'selected' : '' }}>Fakultas Ilmu Sosial Keagamaan Kristen</option>
                                <option value="Fakultas Seni Keagamaan Kristen" {{ $program->fakultas == 'Fakultas Seni Keagamaan Kristen' ? 'selected' : '' }}>Fakultas Seni Keagamaan Kristen</option>
                                <option value="Pascasarjana" {{ $program->fakultas == 'Pascasarjana' ? 'selected' : '' }}>Pascasarjana</option>
                            </select>
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