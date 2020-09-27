<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuiz_reponseRequest;
use App\Http\Requests\UpdateQuiz_reponseRequest;
use App\Repositories\Quiz_reponseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Quiz_reponseController extends AppBaseController
{
    /** @var  Quiz_reponseRepository */
    private $quizReponseRepository;

    public function __construct(Quiz_reponseRepository $quizReponseRepo)
    {
        $this->quizReponseRepository = $quizReponseRepo;
    }

    /**
     * Display a listing of the Quiz_reponse.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $quizReponses = $this->quizReponseRepository->all();

        return view('quiz_reponses.index')
            ->with('quizReponses', $quizReponses);
    }

    /**
     * Show the form for creating a new Quiz_reponse.
     *
     * @return Response
     */
    public function create()
    {
        return view('quiz_reponses.create');
    }

    /**
     * Store a newly created Quiz_reponse in storage.
     *
     * @param CreateQuiz_reponseRequest $request
     *
     * @return Response
     */
    public function store(CreateQuiz_reponseRequest $request)
    {
        $input = $request->all();

        $quizReponse = $this->quizReponseRepository->create($input);

        Flash::success('Quiz Reponse saved successfully.');

        return redirect(route('quizReponses.index'));
    }

    /**
     * Display the specified Quiz_reponse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quizReponse = $this->quizReponseRepository->find($id);

        if (empty($quizReponse)) {
            Flash::error('Quiz Reponse not found');

            return redirect(route('quizReponses.index'));
        }

        return view('quiz_reponses.show')->with('quizReponse', $quizReponse);
    }

    /**
     * Show the form for editing the specified Quiz_reponse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quizReponse = $this->quizReponseRepository->find($id);

        if (empty($quizReponse)) {
            Flash::error('Quiz Reponse not found');

            return redirect(route('quizReponses.index'));
        }

        return view('quiz_reponses.edit')->with('quizReponse', $quizReponse);
    }

    /**
     * Update the specified Quiz_reponse in storage.
     *
     * @param int $id
     * @param UpdateQuiz_reponseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuiz_reponseRequest $request)
    {
        $quizReponse = $this->quizReponseRepository->find($id);

        if (empty($quizReponse)) {
            Flash::error('Quiz Reponse not found');

            return redirect(route('quizReponses.index'));
        }

        $quizReponse = $this->quizReponseRepository->update($request->all(), $id);

        Flash::success('Quiz Reponse updated successfully.');

        return redirect(route('quizReponses.index'));
    }

    /**
     * Remove the specified Quiz_reponse from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quizReponse = $this->quizReponseRepository->find($id);

        if (empty($quizReponse)) {
            Flash::error('Quiz Reponse not found');

            return redirect(route('quizReponses.index'));
        }

        $this->quizReponseRepository->delete($id);

        Flash::success('Quiz Reponse deleted successfully.');

        return redirect(route('quizReponses.index'));
    }
}
