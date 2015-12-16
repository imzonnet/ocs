<?php namespace App\Components\Dashboard\Http\Controllers\Backend;

use App\Components\Dashboard\Http\Requests\DistrictRequest;
use App\Components\Dashboard\Repositories\TownRepository;
use App\Components\Dashboard\Repositories\DistrictRepository;
use App\Http\Controllers\Controller;

class DistrictController extends Controller {

    protected $district;
	protected $town;

    public function __construct( DistrictRepository $district, TownRepository $town)
    {
        parent::__construct();
        $this->district = $district;
	    $this->town = $town;
    }

	/**
	 * @param int $tid Town Id
	 *
	 * @return array|\Illuminate\View\View|mixed
	 */
	public function index($tid)
    {
	    $town = $this->town->find($tid);
        $districts = $this->district->listDistricts($tid);
        $title = "List Districts of " . $town->name;
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.districts.index', compact('title', 'town', 'districts'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param int $tid Town ID
	 *
	 * @return Response
	 */
    public function create($tid)
    {
	    $town = $this->town->find($tid);
        $title = "Create New District for " . $town->name;
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.districts.create_edit', compact('title', 'town'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param $tid Town ID
	 * @param DistrictRequest $request
	 *
	 * @return Response
	 */
    public function store($tid, DistrictRequest $request)
    {
	    $town = $this->town->find($tid);
	    $town->districts()->create($request->all());
        return redirect(route('backend.town.district.index', $tid))->with('success_message', 'The district has been created');
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $tid town ID
	 * @param  int $id
	 *
	 * @return Response
	 */
    public function edit($tid, $id)
    {
        $title = "Edit District";
        $district = $this->district->find($id);

        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.districts.create_edit', compact('district', 'title'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param $tid
	 * @param  int $id
	 * @param DistrictRequest $request
	 *
	 * @return Response
	 */
    public function update($tid, $id, DistrictRequest $request)
    {
	    $town = $this->town->find($tid);
        $district = $this->district->find($id);
        $this->district->update($district, $request->all());
        return redirect()->back()->with('success_message', 'The district has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($tid, $id)
    {
        $this->district->find($id)->delete();
        return redirect()->back()->with('success_message', 'The district has been deleted');
    }

}