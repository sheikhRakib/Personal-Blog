<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Box extends Component
{
    public $count;
    public $title;
    public $background;
    public $icon;

    public function __construct($title='unknown', $count=0, $background='bg-gray', $icon='fa-circle')
    {
        $this->title = $title;
        $this->count = $count;
        $this->background = $background;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.dashboard.box');
    }
}
