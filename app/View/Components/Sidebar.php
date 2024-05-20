<?php

namespace App\View\Components;

use App\Services\Github\GitHubService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private readonly GitHubService $gitHubService)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $version = $this->gitHubService->getLatestReleaseTag();
        return view('components.sidebar', compact('version'));
    }

}
