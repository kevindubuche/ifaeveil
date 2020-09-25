<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessages_assignationRequest;
use App\Http\Requests\UpdateMessages_assignationRequest;
use App\Repositories\Messages_assignationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Messages_assignationController extends AppBaseController
{
    /** @var  Messages_assignationRepository */
    private $messagesAssignationRepository;

    public function __construct(Messages_assignationRepository $messagesAssignationRepo)
    {
        $this->messagesAssignationRepository = $messagesAssignationRepo;
    }

    /**
     * Display a listing of the Messages_assignation.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $messagesAssignations = $this->messagesAssignationRepository->all();

        return view('messages_assignations.index')
            ->with('messagesAssignations', $messagesAssignations);
    }

    /**
     * Show the form for creating a new Messages_assignation.
     *
     * @return Response
     */
    public function create()
    {
        return view('messages_assignations.create');
    }

    /**
     * Store a newly created Messages_assignation in storage.
     *
     * @param CreateMessages_assignationRequest $request
     *
     * @return Response
     */
    public function store(CreateMessages_assignationRequest $request)
    {
        $input = $request->all();

        $messagesAssignation = $this->messagesAssignationRepository->create($input);

        Flash::success('Messages Assignation saved successfully.');

        return redirect(route('messagesAssignations.index'));
    }

    /**
     * Display the specified Messages_assignation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $messagesAssignation = $this->messagesAssignationRepository->find($id);

        if (empty($messagesAssignation)) {
            Flash::error('Messages Assignation not found');

            return redirect(route('messagesAssignations.index'));
        }

        return view('messages_assignations.show')->with('messagesAssignation', $messagesAssignation);
    }

    /**
     * Show the form for editing the specified Messages_assignation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $messagesAssignation = $this->messagesAssignationRepository->find($id);

        if (empty($messagesAssignation)) {
            Flash::error('Messages Assignation not found');

            return redirect(route('messagesAssignations.index'));
        }

        return view('messages_assignations.edit')->with('messagesAssignation', $messagesAssignation);
    }

    /**
     * Update the specified Messages_assignation in storage.
     *
     * @param int $id
     * @param UpdateMessages_assignationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMessages_assignationRequest $request)
    {
        $messagesAssignation = $this->messagesAssignationRepository->find($id);

        if (empty($messagesAssignation)) {
            Flash::error('Messages Assignation not found');

            return redirect(route('messagesAssignations.index'));
        }

        $messagesAssignation = $this->messagesAssignationRepository->update($request->all(), $id);

        Flash::success('Messages Assignation updated successfully.');

        return redirect(route('messagesAssignations.index'));
    }

    /**
     * Remove the specified Messages_assignation from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $messagesAssignation = $this->messagesAssignationRepository->find($id);

        if (empty($messagesAssignation)) {
            Flash::error('Messages Assignation not found');

            return redirect(route('messagesAssignations.index'));
        }

        $this->messagesAssignationRepository->delete($id);

        Flash::success('Messages Assignation deleted successfully.');

        return redirect(route('messagesAssignations.index'));
    }
}
