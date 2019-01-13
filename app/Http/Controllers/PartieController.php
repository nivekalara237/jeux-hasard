<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartieRequest;
use App\Http\Requests\UpdatePartieRequest;
use App\Repositories\PartieRepository;
use App\Repositories\RoleRepository;
use App\Repositories\JeuRepository;
use App\Repositories\ParticipationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PartieController extends AppBaseController
{
    /** @var  PartieRepository */
    private $partieRepository;
    private $roleRepository;
    private $jeuRepository;
    private $participationRepository;

    public function __construct(PartieRepository $partieRepo,RoleRepository $roleRepo,JeuRepository $jeuRepo,ParticipationRepository $participationRepo)
    {
        $this->partieRepository = $partieRepo;
        $this->roleRepository = $roleRepo;
        $this->jeuRepository = $jeuRepo;
        $this->participationRepository = $participationRepo;
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
        $joueurs = Role::findByName("joueur")->users;
        $jeux = $this->jeuRepository->all();
        $jeux_json = $jeux->toJson();
        $joueurs_json = $joueurs->toJson();
        //dd($joueurs_json);
        return view('parties.create',["joueur"=>$joueurs,"jeux"=>$jeux,"jeux_json"=>$jeux_json,"joueurs_json"=>$joueurs_json]);
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

        $libelle = $input["libelle"];
        $desc = $input["description"];
        $jeu_id = $input["jeu_id"];

        $participants = [];

        unset($input["libelle"]);
        unset($input["description"]);
        unset($input["jeu_id"]);
        unset($input["_token"]);
        $p = array();
        foreach ($input as $key => $value) {
            $p[]=$value;
        }
        //dd(auth()->user());
        $j = 0;
        for ($i=0;$i<count($p)/4;$i++) {
            if($i!=0){
                $j = ($i*4);// - 1;
                $participants[]=["joueur_id"=>$p[$j], "nom_joueur"=>$p[$j+1], "mise"=>$p[$j+2], "_"=>$p[$j+3]];
            }else{
                $participants[]=["joueur_id"=>$p[$i],"nom_joueur"=>$p[$i+1],"mise"=>$p[$i+2],"_"=>$p[$i+3]];
            }
        }

        try{
            DB::beginTransaction();

            $partie = ["libelle"=>$libelle,"description"=>$desc, "jeu_id"=>$jeu_id,"superviseur_id"=>auth()->user()->id];
            $partie = $this->partieRepository->updateOrCreate($partie);
            if($partie){
                foreach ($participants as $key => $value) {
                    $partication = ["joueur_id"=>$value["joueur_id"],"partie_id"=>$partie->id,"mise"=>$value["mise"]];
                    $participation = $this->participationRepository->updateOrCreate($partication);
                }
            }else{
                Flash::error('Partie non-created');
            }
            DB::commit();
        }catch(Exception $e){
            dd($e->getMessage());
            DB::rollBack();
        }
        
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


    public function demarrer($id)
    {
        $partie = $this->partieRepository->findWithoutFail($id);
        try{
            $partie = $this->partieRepository->update(["status"=>true],$id);
            if($partie)
                Flash::success('Partie started successfully.');
            else
                Flash::success('Partie could not started.');
        }catch(Exception $e){
            echo $e->getMessage();
            Flash::success('Partie could not started.');
        }
        return redirect(route('parties.index'));
    }

    
    public function arreter($id)
    {
        $partie = $this->partieRepository->findWithoutFail($id);
        try{
            $partie = $this->partieRepository->update(["status"=>false],$id);
            if($partie)
                Flash::success('Partie stopped successfully.');
            else
                Flash::success('Partie could not stopped.');
        }catch(Exception $e){
            echo $e->getMessage();
            Flash::success('Partie could not started.');
        }
        return redirect(route('parties.index'));
    }

    
}
