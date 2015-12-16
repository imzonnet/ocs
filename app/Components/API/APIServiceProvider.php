<?php namespace App\Components\API;

use App\Components\Dashboard\Repositories\CountryRepository;
use App\Components\Dashboard\Repositories\CustomerGroupRepository;
use App\Components\Dashboard\Repositories\CustomerOrganizeRepository;
use App\Components\Dashboard\Repositories\DistrictRepository;
use App\Components\Dashboard\Repositories\EloquentCountryRepository;
use App\Components\Dashboard\Repositories\EloquentCustomerGroupRepository;
use App\Components\Dashboard\Repositories\EloquentCustomerOrganizeRepository;
use App\Components\Dashboard\Repositories\EloquentDistrictRepository;
use App\Components\Dashboard\Repositories\EloquentPermissionRepository;
use App\Components\Dashboard\Repositories\EloquentRoleRepository;
use App\Components\Dashboard\Repositories\EloquentTownRepository;
use App\Components\Dashboard\Repositories\EloquentUserRepository;
use App\Components\Dashboard\Repositories\PermissionRepository;
use App\Components\Dashboard\Repositories\RoleRepository;
use App\Components\Dashboard\Repositories\TownRepository;
use App\Components\Dashboard\Repositories\UserRepository;
use App\Role;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Components\TraitServiceProvider;

class APIServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Components\API\Http\Controllers';

    protected $component = 'API';

    use TraitServiceProvider;

    public function register()
    {
    }

}