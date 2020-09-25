<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Repositories\MessageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;


use App\Models\Classe;
use App\Models\Messages_assignation;;
use DB;
use App\Models\Message;
use App\User;
use App\Models\Eleve;
use App\Models\Prof;

class MessageController extends AppBaseController
{
    /** @var  MessageRepository */
    private $messageRepository;

    public function __construct(MessageRepository $messageRepo)
    {
        $this->messageRepository = $messageRepo;
    }

    /**
     * Display a listing of the Message.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        /// #######  start usefull function
        function IsAdm($id){
            $SearchUser = User::find($id);
            if($SearchUser){
                if($SearchUser->role == 1){
                    return true;
                }
            }
            return false;
        }
   /// #######  end usefull function

    $actuses = $this->messageRepository->all();

    $user = User::find(auth()->user()->id);
          //ADM SEE ALL ACTU
          if($user->role == 1 ){
            return view('messages.index')
            ->with('messages', $actuses);
        }
     //teachers SEE only MESAJ YO KREYE AK MESAj ADM KREYE
     else  if($user->role == 2 ){
       
        // dd('role 2');
        $actuAdm = collect();
        foreach($actuses as $actu){
            if(IsAdm($actu->created_by)){
                $actuAdm->push($actu);
            }
        }
     
        
        $actuTeacher = Message::where(['created_by'=> $user->id])->get();
        $actuses = $actuAdm->merge($actuTeacher);
        return view('messages.index')
        ->with('messages', $actuses);
    }

    //ELEVE we si actu a assigner a classe li
    else  {
        // dd('role default');
        $student = Eleve::where(['user_id'=> $user->id])->first();
        //  dd($student->first_name);
        $actuTeacher = Message::join('messages_assignations','messages_assignations.message_id','=','messages.id')//qui sont dans l'horaire de l'etudiant
        ->where('class_id',$student->class_id)
        ->select('actus.*')
        ->get();
    return view('messages.index')
        ->with('messages', $actuTeacher);
    }

    }

    /**
     * Show the form for creating a new Message.
     *
     * @return Response
     */
    public function create()
    {
        if(auth()->user()->role == 1){
           $classes = Classe::all();
            return view('messages.create', compact('classes')); 
            }
            return redirect()->back();
    }

    /**
     * Store a newly created Message in storage.
     *
     * @param CreateMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateMessageRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'created_by' => 'required|nullable',
            'title' => 'required|nullable|string|max:45',
            'body' => 'required|nullable|string',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            Flash::error( $validator->messages()->first());
            return redirect()->back()->withInput();
       }
        try{
        $input = $request->all();

        if( ! $request->multiclass){
            Flash::error('Classe incorecte');
           
            return redirect()->back();
        }

        $actus = $this->messageRepository->create($input);
        $actu_id =DB::getPdo()->lastInsertId(); 
        
       
        foreach($request->multiclass as $key => $teach){
            $data2 = array('message_id'=> $actu_id,
            'class_id'=> $request->multiclass[$key]);

        $checkExist = Messages_assignation::where('message_id', $actu_id)
                        ->where('class_id', $request->multiclass[$key])
                        ->first();

        if($checkExist){
            Flash::error('Une ou plusieurs assignations existaient deja pour cette classe.');
            return redirect()->back();
        }
        Messages_assignation::insert($data2);
    }

        

        Flash::success('Publication faite avec succes.');

        return redirect(route('messages.index'));

    }catch(\Illuminate\Database\QueryException $e){
        
        Flash::error($e->getMessage());
        return redirect(route('messages.index'));
        
       }

        
    }

    /**
     * Display the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        return view('messages.show')->with('message', $message);
    }

    /**
     * Show the form for editing the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        if(auth()->user()->role == 1){
            $actus = $this->messageRepository->find($id);
          $classes = Classe::all();
    
            if (empty($actus)) {
                Flash::error('Message not found');
    
                return redirect(route('messages.index'));
            }
    
            return view('messages.edit',compact('classes'))->with('message', $actus);
        }
        return redirect()->back();



    }

    /**
     * Update the specified Message in storage.
     *
     * @param int $id
     * @param UpdateMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMessageRequest $request)
    {

        
        $input = $request->all();

        if( ! $request->multiclass){
            Flash::error('Classe incorecte');
            return redirect()->back();
        }


        $actus = $this->messageRepository->find($id);

        if (empty($actus)) {
            Flash::error('Publication non trouvé');

            return redirect(route('messages.index'));
        }

        $actus = $this->messageRepository->update($request->all(), $id);

        //ann delete actuassigning ki gen rapport avel
        $oldActuAss = Messages_assignation::where('message_id', $id)
                        ->get();
        foreach($oldActuAss as $ac){
            $ac->forceDelete();
        }

        
        foreach($request->multiclass as $key => $teach){
            $data2 = array('message_id'=> $id,
            'class_id'=> $request->multiclass[$key]);

        $checkExist = Messages_assignation::where('message_id', $id)
                        ->where('class_id', $request->multiclass[$key])
                        ->first();
        Messages_assignation::insert($data2);
    }

    Flash::success('Publication modifiée avec succes.');

        return redirect(route('messages.index'));

    }

    /**
     * Remove the specified Message from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $this->messageRepository->delete($id);

        Flash::success('Message deleted successfully.');

        return redirect(route('messages.index'));
    }
}
