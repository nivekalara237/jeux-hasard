<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompteMonetaireRequest;
use App\Http\Requests\UpdateCompteMonetaireRequest;
use App\Repositories\CompteMonetaireRepository;
use App\Repositories\OperationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Spatie\Permission\Models\Role;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompteMonetaireController extends AppBaseController
{
    /** @var  CompteMonetaireRepository */
    private $compteMonetaireRepository;
    private $optRepository;

    public function __construct(CompteMonetaireRepository $compteMonetaireRepo,OperationRepository $optRepo)
    {
        $this->compteMonetaireRepository = $compteMonetaireRepo;
        $this->optRepository = $optRepo;
    }

    /**
     * Display a listing of the CompteMonetaire.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->compteMonetaireRepository->pushCriteria(new RequestCriteria($request));
        $compteMonetaires = $this->compteMonetaireRepository->paginate(25);

        return view('compte_monetaires.index')
            ->with('compteMonetaires', $compteMonetaires);
    }

    /**
     * Show the form for creating a new CompteMonetaire.
     *
     * @return Response
     */
    public function create()
    {
        $joueurs = Role::findByName("joueur")->users;
        return view('compte_monetaires.create',["joueurs"=>$joueurs]);
    }

    /**
     * Store a newly created CompteMonetaire in storage.
     *
     * @param CreateCompteMonetaireRequest $request
     *
     * @return Response
     */
    public function store(CreateCompteMonetaireRequest $request)
    {
        $input = $request->all();

        $compteMonetaire = $this->compteMonetaireRepository->create($input);

        Flash::success('Compte Monetaire saved successfully.');

        return redirect(route('compteMonetaires.index'));
    }

    public function operation(Request $request,$id)
    {
        $res = false;
        if($request->type=="credit")
            $res = $this->crediterCompte($request,$id);
        else{
            $res = $this->debiterCompte($request,$id);
        }


        if($res == 0){
            Flash::error('Compte Monetaire not found');
        }elseif($res == 2)
            Flash::error('le montant à debiter est superieur au solde courant.');
        else{
            Flash::success('Operation effectuée avec succès.');
        }
        return redirect(route('joueur.panel'));
    }

    public function crediterCompte($request,$id)
    {
        $opt = $request->all();
        $compteMonetaire = $this->compteMonetaireRepository->findWithoutFail($id);
        if (empty($compteMonetaire)) {
            //Flash::error('Compte Monetaire not found');
            return 0;
        }
        $opt["compte_monetaire_id"]=$compteMonetaire->id;
        $new_solde = $opt['montant']+$compteMonetaire->solde;
        $operation = $this->optRepository->create($opt);

        $compteMonetaire = $this->compteMonetaireRepository->update(["solde"=>$new_solde], $id);
        //Flash::success('Compte Monetaire credited successfully.');
        return 1;
    }

    public function debiterCompte($request,$id)
    {
        $opt = $request->all();
        $amount = $opt['montant'];
        $compteMonetaire = $this->compteMonetaireRepository->findWithoutFail($id);
        if (empty($compteMonetaire)) {
            //Flash::error('Compte Monetaire not found');
            return 0;
        }

        if($amount > $compteMonetaire->solde){
            //Flash::error('Votre montant a debité est superieur au solde courant.');
            return 2;
        }

        $opt["compte_monetaire_id"]=$compteMonetaire->id;
        $new_solde = $compteMonetaire->solde - $opt['montant'];
        $operation = $this->optRepository->create($opt);

        $compteMonetaire = $this->compteMonetaireRepository->update(["solde"=>$new_solde], $id);
        //Flash::success('Compte Monetaire credited successfully.');
        return 1;
    }

    /**
     * Display the specified CompteMonetaire.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compteMonetaire = $this->compteMonetaireRepository->findWithoutFail($id);

        if (empty($compteMonetaire)) {
            Flash::error('Compte Monetaire not found');

            return redirect(route('compteMonetaires.index'));
        }

        return view('compte_monetaires.show')->with('compteMonetaire', $compteMonetaire);
    }

    /**
     * Show the form for editing the specified CompteMonetaire.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compteMonetaire = $this->compteMonetaireRepository->findWithoutFail($id);

        if (empty($compteMonetaire)) {
            Flash::error('Compte Monetaire not found');

            return redirect(route('compteMonetaires.index'));
        }

        return view('compte_monetaires.edit')->with('compteMonetaire', $compteMonetaire);
    }

    /**
     * Update the specified CompteMonetaire in storage.
     *
     * @param  int              $id
     * @param UpdateCompteMonetaireRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompteMonetaireRequest $request)
    {
        $compteMonetaire = $this->compteMonetaireRepository->findWithoutFail($id);

        if (empty($compteMonetaire)) {
            Flash::error('Compte Monetaire not found');

            return redirect(route('compteMonetaires.index'));
        }

        $compteMonetaire = $this->compteMonetaireRepository->update($request->all(), $id);

        Flash::success('Compte Monetaire updated successfully.');

        return redirect(route('compteMonetaires.index'));
    }

    /**
     * Remove the specified CompteMonetaire from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compteMonetaire = $this->compteMonetaireRepository->findWithoutFail($id);

        if (empty($compteMonetaire)) {
            Flash::error('Compte Monetaire not found');

            return redirect(route('compteMonetaires.index'));
        }

        $this->compteMonetaireRepository->delete($id);

        Flash::success('Compte Monetaire deleted successfully.');

        return redirect(route('compteMonetaires.index'));
    }
}
