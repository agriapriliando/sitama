<!-- start faq -->
<div class="accordion" id="accordionExample" style="border: 2px solid #8000ff !important;">
    <div class="card">
        <div class="card-body">
            <p class="h4 text-dark text-center faqfont">Frequently Asked Question (FAQ)</p>
        </div>
    </div>
    @foreach ($faqs as $item)
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-purple text-left" type="button" data-toggle="collapse"
                    data-target="#collapse{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}">
                    {{ $loop->iteration }}. {{ $item->question }}
                </button>
            </h2>
        </div>
        <div id="collapse{{ $loop->iteration }}" class="collapse {{ $loop->iteration == 1 ? 'show' : ''}}" aria-labelledby="headingOne"
            data-parent="#accordionExample">
            <div class="card-body text-dark">
                {{ $loop->iteration }}. {!! $item->answer !!}
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- end faq -->