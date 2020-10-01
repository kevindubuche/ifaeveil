<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Repositories\ExamRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Lecon;
use App\Models\Classe;
use App\Models\Exam;
use App\Models\Matiere;
use App\Models\Eleve;
use File;
use App\User;
use Illuminate\Support\Facades\Validator;
use Session;

class ExamController extends AppBaseController
{
    /** @var  ExamRepository */
    private $examRepository;

    public function __construct(ExamRepository $examRepo)
    {
        $this->examRepository = $examRepo;
    }

    /**
     * Display a listing of the Exam.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $exams = $this->examRepository->all();
        $user = User::find(auth()->user()->id);
        if($user->role == 1 ){
            return view('exams.index')->with('exams', $exams);
        }
           //teachers SEE only his Lecons
           else  if($user->role == 2 ){
            // dd('role 2');
            $exams = Exam::where(['creer_par'=> $user->id, 'publier'=>'1'])->get();
            return view('exams.index')
            ->with('exams', $exams);
        }
        else  {
           
            $student = Eleve::where(['user_id'=> $user->id])->first();
            $exams = Exam::
            select('exams.*')
            ->join('matieres','matieres.id','=','exams.matiere_id')
            ->join('classes','classes.id','=','matieres.class_id')
            ->where(['classes.id'=>$student->class_id,'exams.publier'=>'1' ])
           ->get();
           return view('exams.index')
           ->with('exams', $exams);
        }

       


     
    }

    /**
     * Show the form for creating a new Exam.
     *
     * @return Response
     */
    public function create()
    {
        $exams = $this->examRepository->all();
        $allMatieres = Matiere::all();
        return view('exams.create',compact('allMatieres'));
    }

    /**
     * Store a newly created Exam in storage.
     *
     * @param CreateExamRequest $request
     *
     * @return Response
     */
    public function store(CreateExamRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'matiere_id' => 'required|nullable|integer',
        'title' => 'required|nullable|string|max:45',
        'description' => 'nullable|string',
        'filename' => 'required',
        'creer_par' => 'required|nullable',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $input = $request->all();
        try{
        // dd($input);
        //GESTION DU FICHIER
        $file = $request->file('filename');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $fullPath = $filename;

        
        $request->file('filename')->move(public_path('exam_files'), $filename);

        $exam = new Exam;
        $exam->title = $request->title;
        $exam->description = $request->description;
        $exam->creer_par = $request->creer_par;
        $exam->filename = $fullPath;
        $exam->matiere_id = $request->matiere_id;
//  dd($input);
        $exam->save();
        // $exam = $this->examRepository->create($input);

        Flash::success('SUCCES ! L\'examen est soumis a l\'administrateur pour verification.');

        return redirect(route('exams.index'));
    }catch(\Illuminate\Database\QueryException $e){
            
        Flash::error($e->getMessage());
        return redirect(route('matieres.index'));
    }
    }

    /**
     * Display the specified Exam.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $exam = $this->examRepository->find($id);

        if (empty($exam)) {
            Flash::error('Examen non trouvé');

            return redirect(route('exams.index'));
        }

        return view('exams.show')->with('exam', $exam);
    }

    /**
     * Show the form for editing the specified Exam.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $exam = $this->examRepository->find($id);

        $allMatieres = Matiere::all();

        if (empty($exam)) {
            Flash::error('Examen non trouvé');

            return redirect(route('exams.index'));
        }

        return view('exams.edit',compact('allMatieres'))->with('exam', $exam);
    }

    /**
     * Update the specified Exam in storage.
     *
     * @param int $id
     * @param UpdateExamRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'matiere_id' => 'required|nullable|integer',
        'title' => 'required|nullable|string|max:45',
        'description' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
       try{
        $old_exam = $this->examRepository->find($request->exam_id);
    //   dd($request->all());
         if($request->file('filename') != null){
         
         File::delete(public_path().'/exam_files/'.$old_exam->filename);
         
          
         $file = $request->file('filename');
         $extension = $file->getClientOriginalExtension();
         $filename = time().'.'.$extension;
         $fullPath = $filename;
 
         $request->file('filename')->move(public_path('exam_files'), $filename);
 
         }else{
            
            $fullPath = $old_exam->filename;
         }
     
        
        //  dd($request->all());
        $exam = array(
            'matiere_id' => $request->matiere_id,
            'title'=> $request->title,
            'description'=> $request->description,
            'publier' => $request->publier,
            'filename'=>$fullPath,
        );

        // $exam = $this->examRepository->find($id);
        $this->examRepository->update($exam, $request->exam_id);


        if (empty($exam)) {
            Flash::error('Examen non trouvé');

            return redirect(route('exams.index'));
        }

        // $exam = $this->examRepository->update($request->all(), $id);

        Flash::success('Examen modifié avec succès.');

        return redirect(route('exams.index'));
    }catch(\Illuminate\Database\QueryException $e){
            
        Flash::error($e->getMessage());
        return redirect(route('matieres.index'));
    }
    }

    /**
     * Remove the specified Exam from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $exam = $this->examRepository->find($id);

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('exams.index'));
        }

        Exam::where('id', $id)->forceDelete();
        File::delete(public_path().'/lecon_files/'.$lecon->filename);
        Flash::success('SUCCES !');

        return redirect(route('exams.index'));
    }
}
