<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Yajra\DataTables\Html\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('active', function ($route) {
            return "<?php echo request()->routeIs($route) ? 'active' : ''; ?>";
        });
        Blade::directive('activeHasChild', function ($route) {
            return "<?php echo request()->is($route.'*') ? 'active open':'' ?>";
        });
        Blade::directive('isRequired', function () {
            return "<?php echo '<span class=text-danger>*</span>' ?>";
        });

        Builder::useVite();
        Vite::useScriptTagAttributes([
            'defer' => true,
        ]);
    }
}
