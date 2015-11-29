<?php namespace App\Components\OCS;

use App\Components\OCS\Models\OrderStatus;
use App\Components\OCS\Repositories\EloquentOrderDetailRepository;
use App\Components\OCS\Repositories\EloquentOrderRepository;
use App\Components\OCS\Repositories\EloquentOrderStatusRepository;
use App\Components\OCS\Repositories\EloquentProductRepository;
use App\Components\OCS\Repositories\EloquentServiceRepository;
use App\Components\OCS\Repositories\OrderDetailRepository;
use App\Components\OCS\Repositories\OrderRepository;
use App\Components\OCS\Repositories\OrderStatusRepository;
use App\Components\OCS\Repositories\ProductRepository;
use App\Components\OCS\Repositories\ServiceRepository;
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
        $this->app->bind(ServiceRepository::class, EloquentServiceRepository::class);
        $this->app->bind(OrderRepository::class, EloquentOrderRepository::class);
        $this->app->bind(OrderStatusRepository::class, EloquentOrderStatusRepository::class);
        $this->app->bind(OrderDetailRepository::class, EloquentOrderDetailRepository::class);
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