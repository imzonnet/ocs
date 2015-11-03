<?php namespace App\Components;

use App\Components\Dashboard\Repositories\PermissionRepository;
use App\Permission;
use Illuminate\Routing\Router;

trait TraitServiceProvider {

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
        $this->loadViewsFrom(__DIR__ . '/' . $this->component . '/Resources/views', $this->component);
        $this->loadTranslationsFrom(__DIR__ . '/' . $this->component . '/Resources/lang', $this->component);

        $this->publishes([
            __DIR__ . '/' . $this->component . '/Database/Migrations/' => base_path('/database/migrations')
        ], 'migrations');

        //register new function for Boot method
        if( method_exists($this, 'addBoot')) {
            $this->addBoot();
        }
        //register permission
        $this->registerPermissions();
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Components/'. $this->component . '/routes.php');
        });
    }


    /**
     * Register and Drop Permission for component
     *
     * @param PermissionRepository $permissionRepository
     */
    public function registerPermissions()
    {
	    if( !method_exists($this, 'listPermissions')) return false;

        if( \Schema::hasTable('permissions') ) {
            foreach($this->listPermissions() as $name) {
                $this->registerPermissionsCreate($name, 'index');
                $this->registerPermissionsCreate($name, 'create');
                $this->registerPermissionsCreate($name, 'show');
                $this->registerPermissionsCreate($name, 'update');
                $this->registerPermissionsCreate($name, 'delete');
            }
            if( method_exists($this, 'dropPermissions')) {
                foreach($this->dropPermissions() as $name) {
                    $this->registerPermissionsDrop($name);
                }
            }
        }
    }

    /**
     * Create new Permission;
     * @param $name
     * @param $perm
     */
    private function registerPermissionsCreate($name, $perm)
    {
        $flag = Permission::where('name', '=', $name . '.' . $perm)->first();
        if( empty($flag) ) {
            Permission::create([
                'name' => $name . '.' . $perm,
                'display_name' => $this->registerPermissionsDisplay($perm),
                'description' => ''
            ]);
        }
    }

    private function registerPermissionsDrop($name)
    {
        Permission::where('name', 'LIKE', $name.'.%')->delete();
    }

    /**
     * Get Display Name of a permission
     * @param $perm
     * @return string
     */
    private function registerPermissionsDisplay($perm) {
        $display_name = '';
        switch($perm) {
            case 'index' :
                $display_name =  'List All Records';
                break;
            case 'create' :
                $display_name =  'Create New Records';
                break;
            case 'update' :
                $display_name =  'Edit Record';
                break;
            case 'show' :
                $display_name =  'View Record';
                break;
            case 'delete' :
                $display_name =  'Delete Record';
                break;
        }
        return $display_name;
    }

}