<?php

namespace App\Http\Controllers;


use App\Http\Requests\TaxRequest;
use App\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;


class TaxController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('hasOrganization');

        $this->organization = Auth::user()->organization;
    }

    /**
     * Display a listing of the Tax.
     */
    public function index()
    {
      $taxes = $this->organization->taxes;

        return view('pages.taxes.index')->with('taxes', $taxes);
    }

    /**
     * Show the form for creating a new Tax.
     */
    public function create()
    {
        return view('pages.taxes.create');
    }

    /**
     * Store a newly created Tax in storage.
     */
    public function store(TaxRequest $request)
    {
        $input = $request->all();

        if ($tax = Tax::create($input)) {

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(route('taxes.create'));

        }

        return redirect(route('taxes.index'));
    }

    /**
     * Display the specified Tax.
     */
    public function show($id)
    {
        $tax = Tax::findOrFail($id);

        if (empty($tax)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('taxes.index'));
        }

        return view('pages.taxes.show')->with('tax', $tax);
    }

    /**
     * Show the form for editing the specified Tax.
     */
    public function edit($id)
    {
        $tax = Tax::findOrFail($id);

        if (empty($tax)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('taxes.index'));
        }

        return view('pages.taxes.edit')->with(compact('tax'));
    }

    /**
     * Update the specified Tax in storage.
     */
    public function update($id, TaxRequest $request)
    {
        $tax = Tax::findOrFail($id);
        $data = $request->all();

        if (empty($tax)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('taxes.index'));
        }

        if ($tax->update($data) && $tax->save()) {

            Flash::success(Lang::get('app.general:update-success'));

        } else {

            Flash::error(Lang::get('app.general:update-failed'));
            return redirect(route('taxes.edit'));

        }

        return redirect(route('taxes.index'));
    }

    /**
     * Remove the specified Tax from storage.
     */
    public function destroy($id)
    {
        $tax = Tax::findOrFail($id);

        if (empty($tax)) {
            Flash::error(Lang::get('app.general:missing-model'));

            return redirect(route('taxes.index'));
        }

        $tax->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(route('taxes.index'));
    }
}
