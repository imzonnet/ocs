<?php namespace App\Components\Dashboard;

use App\Components\Dashboard\Repositories\CustomerGroupRepository;
use App\Components\Dashboard\Repositories\CustomerOrganizeRepository;
use App\Components\Dashboard\Repositories\EloquentCustomerGroupRepository;
use App\Components\Dashboard\Repositories\EloquentCustomerOrganizeRepository;
use App\Components\Dashboard\Repositories\EloquentPermissionRepository;
use App\Components\Dashboard\Repositories\EloquentRoleRepository;
use App\Components\Dashboard\Repositories\EloquentUserRepository;
use App\Components\Dashboard\Repositories\PermissionRepository;
use App\Components\Dashboard\Repositories\RoleRepository;
use App\Components\Dashboard\Repositories\UserRepository;
use App\Role;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Components\TraitServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Components\Dashboard\Http\Controllers';

    protected $component = 'Dashboard';

    use TraitServiceProvider;

    public function register()
    {
        /**
         * Repositories
         */
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(RoleRepository::class, EloquentRoleRepository::class);
        $this->app->bind(PermissionRepository::class, EloquentPermissionRepository::class);

        $this->app->bind(CustomerGroupRepository::class, EloquentCustomerGroupRepository::class);
        $this->app->bind(CustomerOrganizeRepository::class, EloquentCustomerOrganizeRepository::class);
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
        return ['user', 'role', 'customer_group', 'customer_organize'];
    }

}