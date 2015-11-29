<?php namespace App\Components\OCS\Http\Controllers\Backend;

use App\Components\Dashboard\Repositories\CustomerOrganizeRepository;
use App\Components\Dashboard\Repositories\UserRepository;
use App\Components\OCS\Http\Requests\OrderDetailRequest;
use App\Components\OCS\Http\Requests\OrderRequest;
use App\Components\OCS\Models\OrderDetail;
use App\Components\OCS\Repositories\OrderDetailRepository;
use App\Components\OCS\Repositories\OrderRepository;
use App\Components\OCS\Repositories\ProductRepository;
use App\Components\OCS\Repositories\ServiceRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class OrderDetailController extends Controller {

    protected $order;
    protected $orderDetail;
    protected $user;
	protected $product;
	protected $service;

    public function __construct( OrderRepository $order, UserRepository $user, OrderDetailRepository $orderDetail, ProductRepository $product, ServiceRepository $service)
    {
        parent::__construct();
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->user = $user;
	    $this->service = $service;
	    $this->product = $product;
    }

    public function index()
    {
        $orders = $this->order->all();
        $title = "List Orders";
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.orders.index', compact('title', 'orders'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return array|\Illuminate\View\View|mixed
	 */
    public function create($id)
    {
	    $order = $this->order->find($id);
	    $title = "Add Service For " . $order->order_code;
	    $products = $this->product->listProducts();
	    $services = $this->service->listServices();
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.order_details.create_edit', compact('order', 'title', 'products', 'services'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param $id
	 * @param OrderDetailRequest $request
	 *
	 * @return Response
	 */
    public function store($id, OrderDetailRequest $request)
    {
	    $order = $this->order->find($id);
	    $attrs = $request->all();
	    $attrs['order_id'] = $order->id;
	    $detail = $this->orderDetail->create($attrs);
	    return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.order_details.list', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = "Edit Order";
        $order = $this->order->find($id);
	    $customers = $this->user->listUsers();
	    $organizes = $this->organize->listOrganizes();
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.orders.create_edit', compact('order', 'title', 'customers', 'organizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param OrderDetailRequest $request
     * @return Response
     */
    public function update($id, $oid, OrderDetailRequest $request)
    {
        $order = $this->orderDetail->find($oid);
        $this->orderDetail->update($order, $request->all());
	    if(\Request::ajax()) {
		    return response()->json(['status' => 200, 'message' => 'Success']);
	    } else {
		    return redirect()->back()->with('success_message', 'The order has been deleted');
	    }
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @param $oid
	 *
	 * @return Response
	 */
    public function destroy($id, $oid)
    {
        $this->orderDetail->find($oid)->delete();
	    if(\Request::ajax()) {
		    return response()->json(['status' => 200, 'message' => 'Success']);
	    } else {
		    return redirect()->back()->with('success_message', 'The order has been deleted');
	    }
    }

}