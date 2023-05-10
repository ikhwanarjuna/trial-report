<?php

namespace App\Http\Controllers\ViewComposer;

use Illuminate\View\View;
use App\Models\Data;

class ViewComposer{
    public function compose(View $view){
        $view->with('data', Data::all());
    }
}