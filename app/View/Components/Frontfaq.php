<?php

namespace App\View\Components;

use App\Models\Faq;
use Illuminate\View\Component;

class Frontfaq extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $faqs = Faq::orderBy('created_at')->get();
        return view('components.frontfaq', compact('faqs'));
    }
}
