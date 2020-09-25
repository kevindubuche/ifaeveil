<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuiz_propositionRequest;
use App\Http\Requests\UpdateQuiz_propositionRequest;
use App\Repositories\Quiz_propositionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Quiz_propositionController extends AppBaseController
{
    /** @var  Quiz_propositionRepository */
    private $quizPropositionRepository;

    public function __construct(Quiz_propositionRepository $quizPropositionRepo)
    {
        $this->quizPropositionRepository = $quizPropositionRepo;
    }

    /**
     * Display a listing of the Quiz_proposition.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $quizPropositions = $this->quizPropositionRepository->all();

        return view('quiz_propositions.index')
            ->with('quizPropositions', $quizPropositions);
    }

    /**
     * Show the form for creating a new Quiz_proposition.
     *
     * @return Response
     */
    public function create()
    {
        return view('quiz_propositions.create');
    }

    /**
     * Store a newly created Quiz_proposition in storage.
     *
     * @param CreateQuiz_propositionRequest $request
     *
     * @return Response
     */
    public function store(CreateQuiz_propositionRequest $request)
    {
        $input = $request->all();

        $quizProposition = $this->quizPropositionRepository->create($input);

        Flash::success('Quiz Proposition saved successfully.');

        return redirect(route('quizPropositions.index'));
    }

    /**
     * Display the specified Quiz_proposition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quizProposition = $this->quizPropositionRepository->find($id);

        if (empty($quizProposition)) {
            Flash::error('Quiz Proposition not found');

            return redirect(route('quizPropositions.index'));
        }

        return view('quiz_propositions.show')->with('quizProposition', $quizProposition);
    }

    /**
     * Show the form for editing the specified Quiz_proposition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quizProposition = $this->quizPropositionRepository->find($id);

        if (empty($quizProposition)) {
            Flash::error('Quiz Proposition not found');

            return redirect(route('quizPropositions.index'));
        }

        return view('quiz_propositions.edit')->with('quizProposition', $quizProposition);
    }

    /**
     * Update the specified Quiz_proposition in storage.
     *
     * @param int $id
     * @param UpdateQuiz_propositionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuiz_propositionRequest $request)
    {
        $quizProposition = $this->quizPropositionRepository->find($id);

        if (empty($quizProposition)) {
            Flash::error('Quiz Proposition not found');

            return redirect(route('quizPropositions.index'));
        }

        $quizProposition = $this->quizPropositionRepository->update($request->all(), $id);

        Flash::success('Quiz Proposition updated successfully.');

        return redirect(route('quizPropositions.index'));
    }

    /**
     * Remove the specified Quiz_proposition from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quizProposition = $this->quizPropositionRepository->find($id);

        if (empty($quizProposition)) {
            Flash::error('Quiz Proposition not found');

            return redirect(route('quizPropositions.index'));
        }

        $this->quizPropositionRepository->delete($id);

        Flash::success('Quiz Proposition deleted successfully.');

        return redirect(route('quizPropositions.index'));
    }
}
