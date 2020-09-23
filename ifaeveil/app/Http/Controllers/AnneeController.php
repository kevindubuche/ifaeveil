<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnneeRequest;
use App\Http\Requests\UpdateAnneeRequest;
use App\Repositories\AnneeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Annee;

use Illuminate\Support\Facades\Validator;
use Session;

class AnneeController extends AppBaseController
{
    /** @var  AnneeRepository */
    private $anneeRepository;

    public function __construct(AnneeRepository $anneeRepo)
    {
        $this->anneeRepository = $anneeRepo;
    }

    /**
     * Display a listing of the Annee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $annees = $this->anneeRepository->all();

        return view('annees.index')
            ->with('annees', $annees);
    }

    /**
     * Show the form for creating a new Annee.
     *
     * @return Response
     */
    public function create()
    {
        return view('annees.create');
    }

    /**
     * Store a newly created Annee in storage.
     *
     * @param CreateAnneeRequest $request
     *
     * @return Response
     */
    public function store(CreateAnneeRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $input = $request->all();

        $annee = $this->anneeRepository->create($input);

        Flash::success('Annee saved successfully.');

        return redirect(route('annees.index'));
    }

    /**
     * Display the specified Annee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Annee not found');

            return redirect(route('annees.index'));
        }

        return view('annees.show')->with('annee', $annee);
    }

    /**
     * Show the form for editing the specified Annee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Annee not found');

            return redirect(route('annees.index'));
        }

        return view('annees.edit')->with('annee', $annee);
    }

    /**
     * Update the specified Annee in storage.
     *
     * @param int $id
     * @param UpdateAnneeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnneeRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Annee not found');

            return redirect(route('annees.index'));
        }

        $annee = $this->anneeRepository->update($request->all(), $id);

        Flash::success('Annee updated successfully.');

        return redirect(route('annees.index'));
    }

    /**
     * Remove the specified Annee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Annee not found');

            return redirect(route('annees.index'));
        }

        
        Annee::where('id', $id)->forceDelete();

        Flash::success('SUCCES !');

        return redirect(route('annees.index'));
    }
}
