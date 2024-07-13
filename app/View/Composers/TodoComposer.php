<?php

namespace App\View\Composers;

use App\Models\Todo;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class TodoComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
    ) {}

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $one = new Todo;
        $two = new Todo;

        $one->id = 1;
        $array = array (
            "one" => $one,
            "two" => $two
        );

        Log::debug("I'm here");
        $view->with('todos', $array);
    }
}
