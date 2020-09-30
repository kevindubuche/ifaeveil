<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSoumissionRequest;
use App\Http\Requests\UpdateSoumissionRequest;
use App\Repositories\SoumissionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Exam;
use App\Models\Soumission;
use App\User;
use Illuminate\Support\Facades\Validator;
use Session;
use DB;
class SoumissionController extends AppBaseController
{
    /** @var  SoumissionRepository */
    private $soumissionRepository;

    public function __construct(SoumissionRepository $soumissionRepo)
    {
        $this->soumissionRepository = $soumissionRepo;
    }

    /**
     * Display a listing of the Soumission.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $soumissions = $this->soumissionRepository->all();
     
        $user = User::find(auth()->user()->id);
        if($user->role == 1 ){
            return view('soumissions.index')
            ->with('soumissions', $soumissions);
        }
         //eleves SEE only his soummisions
         else  if($user->role == 3 ){
            $soumissions = Soumission::where(['eleve_id'=> $user->id])->get();
            return view('soumissions.index')
            ->with('soumissions', $soumissions);
        }
        else if ($user->role == 2 ) {
        //   $soumissions = Soumission::join('exams','exams.id','=','soumissions.exam_id')
        //     ->where('exams.creer_par',$user->id)
        //    ->get();

        $soumissions = Soumission::
    select('soumissions.*')
    ->join('exams', 'exams.id', '=', 'soumissions.exam_id')
    ->where('exams.creer_par', $user->id)
    ->get();

           return view('soumissions.index')
           ->with('soumissions', $soumissions);

               
                        
        }

    }

    /**
     * Show the form for creating a new Soumission.
     *
     * @return Response
     */
    public function create()
    {
        $exams = Exam::all();

        return view('soumissions.create',compact('exams'));
    }

    /**
     * Store a newly created Soumission in storage.
     *
     * @param CreateSoumissionRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->role == 3){
        $validator = Validator::make($request->all(), [
            'exam_id' => 'nullable|integer',
            'description' => 'nullable|string|max:255',
            'filename' => 'nullable',
            'eleve_id' => 'nullable',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $input = $request->all();
       try{
          //GESTION DU FICHIER
          $file = $request->file('filename');
          $extension = $file->getClientOriginalExtension();
          $filename = time().'.'.$extension;
          $fullPath = $filename;
  
         
          $request->file('filename')->move(public_path('soumission_files'), $filename);
   
          
        $soumission = new Soumission;
        $soumission->exam_id = $request->exam_id;
        $soumission->description = $request->description;
        $soumission->eleve_id = $request->eleve_id;
        $soumission->filename = $fullPath;
//  dd($input);
        $soumission->save();

        Flash::success('SUCCES !');

        return redirect(route('soumissions.index'));
    }catch(\Illuminate\Database\QueryException $e){
       
        Flash::error($e->getMessage());
        return redirect(route('soumissions.index'));
        
       }
    }else{
        Flash::error('Disponoble seulement pour eleves !');
        return redirect(route('soumissions.index'));
    }
    }

    /**
     * Display the specified Soumission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return redirect()->back();
        // $soumission = $this->soumissionRepository->find($id);

        // if (empty($soumission)) {
        //     Flash::error('Soumission not found');

        //     return redirect(route('soumissions.index'));
        // }

        // return view('soumissions.show')->with('soumission', $soumission);
    }

    /**
     * Show the form for editing the specified Soumission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        return redirect()->back();
        // $soumission = $this->soumissionRepository->find($id);

        // if (empty($soumission)) {
        //     Flash::error('Soumission not found');

        //     return redirect(route('soumissions.index'));
        // }

        // return view('soumissions.edit')->with('soumission', $soumission);
    }

    /**
     * Update the specified Soumission in storage.
     *
     * @param int $id
     * @param UpdateSoumissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoumissionRequest $request)
    {
        return redirect()->back();
        // $soumission = $this->soumissionRepository->find($id);

        // if (empty($soumission)) {
        //     Flash::error('Soumission not found');

        //     return redirect(route('soumissions.index'));
        // }

        // $soumission = $this->soumissionRepository->update($request->all(), $id);

        // Flash::success('Soumission updated successfully.');

        // return redirect(route('soumissions.index'));
    }

    /**
     * Remove the specified Soumission from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(auth()->user()->role == 1){
            $soumission = $this->soumissionRepository->find($id);

        if (empty($soumission)) {
            Flash::error('Soumission not found');

            return redirect(route('soumissions.index'));
        }

        Soumission::where('id', $id)->forceDelete();
        File::delete(public_path().'/soumission_files/'.$soumission->filename);
        Flash::success('SUCCES !');


        return redirect(route('soumissions.index'));
        }
        else{
            return redirect()->back();
        }
        
    }
}
