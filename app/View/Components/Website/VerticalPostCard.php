<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class VerticalPostCard extends Component
{
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('components.website.vertical-post-card');
    }
}
