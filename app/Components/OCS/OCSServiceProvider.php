<?php namespace App\Components\OCS;

use App\Components\OCS\Repositories\EloquentProductRepository;
use App\Components\OCS\Repositories\ProductRepository;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Components\TraitServiceProvider;

class OCSServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Components\OCS\Http\Controllers';

    protected $component = 'OCS';

    use TraitServiceProvider;

    public function register()
    {
        /**
         * Repositories
         */
        $this->app->bind(ProductRepository::class, EloquentProductRepository::class);
    }

    /**
     * Register Roles & Permission for Component
     *
     * If you want change permission name to other name.
     * You should remove old permission name with function permissionsDrop()
     * private function dropPermissions() {
     *      return ['old_name1', 'old_name2'];
     * }
     *
     * return array Permission name
     */
    private function listPermissions() {
        return ['ocs.product', 'ocs.service', 'ocs.order'];
    }

}