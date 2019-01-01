<?php

namespace App\Http\Controllers;

use App\DataTables\JeuDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJeuRequest;
use App\Http\Requests\UpdateJeuRequest;
use App\Repositories\JeuRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JeuController extends AppBaseController
{
    /** @var  JeuRepository */
    private $jeuRepository;

    public function __construct(JeuRepository $jeuRepo)
    {
        $this->jeuRepository = $jeuRepo;
    }

    /**
     * Display a listing of the Jeu.
     *
     * @param JeuDataTable $jeuDataTable
     * @return Response
     */
    public function index(JeuDataTable $jeuDataTable)
    {
        return $jeuDataTable->render('jeus.index');
    }

    /**
     * Show the form for creating a new Jeu.
     *
     * @return Response
     */
    public function create()
    {
        return view('jeus.create');
    }

    /**
     * Store a newly created Jeu in storage.
     *
     * @param CreateJeuRequest $request
     *
     * @return Response
     */
    public function store(CreateJeuRequest $request)
    {
        $input = $request->all();

        $jeu = $this->jeuRepository->create($input);

        Flash::success('Jeu saved successfully.');

        return redirect(route('jeus.index'));
    }

    /**
     * Display the specified Jeu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jeu = $this->jeuRepository->findWithoutFail($id);

        if (empty($jeu)) {
            Flash::error('Jeu not found');

            return redirect(route('jeus.index'));
        }

        return view('jeus.show')->with('jeu', $jeu);
    }

    /**
     * Show the form for editing the specified Jeu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jeu = $this->jeuRepository->findWithoutFail($id);

        if (empty($jeu)) {
            Flash::error('Jeu not found');

            return redirect(route('jeus.index'));
        }

        return view('jeus.edit')->with('jeu', $jeu);
    }

    /**
     * Update the specified Jeu in storage.
     *
     * @param  int              $id
     * @param UpdateJeuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJeuRequest $request)
    {
        $jeu = $this->jeuRepository->findWithoutFail($id);

        if (empty($jeu)) {
            Flash::error('Jeu not found');

            return redirect(route('jeus.index'));
        }

        $jeu = $this->jeuRepository->update($request->all(), $id);

        Flash::success('Jeu updated successfully.');

        return redirect(route('jeus.index'));
    }

    /**
     * Remove the specified Jeu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jeu = $this->jeuRepository->findWithoutFail($id);

        if (empty($jeu)) {
            Flash::error('Jeu not found');

            return redirect(route('jeus.index'));
        }

        $this->jeuRepository->delete($id);

        Flash::success('Jeu deleted successfully.');

        return redirect(route('jeus.index'));
    }
}
