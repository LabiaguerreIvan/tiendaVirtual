<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class form extends Component
{
public $product;
public $url;
public $method;
public $btnNameCancelar;
public $btnNameSubmit;

    public function __construct($product, $url, $method, $btnNameCancelar, $btnNameSubmit)
    {
        $this->product = $product;
        $this->url = $url;
        $this->method = $method;
        $this->btnNameCancelar = $btnNameCancelar;
        $this->btnNameSubmit = $btnNameSubmit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
