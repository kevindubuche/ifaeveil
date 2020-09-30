<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeconRequest;
use App\Http\Requests\UpdateLeconRequest;
use App\Repositories\LeconRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\Lecon;
use App\User;
use File;
class LeconController extends AppBaseController
{
    /** @var  LeconRepository */
    private $leconRepository;

    public function __construct(LeconRepository $leconRepo)
    {
        $this->leconRepository = $leconRepo;
    }

    /**
     * Display a listing of the Lecon.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lecons = $this->leconRepository->all();

        return view('lecons.index')
            ->with('lecons', $lecons);
    }

    /**
     * Show the form for creating a new Lecon.
     *
     * @return Response
     */
    public function create()
    {
        return view('lecons.create');
    }

    /**
     * Store a newly created Lecon in storage.
     *
     * @param CreateLeconRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
            'matiere_id' => 'required|nullable|integer',
            'description' => 'nullable|string',
            'contenu' => 'nullable|string',
            'publier' => 'nullable|integer',
            'creer_par' => 'required|nullable',
            'videoLink' => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $input = $request->all();
       
        try{
        if($request->file('filename')){
            $file = $request->file('filename');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $fullPath = $filename;
    
            $request->file('filename')->move(public_path('lecon_files'), $filename);

        }
        $matches = array();
        preg_match(' /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/', $request->videoLink, $matches);
        $match = $matches && strlen($matches[2]) === 11 ? $matches[2] : null;
      
            $lecon = new Lecon;
            $lecon->nom = $request->nom;
            $lecon->description = $request->description;
            $lecon->creer_par = $request->creer_par;
            $lecon->matiere_id = $request->matiere_id;
            $lecon->contenu = $request->editordata;
            $lecon->publier = $request->publier;
            $lecon->videoLink = $match;
            if($request->file('filename')){
                $lecon->filename = $fullPath;
          }else{
            $lecon->filename = "";
          }
          $lecon->save();
          
  
          Flash::success('SUCCES ! Le cours soumis a l\'administrateur pour verification.');
        return redirect()->back();
        
        }catch(\Illuminate\Database\QueryException $e){
            
            Flash::error($e->getMessage());
            return redirect(route('matieres.index'));
        }
    }

    /**
     * Display the specified Lecon.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lecon = $this->leconRepository->find($id);

        if (empty($lecon)) {
            Flash::error('Lecon not found');

            return redirect()->back();
        }

        return view('lecons.show')->with('lecon', $lecon);
    }

    /**
     * Show the form for editing the specified Lecon.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lecon = $this->leconRepository->find($id);

        if (empty($lecon)) {
            Flash::error('Lecon not found');

            return redirect()->back();
        }

        return view('lecons.edit')->with('lecon', $lecon);
    }

    /**
     * Update the specified Lecon in storage.
     *
     * @param int $id
     * @param UpdateLeconRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
            'matiere_id' => 'required|nullable|integer',
            'description' => 'nullable|string',
            'contenu' => 'nullable|string',
            'publier' => 'nullable|integer',
            'creer_par' => 'required|nullable',
            'videoLink' => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
           $lecon = $this->leconRepository->find($id);
           if (empty($lecon)) {
               Flash::error('Lecon non trouve');
   
               return redirect()->back();
           }
           try{
              //GESTION DU FICHIER
              if($request->file('filename')){
                  //nap delete ansyen document a
               File::delete(public_path().'/lecon_files/'.$lecon->filename);
               // nap jere nouvo a
               $file = $request->file('filename');
               $extension = $file->getClientOriginalExtension();
               $filename = time().'.'.$extension;
               $fullPath = $filename;
       
               
               $request->file('filename')->move(public_path('lecon_files'), $filename);
   
           }
        
       $matches = array();
       preg_match(' /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/', $request->videoLink, $matches);
       $match = $matches && strlen($matches[2]) === 11 ? $matches[2] : null;
   
               if($request->file('filename')){
                   $filename = $fullPath;
             }else{
               $filename = $lecon->filename;
             }
           //   dd($match);
           $newlecon = array(
               'nom' => $request->nom,
               'description' => $request->description,
               'creer_par' => $request->creer_par,
               'filename' => $filename,
               'contenu' => $request->editordata,
               'publier' => $request->publier,
               'videoLink' => $match
   
           );
           Lecon::findOrFail($id)->update($newlecon);
     
           Flash::success('SUCCES !');
   
           return redirect(route('matieres.index'));
        }catch(\Illuminate\Database\QueryException $e){
            
            Flash::error($e->getMessage());
            return redirect(route('matieres.index'));
        }
    }

    /**
     * Remove the specified Lecon from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lecon = $this->leconRepository->find($id);

        if (empty($lecon)) {
            Flash::error('Lecon not found');

            return redirect()->back();
        }

        Lecon::where('id', $id)->forceDelete();
            File::delete(public_path().'/lecon_files/'.$lecon->filename);
   
        Flash::success('SUCCES !');

        return redirect()->back();
    }
}
