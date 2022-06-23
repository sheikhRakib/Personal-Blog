<?php

namespace App\View\Components\Auth\Form;

use Illuminate\View\Component;

class Submit extends Component
{
    public $text;

    public function __construct($text='Sign-in')
    {
        $this->text = $text;
    }

    public function render()
    {
        return view('components.auth.form.submit');
    }
}
