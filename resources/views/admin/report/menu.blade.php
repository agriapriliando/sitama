<x-layout title="Admin - Program Studi">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/reports') }}" method="POST" class="rounded-lg">
        @method('PUT')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Menu Cetak Laporan HTML</p>
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Pilih Versi Laporan</label>
                            <select name="report_version" class="form-control @error('report_version') is-invalid @enderror">
                                <option value="">= Pilih Versi =</option>
                                <option value="fakultasone">Versi Fakultas Satu</option>
                                <option value="fakultastwo">Versi Fakultas Dua</option>
                                <option value="keuanganone">Versi Keuangan Satu</option>
                                <option value="keuangantwo">Versi Keuangan Dua</option>
                                <option value="monitoring">Monitoring</option>
                            </select>
                            @error('report_version')
                            <div id="alert-alert" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Pilih Program Studi</label>
                            <select name="program_id" class="form-control @error('program_id') is-invalid @enderror">
                                <option value="">= Semua Program Studi =</option>
                                @foreach ($programs as $item)
                                    @if (old('program_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->jenjang }} - {{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->jenjang }} - {{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('program_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Pilih Jenis Beasiswa</label>
                            <select name="scholarship_id" class="form-control @error('scholarship_id') is-invalid @enderror">
                                <option value="">= Semua Jenis Beasiswa =</option>
                                @foreach ($scholarships as $item)
                                    @if (old('scholarship_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->jenjang }} - {{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->jenjang }} - {{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('scholarship_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Status Penerima Beasiswa</label>
                            <select name="stat_id" class="form-control">
                                <option value="">= Semua Status =</option>
                                @foreach ($stats as $item)
                                    @if (old('stat_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('stat_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </select>
                            </select>
                        </div>
                    </div>

                </div>
                <button id="buttoncustom" data-text="Cetak" class="btn btn-purple">
                    <span>Cetak</span>
                </button>
            </div>
        </div>
        <hr />
    </form>
    <!-- end formulir -->
    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/reports/unduh') }}" method="POST" class="rounded-lg">
        @method('PUT')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Menu Unduh Laporan PDF</p>
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Pilih Versi Laporan</label>
                            <select name="report_version" class="form-control @error('report_version') is-invalid @enderror">
                                <option value="">= Pilih Versi =</option>
                                <option value="fakultasone">Versi Fakultas Satu</option>
                                <option value="fakultastwo">Versi Fakultas Dua</option>
                                <option value="keuanganone">Versi Keuangan Satu</option>
                                <option value="keuangantwo">Versi Keuangan Dua</option>
                                <option value="monitoring">Monitoring</option>
                            </select>
                            @error('report_version')
                            <div id="alert-alert" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Pilih Program Studi</label>
                            <select name="program_id" class="form-control @error('program_id') is-invalid @enderror">
                                <option value="">= Semua Program Studi =</option>
                                @foreach ($programs as $item)
                                    @if (old('program_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->jenjang }} - {{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->jenjang }} - {{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('program_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Pilih Jenis Beasiswa</label>
                            <select name="scholarship_id" class="form-control @error('scholarship_id') is-invalid @enderror">
                                <option value="">= Semua Jenis Beasiswa =</option>
                                @foreach ($scholarships as $item)
                                    @if (old('scholarship_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->jenjang }} - {{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->jenjang }} - {{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('scholarship_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Status Penerima Beasiswa</label>
                            <select name="stat_id" class="form-control">
                                <option value="">= Semua Status =</option>
                                @foreach ($stats as $item)
                                    @if (old('stat_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('stat_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </select>
                            </select>
                        </div>
                    </div>

                </div>
                <button id="buttoncustom" data-text="Cetak" class="btn btn-purple">
                    <span>Cetak</span>
                </button>
            </div>
        </div>
        <hr />
    </form>
    <!-- end formulir -->

</x-layout>