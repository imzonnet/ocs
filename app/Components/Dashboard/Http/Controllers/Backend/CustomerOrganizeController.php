<?php namespace App\Components\Dashboard\Http\Controllers\Backend;

use App\Components\Dashboard\Http\Requests\CustomerOrganizeRequest;
use App\Components\Dashboard\Repositories\CustomerOrganizeRepository;
use App\Http\Controllers\Controller;

class CustomerOrganizeController extends Controller {

    protected $organize;

    public function __construct( CustomerOrganizeRepository $organize)
    {
        parent::__construct();
        $this->organize = $organize;
    }

    public function index()
    {
        $organizes = $this->organize->all();
        $title = "List Organizes";
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.organizes.index', compact('title', 'organizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Create New Organize";
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.organizes.create_edit', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerOrganizeRequest $request
     * @return Response
     */
    public function store(CustomerOrganizeRequest $request)
    {
        $this->organize->create($request->all());
        return redirect(route('backend.organize.index'))->with('success_message', 'The organize has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = "Edit Organize";
        $organize = $this->organize->find($id);

        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.organizes.create_edit', compact('organize', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param CustomerOrganizeRequest $request
     * @return Response
     */
    public function update($id, CustomerOrganizeRequest $request)
    {
        $organize = $this->organize->find($id);

        $this->organize->update($organize, $request->all());
        return redirect()->back()->with('success_message', 'The organize has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->organize->find($id)->delete();
        return redirect()->back()->with('success_message', 'The organize has been deleted');
    }

}