<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAllUserRequest;
use App\Http\Requests\UpdateAllUserRequest;
use App\Repositories\AllUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use App\User;
use App\Models\Prof;
use App\Models\Eleve;
use App\Models\Admin;

class AllUserController extends AppBaseController
{
    /** @var  AllUserRepository */
    private $allUserRepository;

    public function __construct(AllUserRepository $allUserRepo)
    {
        $this->allUserRepository = $allUserRepo;
    }

    /**
     * Display a listing of the AllUser.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $allUsers = $this->allUserRepository->all();

        return view('all_users.index')
            ->with('allUsers', $allUsers);
    }

    /**
     * Show the form for creating a new AllUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('all_users.create');
    }

    /**
     * Store a newly created AllUser in storage.
     *
     * @param CreateAllUserRequest $request
     *
     * @return Response
     */
    public function store(CreateAllUserRequest $request)
    {
        $input = $request->all();

        $allUser = $this->allUserRepository->create($input);

        Flash::success('All User saved successfully.');

        return redirect(route('allUsers.index'));
    }

    /**
     * Display the specified AllUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $allUser = $this->allUserRepository->find($id);

        if (empty($allUser)) {
            Flash::error('All User not found');

            return redirect(route('allUsers.index'));
        }

        return view('all_users.show')->with('allUser', $allUser);
    }

    /**
     * Show the form for editing the specified AllUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $allUser = $this->allUserRepository->find($id);

        if (empty($allUser)) {
            Flash::error('All User not found');

            return redirect(route('allUsers.index'));
        }

        return view('all_users.edit')->with('allUser', $allUser);
    }

    /**
     * Update the specified AllUser in storage.
     *
     * @param int $id
     * @param UpdateAllUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAllUserRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|nullable|string|max:45'
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
       $allUser = $this->allUserRepository->find($id);
       try{ 
            if (empty($allUser)) {
            Flash::error('All User not found');

            return redirect(route('allUsers.index'));
        }
       $user = array(
        'password' =>   Hash::make( $request->password)     
        
    );
    User::findOrFail($allUser->id)->update($user);

        Flash::success('SUCCES !');

        return redirect(route('allUsers.index'));
    }catch(\Illuminate\Database\QueryException $e){
              Flash::error($e->getMessage());
        return redirect(route('allUsers.index'));
    
   }
    }

    /**
     * Remove the specified AllUser from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     $allUser = $this->allUserRepository->find($id);

    //     if (empty($allUser)) {
    //         Flash::error('All User not found');

    //         return redirect(route('allUsers.index'));
    //     }

    //     $this->allUserRepository->delete($id);

    //     Flash::success('All User deleted successfully.');

    //     return redirect(route('allUsers.index'));
    // }

    
    public function profile($id){

        if($id != auth()->user()->id  ){
            return redirect()->back();
        }
         // dd($schedules);
         //CHECK IF IT IS A TEACHER , A STUDENT OR AN ADMIN
         $testUser = User::where(['id'=> $id])->first(); 
          //IF ADMIN
          if($testUser->role == 1){
             $user = Admin::where('user_id', $id)->first();
         // dd($student);
         return view('all_users.profile', compact('user'));
         }
         //IF TEACHER
         if($testUser->role == 2){
             $user = Prof::where('user_id', $id)->first();
         // dd($student);
         return view('all_users.profile', compact('user'));
         }
            //IF STUDENT
         elseif($testUser->role == 3){
             $user = Eleve::where('user_id', $id)->first();
         return view('all_users.profile', compact('user'));
         }
         
 
     }
 
     public function userUpdatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|nullable|string|max:45',
            'password' => 'required|nullable|string|max:45'
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
         $newData = $request->all();
         
         //nap teste si ancien password la bon
         $user = User::where(['id'=> $newData['user_id'] ])->first(); 
         // dd($user->password);
         if ( Hash::check($newData['old_password'], $user->password) ){
             // valid password and send msg update password
             
             $new_password = Hash::make( $newData['new_password']);//this is the new password
             User::where('id', $newData['user_id'])
             ->update(['password'=>$new_password]);
           
             Flash::success('Votre mot de passe a ete moidifie avec success');
             return redirect()->back();
   
         }else{
             // send invalid msg or email not found
             Flash::error('Echec de la modification du mot de passe');
             return redirect()->back();
         }
 
     }


     
    public function verifyUsername(Request $request){
        $user = $request->all();
        //ann verifye username la
        $exist = User::where(['username'=> $user['username']])->count();

        if ($exist == 1 ){
            // Flash::success('Your username is correct');
            echo "false"; die;
        }else{
            // Flash::error('Your username is not correct');
            echo "true"; die;
        }

        // return view('students.lectures.biodata',compact('student'));
    }

}
