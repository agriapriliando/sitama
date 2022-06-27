<x-layout title="Admin - FAQ">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/faqs') }}" method="POST" class="rounded-lg"
        enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Frequently Asked Question</p>
                <small>Daftar Pertanyaan dan Jawaban yang umum ditanyakan</small>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Pertanyaan</label>
                            <input name="question" type="text" class="form-control @error('question') is-invalid @enderror">
                            @error('question')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Keterangan atau Penjelasan</label>
                            <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" cols="20"></textarea>
                            @error('answer')
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
            <table id="example" class="table-striped table-bordered display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>Ask : {{ $item->question }}<br>
                            <span class="badge badge-warning">updated {{ $item->updated_at }}</span><br>                  
                        </td>
                        <td>{{ $item->answer }}</td>
                        <td>
                            <a href="{{ url('admin/faqs/'.$item->id.'/edit') }}"
                                class="d-inline btn btn-warning btn-sm mx-1">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form class="d-inline" action="{{ url('admin/faqs/'.$item->id) }}" method="POST">
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
            </table>
        </div>
    </div>
    <!-- end formulir -->

</x-layout>