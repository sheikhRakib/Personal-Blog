<?php

namespace App\View\Components\Auth\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public $placeholder;
    public $icon;

    public function __construct($name, $type='text', $placeholder='', $icon='circle')
    {
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.auth.form.input');
    }
}
