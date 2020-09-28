<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEleveRequest;
use App\Http\Requests\UpdateEleveRequest;
use App\Repositories\EleveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\User;
use File;
use Str;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Eleve;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\Classe;


class EleveController extends AppBaseController
{
    /** @var  EleveRepository */
    private $eleveRepository;

    public function __construct(EleveRepository $eleveRepo)
    {
        $this->eleveRepository = $eleveRepo;
    }

    /**
     * Display a listing of the Eleve.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $eleves = $this->eleveRepository->all();

        return view('eleves.index')
            ->with('eleves', $eleves);
    }

    /**
     * Show the form for creating a new Eleve.
     *
     * @return Response
     */
    public function create()
    {
        $allClasses = Classe::all();
        return view('eleves.create', compact('allClasses'));
    }

    /**
     * Store a newly created Eleve in storage.
     *
     * @param CreateEleveRequest $request
     *
     * @return Response
     */
    public function store(CreateEleveRequest $request)
    {
        $validator = Validator::make($request->all(), [
        'nom' => 'required|nullable|string|max:45',
        'prenom' => 'required|nullable|string|max:45',
        'class_id' => 'required|nullable|integer',
        'username' => 'required|nullable|string|max:45',
        'sexe' => 'required|nullable|string|max:45',
        'tel' => 'nullable|string|max:45',
        'adresse' => 'nullable|string|max:45',
        'religion' => 'required|nullable|string|max:45',
        'nom_pere' => 'nullable|string|max:45',
        'tel_pere' => 'nullable|string|max:45',
        'nom_mere' => 'required|nullable|string|max:45',
        'tel_mere' => 'nullable|string|max:45',
        'nom_reponsable' => 'nullable|string|max:45',
        'tel_responsable' => 'nullable|string|max:45',
        'date_naissance' => 'required|nullable|string|max:45',
        'date_admission' => 'nullable|string|max:45',
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
            $user->role = 3;
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
            $eleve = new Eleve;
            $eleve->nom = $request->nom;
            $eleve->prenom = $request->prenom;
            $eleve->class_id = $request->class_id;
            $eleve->username = $request->username;
            $eleve->sexe = $request->sexe;
            $eleve->tel = $request->tel;
            $eleve->adresse = $request->adresse;
            $eleve->religion = $request->religion;
            $eleve->nom_pere = $request->nom_pere;
            $eleve->tel_pere = $request->tel_pere;
            $eleve->nom_mere = $request->nom_mere;
            $eleve->tel_mere = $request->tel_mere;
            $eleve->nom_reponsable = $request->nom_reponsable;
            $eleve->tel_responsable = $request->tel_responsable;
            $eleve->date_naissance = $request->date_naissance;
            $eleve->date_admission = $request->date_admission;
            $eleve->user_id = $user_id;
            $eleve->image = $image_name;
            $eleve->save();
        }
        Flash::success('SUCCES !');

        return redirect(route('eleves.index'));

        }catch(\Illuminate\Database\QueryException $e){
            if($save){//si user a gentan save nan db a delete li
                User::where('id', $user_id)->forceDelete();
            }
            Flash::error($e->getMessage());
            return redirect(route('eleves.index'));
           }

        }else{
            Flash::error('Nom d\'utilisateur existant');
            return redirect(route('eleves.index'));
        }
      
    }

    /**
     * Display the specified Eleve.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eleve = $this->eleveRepository->find($id);

        if (empty($eleve)) {
            Flash::error('Eleve not found');

            return redirect(route('eleves.index'));
        }

        return view('eleves.show')->with('eleve', $eleve);
    }

    /**
     * Show the form for editing the specified Eleve.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eleve = $this->eleveRepository->find($id);
        $allClasses = Classe::all();
        if (empty($eleve)) {
            Flash::error('Eleve not found');

            return redirect(route('eleves.index'));
        }

        return view('eleves.edit', compact( 'allClasses'))->with('eleve', $eleve);
    }

    /**
     * Update the specified Eleve in storage.
     *
     * @param int $id
     * @param UpdateEleveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEleveRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
            'prenom' => 'required|nullable|string|max:45',
            'class_id' => 'required|nullable|integer',
            'username' => 'required|nullable|string|max:45',
            'sexe' => 'required|nullable|string|max:45',
            'tel' => 'nullable|string|max:45',
            'adresse' => 'nullable|string|max:45',
            'religion' => 'required|nullable|string|max:45',
            'nom_pere' => 'nullable|string|max:45',
            'tel_pere' => 'nullable|string|max:45',
            'nom_mere' => 'required|nullable|string|max:45',
            'tel_mere' => 'nullable|string|max:45',
            'nom_reponsable' => 'nullable|string|max:45',
            'tel_responsable' => 'nullable|string|max:45',
            'date_naissance' => 'required|nullable|string|max:45',
            'date_admission' => 'nullable|string|max:45',
            ]);
            if ($validator->fails()) {
                Session::flash('error', $validator->messages()->first());
                Flash::error( $validator->messages()->first());
                return redirect()->back()->withInput();
           }
        $eleve = $this->eleveRepository->find($id);
        $usernameExist = User::where('username',$request->username)->where('id', '!=' , $request->user_id)->count();
        if($usernameExist ==0 ){
            try{
                if (empty($eleve)) {
                    Flash::error('Eleve not found');
        
                    return redirect(route('eleves.index'));
                }
                $user = array(
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'username' => $request->username,
                    //yo pa update password la
                  //  'password' =>   Hash::make( $request->password)     
                    
                );
                User::findOrFail($eleve->user_id)->update($user);
                if($request->image != $eleve->image){
                    //DELETE OLD IMAGE
                    if( $eleve->image !='defaultAvatar.png' 
                  && $request->image != null ){
                          File::delete(public_path().'/user_images/'.$eleve->image);
                    }
                }
                $image = $request->file('image'); 
                if($image ==null){
                    $image_name = $eleve->image;
                  
                }else{
                    $image_name = uniqid()."_".time().date("Ymd")."_IMG".'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('user_images'), $image_name);
        
                }
                $eleve->fill($request->except(['image']));
          
                $eleve->image= $image_name ;
                $eleve->save();

                Flash::success('SUCCES !');

                return redirect(route('eleves.index'));
            }catch(\Illuminate\Database\QueryException $e){
               
                Flash::error($e->getMessage());
                return redirect(route('eleves.index'));
                
               }
        
        }
        else{
            Flash::error('Nom d\'utilisateur existant');
            return redirect(route('eleves.index'));
        }
       
        
    }

    /**
     * Remove the specified Eleve from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eleve = $this->eleveRepository->find($id);

        if (empty($eleve)) {
            Flash::error('Eleve not found');

            return redirect(route('eleves.index'));
        }

        User::where('id', $eleve->user_id)->forceDelete();

        Flash::success('SUCCES !');
        return redirect(route('eleves.index'));
    }
}
