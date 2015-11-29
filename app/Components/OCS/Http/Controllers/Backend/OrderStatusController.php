<?php namespace App\Components\OCS\Http\Controllers\Backend;

use App\Components\OCS\Http\Requests\OrderStatusRequest;
use App\Components\OCS\Repositories\OrderStatusRepository;
use App\Http\Controllers\Controller;

class OrderStatusController extends Controller {

    protected $status;

    public function __construct( OrderStatusRepository $status)
    {
        parent::__construct();
        $this->status = $status;
    }

    public function index()
    {
        $status = $this->status->all();
        $title = "List Status";
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.status.index', compact('title', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Create New OrderStatus";
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.status.create_edit', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderStatusRequest $request
     * @return Response
     */
    public function store(OrderStatusRequest $request)
    {
        $this->status->create($request->all());
        return redirect(route('backend.ocs.status.index'))->with('success_message', 'The status has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = "Edit OrderStatus";
        $status = $this->status->find($id);

        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.status.create_edit', compact('status', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param OrderStatusRequest $request
     * @return Response
     */
    public function update($id, OrderStatusRequest $request)
    {
        $status = $this->status->find($id);

        $this->status->update($status, $request->all());
        return redirect()->back()->with('success_message', 'The status has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->status->find($id)->delete();
        return redirect()->back()->with('success_message', 'The status has been deleted');
    }

}