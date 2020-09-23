<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtapeRequest;
use App\Http\Requests\UpdateEtapeRequest;
use App\Repositories\EtapeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Annee;
use App\Models\Etape;
use Illuminate\Support\Facades\Validator;
use Session;

class EtapeController extends AppBaseController
{
    /** @var  EtapeRepository */
    private $etapeRepository;

    public function __construct(EtapeRepository $etapeRepo)
    {
        $this->etapeRepository = $etapeRepo;
    }

    /**
     * Display a listing of the Etape.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $etapes = $this->etapeRepository->all();

        return view('etapes.index')
            ->with('etapes', $etapes);
    }

    /**
     * Show the form for creating a new Etape.
     *
     * @return Response
     */
    public function create()
    {
        $annees = Annee::all();
        return view('etapes.create',compact('annees'));
    }

    /**
     * Store a newly created Etape in storage.
     *
     * @param CreateEtapeRequest $request
     *
     * @return Response
     */
    public function store(CreateEtapeRequest $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
            'annee' => 'required|nullable|string|max:45',
            'duree' => 'required|nullable|string|max:45',
            'description' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $input = $request->all();

        $etape = $this->etapeRepository->create($input);

        Flash::success('Etape saved successfully.');

        return redirect(route('etapes.index'));
    }

    /**
     * Display the specified Etape.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etape = $this->etapeRepository->find($id);

        if (empty($etape)) {
            Flash::error('Etape not found');

            return redirect(route('etapes.index'));
        }

        return view('etapes.show')->with('etape', $etape);
    }

    /**
     * Show the form for editing the specified Etape.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etape = $this->etapeRepository->find($id);
        $annees = Annee::all();

        if (empty($etape)) {
            Flash::error('Etape not found');

            return redirect(route('etapes.index'));
        }

        return view('etapes.edit',compact('annees'))->with('etape', $etape);
   
    }

    /**
     * Update the specified Etape in storage.
     *
     * @param int $id
     * @param UpdateEtapeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtapeRequest $request)
    {
        $etape = $this->etapeRepository->find($id);

        if (empty($etape)) {
            Flash::error('Etape not found');

            return redirect(route('etapes.index'));
        }

        $etape = $this->etapeRepository->update($request->all(), $id);

        Flash::success('Etape updated successfully.');

        return redirect(route('etapes.index'));
    }

    /**
     * Remove the specified Etape from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etape = $this->etapeRepository->find($id);

        if (empty($etape)) {
            Flash::error('Etape not found');

            return redirect(route('etapes.index'));
        }

       
        Etape::where('id', $id)->forceDelete();

        Flash::success('SUCCES !');

        return redirect(route('etapes.index'));
    }
}
