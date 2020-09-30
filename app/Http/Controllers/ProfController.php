<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfRequest;
use App\Http\Requests\UpdateProfRequest;
use App\Repositories\ProfRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\User;
use File;
use Str;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Prof;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\Classe;


class ProfController extends AppBaseController
{
    /** @var  ProfRepository */
    private $profRepository;

    public function __construct(ProfRepository $profRepo)
    {
        $this->profRepository = $profRepo;
    }

    /**
     * Display a listing of the Prof.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
          $profs = Prof::orderBy('nom', 'asc')->get();
            return view('profs.index')
            ->with('profs', $profs);
    }

    /**
     * Show the form for creating a new Prof.
     *
     * @return Response
     */
    public function create()
    {
        return view('profs.create');
    }

    /**
     * Store a newly created Prof in storage.
     *
     * @param CreateProfRequest $request
     *
     * @return Response
     */
    public function store(CreateProfRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
            'prenom' => 'required|nullable|string|max:45',
            'username' => 'required|nullable|string|max:45',
            'sexe' => 'required|nullable|string|max:45',
            'statusmatrimonial' => 'required|nullable|string|max:45',
            'datenaissance' => 'required|nullable|string|max:45',
            'tel' => 'nullable|string|max:45',
            'adresse' => 'nullable|string|max:45',
            'date_entree_en_service' => 'nullable|string|max:45',
            'religion' => 'required|nullable|string|max:45',
            'nif' => 'nullable|string|max:45',
            'niveau' => 'nullable|string|max:45',
            'option' => 'nullable|string|max:45',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
       $usernameExist = User::where('username',$request->username)->count();
        if($usernameExist ==0){
         $save=null;
       try{
        $input = $request->all();
        ///////////creation user
            $user = new User;
            $user->role = 2;
            $user->username = $request->username;
            $password = 'password';//nou ka genere yon ran si nou vle
            $user->password = Hash::make( $password);

            $save =$user->save();
            $user_id =DB::getPdo()->lastInsertId(); 
        //////////fin creation user
        if($save){
            //GESTION DE L'IMAGE
            $image = $request->file('image');
            $image_name = "";
            if($image==null){
                $image_name = "defaultAvatar.png";
            }
            else{
                $genarate_name = uniqid()."_".time().date("Ymd")."_IMG";
                $image_name = $genarate_name.'.'.$image->getClientOriginalExtension();  
            }
            if($image ==null){

            }else{
                $image->move(public_path('user_images'), $image_name);
            }
            $teacher = new Prof;
            $teacher->nom = $request->nom;
            $teacher->prenom = $request->prenom;
            $teacher->sexe = $request->sexe;
            $teacher->statusmatrimonial = $request->statusmatrimonial;
            $teacher->username = $request->username;
            $teacher->datenaissance = $request->datenaissance;
            $teacher->tel = $request->tel;
            $teacher->adresse = $request->adresse;
            $teacher->religion = $request->religion;
            $teacher->nif = $request->nif;
            $teacher->niveau = $request->niveau;
            $teacher->option = $request->option;
            $teacher->date_entree_en_service = $request->date_entree_en_service;
            $teacher->user_id = $user_id;
            $teacher->image = $image_name;
            $teacher->save();
        }
        Flash::success('SUCCES !');

        return redirect(route('profs.index'));
        }catch(\Illuminate\Database\QueryException $e){
            if($save){//si user a gentan save nan db a delete li
                User::where('id', $user_id)->forceDelete();
            }
            Flash::error($e->getMessage());
            return redirect(route('profs.index'));
           }
        }else{
            Flash::error('Nom d\'utilisateur existant');
            return redirect(route('profs.index'));
        }
    }

    /**
     * Display the specified Prof.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prof = $this->profRepository->find($id);
         
        if (empty($prof)) {
            Flash::error('Prof not found');

            return redirect(route('profs.index'));
        }

        return view('profs.show')->with('prof', $prof);
    }

    /**
     * Show the form for editing the specified Prof.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prof = $this->profRepository->find($id);

        if (empty($prof)) {
            Flash::error('Prof not found');

            return redirect(route('profs.index'));
        }

        return view('profs.edit')->with('prof', $prof);
    }

    /**
     * Update the specified Prof in storage.
     *
     * @param int $id
     * @param UpdateProfRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
            'prenom' => 'required|nullable|string|max:45',
            'username' => 'required|nullable|string|max:45',
            'sexe' => 'required|nullable|string|max:45',
            'statusmatrimonial' => 'required|nullable|string|max:45',
            'datenaissance' => 'required|nullable|string|max:45',
            'tel' => 'nullable|string|max:45',
            'adresse' => 'nullable|string|max:45',
            'date_entree_en_service' => 'nullable|string|max:45',
            'religion' => 'required|nullable|string|max:45',
            'nif' => 'nullable|string|max:45',
            'niveau' => 'nullable|string|max:45',
            'option' => 'nullable|string|max:45',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $prof = $this->profRepository->find($id);
        $usernameExist = User::where('username',$request->username)->where('id', '!=' , $request->user_id)->count();
        if($usernameExist ==0 ){
      
        try{
            if (empty($prof)) {
                Flash::error('Prof not found');
    
                return redirect(route('profs.index'));
            }

             $user = array(
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'username' => $request->username,
            //yo pa chanje password la, yo chanje password nan module ki dedier a cela
           // 'password' =>   Hash::make( $request->password)     
            
        );
        User::findOrFail($prof->user_id)->update($user);
        if($request->image != $prof->image){
            //DELETE OLD IMAGE
            if( $prof->image !='defaultAvatar.png' 
          && $request->image != null ){
                  File::delete(public_path().'/user_images/'.$prof->image);
            }
        }
        $image = $request->file('image'); 
        if($image ==null){
            $image_name = $prof->image;
          
        }else{
            $image_name = uniqid()."_".time().date("Ymd")."_IMG".'.'.$image->getClientOriginalExtension();
            $image->move(public_path('user_images'), $image_name);

        }
        $prof->fill($request->except(['image']));
          
          $prof->image= $image_name ;
          $prof->save();

        Flash::success('SUCCES !');

        return redirect(route('profs.index'));

    }catch(\Illuminate\Database\QueryException $e){
       
        Flash::error($e->getMessage());
        return redirect(route('admins.index'));
        
       }

    }
    else{
        Flash::error('Nom d\'utilisateur existant');
        return redirect(route('admins.index'));
    }
    }

    /**
     * Remove the specified Prof from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prof = $this->profRepository->find($id);

        if (empty($prof)) {
            Flash::error('Prof not found');

            return redirect(route('profs.index'));
        }

        User::where('id', $prof->user_id)->forceDelete();
        if( $prof->image !='defaultAvatar.png' ){
            File::delete(public_path().'/user_images/'.$prof->image);
      }

        Flash::success('SUCCES !');

        return redirect(route('profs.index'));
    }
}
