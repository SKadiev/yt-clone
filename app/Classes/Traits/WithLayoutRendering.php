<?php

namespace App\Classes\Traits;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

trait WithLayoutRendering
{

    public function renderWithLayout(string $view, array|Collection|Paginator  $viewData = [], string $layoutFile = 'layouts.app')
    {
        return view($view, $viewData)->extends($layoutFile);
    }

}
