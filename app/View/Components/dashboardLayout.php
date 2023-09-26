<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class dashboardLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $dashboard = false,
        public bool $users = false,
        public bool $supplier = false,
        public bool $product = false,
        public bool $transaction = false,
        public bool $admin = false
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-layout', [
            "user" => Auth::guard("admin")->user()
        ]);
    }
}
