<?php namespace App\Components\OCS\Http\Controllers\Backend;

use App\Components\OCS\Http\Requests\ServiceRequest;
use App\Components\OCS\Repositories\ServiceRepository;
use App\Http\Controllers\Controller;

class ServiceController extends Controller {

    protected $service;

    public function __construct( ServiceRepository $service)
    {
        parent::__construct();
        $this->service = $service;
    }

	/**
	 * @return array|\Illuminate\View\View|mixed
	 */
	public function index()
    {
        $services = $this->service->all();
        $title = "List Services";
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.services.index', compact('title', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $title = "Create New Service";
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.services.create_edit', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ServiceRequest $request)
    {
        $this->service->create($request->all());
        return redirect(route('backend.ocs.service.index'))->with('success_message', 'The service has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $title = "Edit Service";
        $service = $this->service->find($id);

        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.services.create_edit', compact('service', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ServiceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, ServiceRequest $request)
    {
        $service = $this->service->find($id);

        $this->service->update($service, $request->all());
        return redirect()->back()->with('success_message', 'The service has been updated');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function destroy($id)
    {
        $this->service->find($id)->delete();
        return redirect()->back()->with('success_message', 'The service has been deleted');
    }

}