<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuiznoteRequest;
use App\Http\Requests\UpdateQuiznoteRequest;
use App\Repositories\QuiznoteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Quiznote;
use App\user;
use App\Models\Eleve;

class QuiznoteController extends AppBaseController
{
    /** @var  QuiznoteRepository */
    private $quiznoteRepository;

    public function __construct(QuiznoteRepository $quiznoteRepo)
    {
        $this->quiznoteRepository = $quiznoteRepo;
    }

    /**
     * Display a listing of the Quiznote.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
                 $quiznotes = $this->quiznoteRepository->all();
            $user = User::find(auth()->user()->id);
            //ADM SEE ALL COURSES
            if($user->role == 1 ){
                return view('quiznotes.index')
                ->with('quiznotes', $quiznotes);
            }
               
              else if($user->role == 3 )  {
                $student = Eleve::where(['user_id'=> $user->id])->first();
                $quiznotes = Quiznote::where(['id_eleve'=> $student->user_id])->get();
                return view('quiznotes.index')
                ->with('quiznotes', $quiznotes);
            }
    
    }

    /**
     * Show the form for creating a new Quiznote.
     *
     * @return Response
     */
    public function create()
    {
        return redirect(route('quiznotes.index'));
        // return view('quiznotes.create');
    }

    /**
     * Store a newly created Quiznote in storage.
     *
     * @param CreateQuiznoteRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();

        // $quiznote = $this->quiznoteRepository->create($input);

        // Flash::success('Quiznote saved successfully.');

        // return redirect(route('quiznotes.index'));


        $noteQuiz = new Quiznote;
        $noteQuiz->id_eleve = $request->student_id;
        $noteQuiz->quiz_id = $request->quiz_id;
        $noteQuiz->score = $request->score;
        $noteQuiz->save();

         //$noteQuiz = $this->noteQuizRepository->create($input);
        return  response()->json($noteQuiz);
    }

    /**
     * Display the specified Quiznote.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return redirect(route('quiznotes.index'));
        // $quiznote = $this->quiznoteRepository->find($id);

        // if (empty($quiznote)) {
        //     Flash::error('Quiznote not found');

        //     return redirect(route('quiznotes.index'));
        // }

        // return view('quiznotes.show')->with('quiznote', $quiznote);
    }

    /**
     * Show the form for editing the specified Quiznote.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        return redirect(route('quiznotes.index'));
        // $quiznote = $this->quiznoteRepository->find($id);

        // if (empty($quiznote)) {
        //     Flash::error('Quiznote not found');

        //     return redirect(route('quiznotes.index'));
        // }

        // return view('quiznotes.edit')->with('quiznote', $quiznote);
    }

    /**
     * Update the specified Quiznote in storage.
     *
     * @param int $id
     * @param UpdateQuiznoteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuiznoteRequest $request)
    {
        $quiznote = $this->quiznoteRepository->find($id);

        if (empty($quiznote)) {
            Flash::error('Quiznote not found');

            return redirect(route('quiznotes.index'));
        }

        $quiznote = $this->quiznoteRepository->update($request->all(), $id);

        Flash::success('Quiznote updated successfully.');

        return redirect(route('quiznotes.index'));
    }

    /**
     * Remove the specified Quiznote from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quiznote = $this->quiznoteRepository->find($id);

        if (empty($quiznote)) {
            Flash::error('Quiznote not found');

            return redirect(route('quiznotes.index'));
        }
    if(auth()->user()->role == 1){
        Quiznote::where('id', $id)->forceDelete();

            Flash::success('SUCCES !');
    }
            

        return redirect(route('quiznotes.index'));
    }
}
