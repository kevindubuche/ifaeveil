<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Repositories\AdminRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\Admin;

class AdminController extends AppBaseController
{
    /** @var  AdminRepository */
    private $adminRepository;

    public function __construct(AdminRepository $adminRepo)
    {
        $this->adminRepository = $adminRepo;
    }

    /**
     * Display a listing of the Admin.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $admins = $this->adminRepository->all();

        return view('admins.index')
            ->with('admins', $admins);
    }

    /**
     * Show the form for creating a new Admin.
     *
     * @return Response
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created Admin in storage.
     *
     * @param CreateAdminRequest $request
     *
     * @return Response
     */
    public function store(CreateAdminRequest $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
            'prenom' => 'required|nullable|string|max:45',
            'username' => 'required|nullable|string|max:45',
            'password' => 'required|nullable|string|max:20',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $input = $request->all();
        $usernameExist = User::where('username',$request->username)->count();
        if($usernameExist ==0){
         $save=null;
        try{
        //NAP ADD USER A AVAN
        $user = new User;
        $user->username = $request->username;
        $user->role = 1;
        $password = $request->password;//nou ka genere yon ran si nou vle
        $user->password = Hash::make( $password);

        $save =$user->save();
        $user_id =DB::getPdo()->lastInsertId(); 
        if($save){
            $input['user_id'] =  $user_id;
            $admin = $this->adminRepository->create($request->except(['password']));

            Flash::success('SUCCES !');
    
            return redirect(route('admins.index'));
        }
        }catch(\Illuminate\Database\QueryException $e){
            //if email  exist before in db redirect with error messages
            if($save){//si user a gentan save nan db a delete li
                User::where('id', $user_id)->forceDelete();
            }
            Flash::error($e->getMessage());
            return redirect(route('admins.index'));
            
           }
        }else{
            Flash::error('Nom d\'utilisateur existant');
            return redirect(route('admins.index'));
        }

    }

    /**
     * Display the specified Admin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        return view('admins.show')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified Admin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        return view('admins.edit')->with('admin', $admin);
    }

    /**
     * Update the specified Admin in storage.
     *
     * @param int $id
     * @param UpdateAdminRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdminRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|nullable|string|max:45',
            'prenom' => 'required|nullable|string|max:45',
            'username' => 'required|nullable|string|max:45',
            // 'password' => 'required|nullable|string|max:20',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        $admin = $this->adminRepository->find($id);

        $usernameExist = User::where('username',$request->username)->where('id', '!=' , $request->user_id)->count();
        if($usernameExist ==0 ){
      
      try{
        if (empty($admin)) {
            Flash::error('Admin introuvable');

            return redirect(route('admins.index'));
        }
        
        $user = array(
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'username' => $request->username,
            // 'password' =>   Hash::make( $request->password)     
            
        );
        User::findOrFail($admin->user_id)->update($user);

        

        $admin = $this->adminRepository->update($request->all(), $id);

        Flash::success('SUCCES !');

        return redirect(route('admins.index'));
         }catch(\Illuminate\Database\QueryException $e){
            if($save){//si gen prob db
                User::where('id', $user_id)->forceDelete();
            }
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
     * Remove the specified Admin from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        
        User::where('id', $admin->user_id)->forceDelete();

        Flash::success('SUCCES !');

        return redirect(route('admins.index'));
    }
}
