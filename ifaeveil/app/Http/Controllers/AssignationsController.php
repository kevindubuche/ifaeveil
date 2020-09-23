<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAssignationsRequest;
use App\Http\Requests\UpdateAssignationsRequest;
use App\Repositories\AssignationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Prof;
use App\Models\Classe;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\Assignations;

class AssignationsController extends AppBaseController
{
    /** @var  AssignationsRepository */
    private $assignationsRepository;

    public function __construct(AssignationsRepository $assignationsRepo)
    {
        $this->assignationsRepository = $assignationsRepo;
    }

    /**
     * Display a listing of the Assignations.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $assignations = $this->assignationsRepository->all();

        return view('assignations.index')
            ->with('assignations', $assignations);
    }

    /**
     * Show the form for creating a new Assignations.
     *
     * @return Response
     */
    public function create()
    {
        $allTeacher = Prof::get();
        // $classSchedules = ClassScheduling::all();
        $classes = Classe::all();
        return view('assignations.create', compact('allTeacher','classes'));
       
    }

    /**
     * Store a newly created Assignations in storage.
     *
     * @param CreateAssignationsRequest $request
     *
     * @return Response
     */
    public function store(CreateAssignationsRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'prof_id'=>'required'
        ]);
        if($validator->fails()) {
            Flash::error('Professeur incorrect');
               
            return redirect(route('assignations.index'));
        }
        $input = $request->all();
        if( ! $request->multiclass){
            Flash::error('Classe incorecte');
           
            return redirect(route('assignations.index'));
        }
        
        foreach($request->multiclass as $key => $teach){
            $data2 = array('prof_id'=> $request->prof_id,
            'class_id'=> $request->multiclass[$key]);
        $checkExist = Assignations::where('prof_id', $request->prof_id)
                        ->where('class_id', $request->multiclass[$key])
                        ->first();

        if($checkExist){
            Flash::error('Une ou plusieurs assignations existaient deja pour cette classe.');
            return redirect(route('assignations.index'));
        }
        Assignations::insert($data2);

        // }
    }
    Flash::success('SUCCES !');
    return redirect(route('assignations.index'));



        
    }

    /**
     * Display the specified Assignations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $assignations = $this->assignationsRepository->find($id);

        if (empty($assignations)) {
            Flash::error('Assignations not found');

            return redirect(route('assignations.index'));
        }

        return view('assignations.show')->with('assignations', $assignations);
    }

    /**
     * Show the form for editing the specified Assignations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $assignations = $this->assignationsRepository->find($id);

        if (empty($assignations)) {
            Flash::error('Assignations not found');

            return redirect(route('assignations.index'));
        }

        return view('assignations.edit')->with('assignations', $assignations);
    }

    /**
     * Update the specified Assignations in storage.
     *
     * @param int $id
     * @param UpdateAssignationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssignationsRequest $request)
    {
        $assignations = $this->assignationsRepository->find($id);

        if (empty($assignations)) {
            Flash::error('Assignations not found');

            return redirect(route('assignations.index'));
        }

        $assignations = $this->assignationsRepository->update($request->all(), $id);

        Flash::success('Assignations updated successfully.');

        return redirect(route('assignations.index'));
    }

    /**
     * Remove the specified Assignations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $assignations = $this->assignationsRepository->find($id);

        if (empty($assignations)) {
            Flash::error('Assignations not found');

            return redirect(route('assignations.index'));
        }

        Assignations::where('id', $id)->forceDelete();

        Flash::success('SUCCES !');


        return redirect(route('assignations.index'));
    }
}
