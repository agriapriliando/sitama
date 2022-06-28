<x-layout title="Admin - FAQ">
    {{-- navbar --}}
    <x-navbar></x-navbar>

    <!-- formulir -->
    <form id="formcustom" action="{{ url('admin/faqs/'.$faq->id) }}" method="POST" class="rounded-lg">
        @method('PUT')
        @csrf
        <div class="row p-4">
            <div class="col">
                <p class="h3 text-dark">Ubah Data FAQ</p>
                <div class="row">
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Pertanyaan</label>
                            <input value="{{ old('question',$faq->question) }}" name="question" type="text" class="form-control @error('question') is-invalid @enderror">
                            @error('question')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-11">
                        <div class="form-group">
                            <label for="">Keterangan atau penjelasan</label>
                            <textarea id="textarea" class="form-control @error('answer') is-invalid @enderror" name="answer" cols="5">{{ old('answer',$faq->answer) }}</textarea>
                            @error('answer')
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