<?php namespace App\Components\Dashboard\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index() {
       return view('Dashboard::'.$this->link_type.'.'.$this->current_theme.'.home');
    }

}