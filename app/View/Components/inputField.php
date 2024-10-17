<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputField extends Component
{
    public $name;
    public $label;
    public $type;
    public $value;
    public $placeholder;
    public $image;
    public $alt;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $label, $type='text', $value=null, $placeholder=null, $image=null, $alt=null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->image = $image;
        $this->alt = $alt;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field');
    }
}
