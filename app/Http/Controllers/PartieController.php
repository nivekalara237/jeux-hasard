<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartieRequest;
use App\Http\Requests\UpdatePartieRequest;
use App\Repositories\PartieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PartieController extends AppBaseController
{
    /** @var  PartieRepository */
    private $partieRepository;

    public function __construct(PartieRepository $partieRepo)
    {
        $this->partieRepository = $partieRepo;
    }

    /**
     * Display a listing of the Partie.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->partieRepository->pushCriteria(new RequestCriteria($request));
        $parties = $this->partieRepository->paginate(25);

        return view('parties.index')
            ->with('parties', $parties);
    }

    /**
     * Show the form for creating a new Partie.
     *
     * @return Response
     */
    public function create()
    {
        return view('parties.create');
    }

    /**
     * Store a newly created Partie in storage.
     *
     * @param CreatePartieRequest $request
     *
     * @return Response
     */
    public function store(CreatePartieRequest $request)
    {
        $input = $request->all();

        $partie = $this->partieRepository->create($input);

        Flash::success('Partie saved successfully.');

        return redirect(route('parties.index'));
    }

    /**
     * Display the specified Partie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partie = $this->partieRepository->findWithoutFail($id);

        if (empty($partie)) {
            Flash::error('Partie not found');

            return redirect(route('parties.index'));
        }

        return view('parties.show')->with('partie', $partie);
    }

    /**
     * Show the form for editing the specified Partie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partie = $this->partieRepository->findWithoutFail($id);

        if (empty($partie)) {
            Flash::error('Partie not found');

            return redirect(route('parties.index'));
        }

        return view('parties.edit')->with('partie', $partie);
    }

    /**
     * Update the specified Partie in storage.
     *
     * @param  int              $id
     * @param UpdatePartieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartieRequest $request)
    {
        $partie = $this->partieRepository->findWithoutFail($id);

        if (empty($partie)) {
            Flash::error('Partie not found');

            return redirect(route('parties.index'));
        }

        $partie = $this->partieRepository->update($request->all(), $id);

        Flash::success('Partie updated successfully.');

        return redirect(route('parties.index'));
    }

    /**
     * Remove the specified Partie from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partie = $this->partieRepository->findWithoutFail($id);

        if (empty($partie)) {
            Flash::error('Partie not found');

            return redirect(route('parties.index'));
        }

        $this->partieRepository->delete($id);

        Flash::success('Partie deleted successfully.');

        return redirect(route('parties.index'));
    }
}
