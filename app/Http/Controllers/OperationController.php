<?php

namespace App\Http\Controllers;

use App\DataTables\OperationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOperationRequest;
use App\Http\Requests\UpdateOperationRequest;
use App\Repositories\OperationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OperationController extends AppBaseController
{
    /** @var  OperationRepository */
    private $operationRepository;

    public function __construct(OperationRepository $operationRepo)
    {
        $this->operationRepository = $operationRepo;
    }

    /**
     * Display a listing of the Operation.
     *
     * @param OperationDataTable $operationDataTable
     * @return Response
     */
    public function index(OperationDataTable $operationDataTable)
    {
        return $operationDataTable->render('operations.index');
    }

    /**
     * Show the form for creating a new Operation.
     *
     * @return Response
     */
    public function create()
    {
        return view('operations.create');
    }

    /**
     * Store a newly created Operation in storage.
     *
     * @param CreateOperationRequest $request
     *
     * @return Response
     */
    public function store(CreateOperationRequest $request)
    {
        $input = $request->all();

        $operation = $this->operationRepository->create($input);

        Flash::success('Operation saved successfully.');

        return redirect(route('operations.index'));
    }

    /**
     * Display the specified Operation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $operation = $this->operationRepository->findWithoutFail($id);

        if (empty($operation)) {
            Flash::error('Operation not found');

            return redirect(route('operations.index'));
        }

        return view('operations.show')->with('operation', $operation);
    }

    /**
     * Show the form for editing the specified Operation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $operation = $this->operationRepository->findWithoutFail($id);

        if (empty($operation)) {
            Flash::error('Operation not found');

            return redirect(route('operations.index'));
        }

        return view('operations.edit')->with('operation', $operation);
    }

    /**
     * Update the specified Operation in storage.
     *
     * @param  int              $id
     * @param UpdateOperationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperationRequest $request)
    {
        $operation = $this->operationRepository->findWithoutFail($id);

        if (empty($operation)) {
            Flash::error('Operation not found');

            return redirect(route('operations.index'));
        }

        $operation = $this->operationRepository->update($request->all(), $id);

        Flash::success('Operation updated successfully.');

        return redirect(route('operations.index'));
    }

    /**
     * Remove the specified Operation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $operation = $this->operationRepository->findWithoutFail($id);

        if (empty($operation)) {
            Flash::error('Operation not found');

            return redirect(route('operations.index'));
        }

        $this->operationRepository->delete($id);

        Flash::success('Operation deleted successfully.');

        return redirect(route('operations.index'));
    }
}
