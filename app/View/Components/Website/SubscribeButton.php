<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class SubscribeButton extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.website.subscribe-button');
    }
}
