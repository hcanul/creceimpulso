<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public $headers;
    public $rows;
    public $displayColumns;
    public $extraActions;
    public $editPermission;
    public $deletePermission;

    /**
     * Create a new component instance.
     */
    public function __construct($headers = [], $rows = [], $displayColumns = [], $extraActions = [], $editPermission = null, $deletePermission = null)
    {
        $this->headers = $headers;
        $this->rows = $rows;
        $this->displayColumns = $displayColumns;
        $this->extraActions = $extraActions;
        $this->editPermission = $editPermission;
        $this->deletePermission = $deletePermission;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
