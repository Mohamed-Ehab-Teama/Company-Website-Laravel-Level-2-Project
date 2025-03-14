<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButtonComponent extends Component
{
    public $color = '';
    public $text = '';
    public $class = '';
    /**
     * Create a new component instance.
     */
    public function __construct( public string $href, public string $type)
    {
        if ( $type == 'edit' )
        {
            $this->color = 'success';
            $this->text = "<i class='fe fe-edit fe-16'></i>";
            $this->class = "btn-sm mx-2";
        }
        elseif ( $type == 'show' )
        {
            $this->color = 'primary';
            $this->text = "<i class='fe fe-eye fe-16'></i>";
            $this->class = "btn-sm mx-2";
        }
        elseif ( $type == 'create' )
        {
            $this->color = 'primary';
            $this->text = __('keywords.add_new');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-button-component');
    }
}
