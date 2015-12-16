<?php namespace App\Components\Dashboard\Http\Controllers\Backend;

use App\Components\Dashboard\Http\Requests\TownRequest;
use App\Components\Dashboard\Repositories\CountryRepository;
use App\Components\Dashboard\Repositories\TownRepository;
use App\Http\Controllers\Controller;

class TownController extends Controller {

    protected $town;
	protected $country;

    public function __construct( TownRepository $town, CountryRepository $country)
    {
        parent::__construct();
        $this->town = $town;
	    $this->country = $country;
    }

	/**
	 * @param int $cid Country Id
	 *
	 * @return array|\Illuminate\View\View|mixed
	 */
	public function index($cid)
    {
	    $country = $this->country->find($cid);
        $towns = $this->town->listTowns($cid);
        $title = "List Towns of " . $country->name;
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.towns.index', compact('title', 'country', 'towns'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param int $cid Country ID
	 *
	 * @return Response
	 */
    public function create($cid)
    {
	    $country = $this->country->find($cid);
        $title = "Create New Town for " . $country->name;
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.towns.create_edit', compact('title', 'country'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param $cid Country ID
	 * @param TownRequest $request
	 *
	 * @return Response
	 */
    public function store($cid, TownRequest $request)
    {
	    $country = $this->country->find($cid);
        //$this->town->create($request->all());
	    $country->towns()->create($request->all());
        return redirect(route('backend.country.town.index', $cid))->with('success_message', 'The town has been created');
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $cid country ID
	 * @param  int $id
	 *
	 * @return Response
	 */
    public function edit($cid, $id)
    {
        $title = "Edit Town";
        $town = $this->town->find($id);

        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.towns.create_edit', compact('town', 'title'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param $cid
	 * @param  int $id
	 * @param TownRequest $request
	 *
	 * @return Response
	 */
    public function update($cid, $id, TownRequest $request)
    {
	    $country = $this->country->find($cid);
        $town = $this->town->find($id);
        $this->town->update($town, $request->all());
        return redirect()->back()->with('success_message', 'The town has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($cid, $id)
    {
        $this->town->find($id)->delete();
        return redirect()->back()->with('success_message', 'The town has been deleted');
    }

}