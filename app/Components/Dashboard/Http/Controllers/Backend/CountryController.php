<?php namespace App\Components\Dashboard\Http\Controllers\Backend;

use App\Components\Dashboard\Http\Requests\CountryRequest;
use App\Components\Dashboard\Repositories\CountryRepository;
use App\Http\Controllers\Controller;

class CountryController extends Controller {

    protected $country;

    public function __construct( CountryRepository $country)
    {
        parent::__construct();
        $this->country = $country;
    }

    public function index()
    {
        $countries = $this->country->all();
        $title = "List Countries";
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.countries.index', compact('title', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Create New Country";
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.countries.create_edit', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return Response
     */
    public function store(CountryRequest $request)
    {
        $this->country->create($request->all());
        return redirect(route('backend.country.index'))->with('success_message', 'The country has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = "Edit Country";
        $country = $this->country->find($id);

        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.countries.create_edit', compact('country', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param CountryRequest $request
     * @return Response
     */
    public function update($id, CountryRequest $request)
    {
        $country = $this->country->find($id);

        $this->country->update($country, $request->all());
        return redirect()->back()->with('success_message', 'The country has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->country->find($id)->delete();
        return redirect()->back()->with('success_message', 'The country has been deleted');
    }

}