<?php namespace App\Components\OCS\Http\Controllers\Backend;

use App\Components\Dashboard\Repositories\CustomerOrganizeRepository;
use App\Components\Dashboard\Repositories\UserRepository;
use App\Components\OCS\Http\Requests\OrderRequest;
use App\Components\OCS\Repositories\OrderRepository;
use App\Components\OCS\Repositories\ProductRepository;
use App\Components\OCS\Repositories\ServiceRepository;
use App\Http\Controllers\Controller;

class OrderController extends Controller {

    protected $order;
    protected $organize;
    protected $user;
	protected $product;
	protected $service;

    public function __construct( OrderRepository $order, CustomerOrganizeRepository $organize, UserRepository $user,
		ProductRepository $productRepository, ServiceRepository $serviceRepository
    )
    {
        parent::__construct();
        $this->order = $order;
        $this->organize = $organize;
        $this->user = $user;
	    $this->product = $productRepository;
	    $this->service = $serviceRepository;
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
    public function create()
    {
        $title = "Create New Order";
	    $customers = $this->user->listUsers();
	    $organizes = $this->organize->listOrganizes();
	    $products = $this->product->listProducts();
	    $services = $this->service->listServices();
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.orders.create_edit', compact('title', 'customers', 'organizes', 'products', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @return Response
     */
    public function store(OrderRequest $request)
    {
        $order = $this->order->create($request->all());
        return redirect(route('backend.ocs.order.detail.create', $order->id))->with('success_message', 'The order has been created');
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
	    $products = $this->product->listProducts();
	    $services = $this->service->listServices();
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.orders.edit', compact('order', 'title', 'customers', 'organizes', 'products', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param OrderRequest $request
     * @return Response
     */
    public function update($id, OrderRequest $request)
    {
        $order = $this->order->find($id);

        $this->order->update($order, $request->all());
        return redirect()->back()->with('success_message', 'The order has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->order->find($id)->delete();
        return redirect()->back()->with('success_message', 'The order has been deleted');
    }

}