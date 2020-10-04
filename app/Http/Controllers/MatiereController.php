<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use App\Repositories\MatiereRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Prof;
use App\Models\Classe;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\Matiere;
use App\Models\Lecon;
use App\User;
use App\Models\Eleve;

class MatiereController extends AppBaseController
{
    /** @var  MatiereRepository */
    private $matiereRepository;

    public function __construct(MatiereRepository $matiereRepo)
    {
        $this->matiereRepository = $matiereRepo;
    }

    /**
     * Display a listing of the Matiere.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {


        $matieres = $this->matiereRepository->all();
        $user = User::find(auth()->user()->id);
        //ADM SEE ALL COURSES
        if($user->role == 1 ){
            return view('matieres.index')
            ->with('matieres', $matieres);
        }
           //teachers SEE only his courses
           else  if($user->role == 2 ){
            $matieres = Matiere::where(['prof_id'=> $user->id])->get();
            return view('matieres.index')
            ->with('matieres', $matieres);
        }
          else  {
            $student = Eleve::where(['user_id'=> $user->id])->first();
            $matieres = Matiere::where(['class_id'=> $student->class_id])->get();
            return view('matieres.index')
            ->with('matieres', $matieres);
        }
       


    }

    /**
     * Show the form for creating a new Matiere.
     *
     * @return Response
     */
    public function create()
    {
        $allClasses = Classe::all();
        $allProfs = Prof::all();
        return view('matieres.create',compact('allClasses','allProfs'));
    }

    /**
     * Store a newly created Matiere in storage.
     *
     * @param CreateMatiereRequest $request
     *
     * @return Response
     */
    public function store(CreateMatiereRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
            'class_id' => 'required|nullable|integer',
            'prof_id' => 'required|nullable',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $input = $request->all();

        $matiere = $this->matiereRepository->create($input);

        Flash::success('Matiere saved successfully.');

        return redirect(route('matieres.index'));
    }

    /**
     * Display the specified Matiere.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matiere = $this->matiereRepository->find($id);
      
        if(User::find(auth()->user()->role == 3)){
            $lecons = Lecon::where(['matiere_id'=>$id, 'publier'=>'1'])->get();
        }
        else{
            $lecons = Lecon::where(['matiere_id'=>$id])->get();
        }
      

        if (empty($matiere)) {
            Flash::error('Matière introuvable');

            return redirect(route('matieres.index'));
        }

        return view('matieres.show', compact('lecons'))->with('matiere', $matiere);
    }

    /**
     * Show the form for editing the specified Matiere.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matiere = $this->matiereRepository->find($id);
        $allClasses = Classe::all();
        $allProfs = Prof::all();

        if (empty($matiere)) {
            Flash::error('Matiere not found');

            return redirect(route('matieres.index'));
        }

        return view('matieres.edit',compact('allClasses','allProfs'))->with('matiere', $matiere);
    }

    /**
     * Update the specified Matiere in storage.
     *
     * @param int $id
     * @param UpdateMatiereRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatiereRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
            'class_id' => 'required|nullable|integer',
            'prof_id' => 'required|nullable',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $matiere = $this->matiereRepository->find($id);

        if (empty($matiere)) {
            Flash::error('Matiere not found');

            return redirect(route('matieres.index'));
        }

        $matiere = $this->matiereRepository->update($request->all(), $id);

        Flash::success('SUCCES !');

        return redirect(route('matieres.index'));
    }

    /**
     * Remove the specified Matiere from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matiere = $this->matiereRepository->find($id);

        if (empty($matiere)) {
            Flash::error('Matiere not found');

            return redirect(route('matieres.index'));
        }

        Matiere::where('id', $id)->forceDelete();

        Flash::success('SUCCES !');

        return redirect(route('matieres.index'));
    }

    public function DynamicLevel(Request $request){
        $classes = Classe::
        select('classes.*')
        ->join('assignations','assignations.class_id','=','classes.id')
        ->where('assignations.prof_id',$request->prof_id)
        ->get();

        // $course_id = $request->get('course_id');

        // $levels = Level::where('course_id', '=',$course_id)->get();
       
        return  Response::json($classes);
    }
}
