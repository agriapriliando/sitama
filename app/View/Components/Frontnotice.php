<?php

namespace App\View\Components;

use App\Models\Notice;
use Illuminate\View\Component;

class Frontnotice extends Component
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
        $notices = Notice::orderByDesc('created_at')->where('title','!=','Persyaratan')->where('title','!=','Pendaftaran')->where('title','!=','Narahubung')->orderByDesc('updated_at')->limit(5)->get();
        return view('components.frontnotice', compact('notices'));
    }
}
