<?php

namespace App\View\Components\Auth\Form;

use Illuminate\View\Component;

class Remember extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('components.auth.form.remember');
    }
}
