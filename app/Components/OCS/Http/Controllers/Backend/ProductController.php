<?php namespace App\Components\OCS\Http\Controllers\Backend;

use App\Components\OCS\Http\Requests\ProductRequest;
use App\Components\OCS\Repositories\ProductRepository;
use App\Http\Controllers\Controller;

class ProductController extends Controller {

    protected $product;

    public function __construct( ProductRepository $product)
    {
        parent::__construct();
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();
        $title = "List Products";
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.products.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Create New Product";
        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.products.create_edit', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $this->product->create($request->all());
        return redirect(route('backend.ocs.product.index'))->with('success_message', 'The product has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = "Edit Product";
        $product = $this->product->find($id);

        return view('OCS::' . $this->link_type . '.' . $this->current_theme . '.products.create_edit', compact('product', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ProductRequest $request
     * @return Response
     */
    public function update($id, ProductRequest $request)
    {
        $product = $this->product->find($id);

        $this->product->update($product, $request->all());
        return redirect()->back()->with('success_message', 'The product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->product->find($id)->delete();
        return redirect()->back()->with('success_message', 'The product has been deleted');
    }

}