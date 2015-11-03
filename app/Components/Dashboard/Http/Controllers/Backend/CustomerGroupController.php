<?php namespace App\Components\Dashboard\Http\Controllers\Backend;

use App\Components\Dashboard\Http\Requests\CustomerGroupRequest;
use App\Components\Dashboard\Repositories\CustomerGroupRepository;
use App\Http\Controllers\Controller;

class CustomerGroupController extends Controller {

    protected $group;

    public function __construct( CustomerGroupRepository $group)
    {
        parent::__construct();
        $this->group = $group;
    }

    public function index()
    {
        $groups = $this->group->all();
        $title = "List Groups";
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.groups.index', compact('title', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Create New Group";
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.groups.create_edit', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerGroupRequest $request
     * @return Response
     */
    public function store(CustomerGroupRequest $request)
    {
        $this->group->create($request->all());
        return redirect(route('backend.group.index'))->with('success_message', 'The group has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = "Edit Group";
        $group = $this->group->find($id);

        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.groups.create_edit', compact('group', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param CustomerGroupRequest $request
     * @return Response
     */
    public function update($id, CustomerGroupRequest $request)
    {
        $group = $this->group->find($id);

        $this->group->update($group, $request->all());
        return redirect()->back()->with('success_message', 'The group has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->group->find($id)->delete();
        return redirect()->back()->with('success_message', 'The group has been deleted');
    }

}