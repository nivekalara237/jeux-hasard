<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompteMonetaireRepository;
use App\Repositories\UserRepository;
use App\Repositories\OperationRepository;
use App\Repositories\PartieRepository;
use App\Repositories\ParticipationRepository;
use App\Http\Controllers\AppBaseController;
use Flash;
use Spatie\Permission\Models\Role;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Image;

class JoueurController extends AppBaseController
{

    /** @var  CompteMonetaireRepository */
    private $compteMonetaireRepository;
    private $userRepository;
    private $operationRepository;
    private $partieRepository;
    private $participationRepository;

    public function __construct(
        CompteMonetaireRepository $compteMonetaireRepo,
        UserRepository $userRepo,
        OperationRepository $operationRepo,
        PartieRepository $partieRepo,
        ParticipationRepository $participationRepo
        )
    {
        $this->compteMonetaireRepository = $compteMonetaireRepo;
        $this->userRepository = $userRepo;
        $this->operationRepository = $operationRepo;
        $this->participationRepository = $participationRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function panel(Request $request)
    {
        $this->compteMonetaireRepository->pushCriteria(new RequestCriteria($request));
        //$this->userRepository->pushCriteria(new RequestCriteria($request));
        $this->operationRepository->pushCriteria(new RequestCriteria($request));
        //$this->partieRepository->pushCriteria(new RequestCriteria($request));

        $compteMonetaires = $this->compteMonetaireRepository->paginate(100);
        $operations = \App\Models\Operation::where(["compte_monetaire_id"=>auth()->user()->firstCM()->id])->paginate(5);
        //$parties = $this->partieRepository->paginate(5);
        $participations = \App\Models\Participation::where(["joueur_id"=>auth()->user()->id])->paginate(5);
        //$compteMonetaires = $this->compteMonetaireRepository->paginate(25);
        return view("joueurs.panel",compact("compteMonetaires","operations","participations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateProfile(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'avatar' => 'image|required|mimes:jpeg,png,jpg,bmp'
         ]);
        if(!empty($input["password"]) && $input["password"]!==""){
            $input["password"] = bcrypt($input["password"]);
        }else{
            unset($input["password"]);
        }
            
        //$role_ids = $input["roles"];
        //dd($input["password"]);


        if($request->hasFile("avatar")){
            $originalImage= $request->file('avatar');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/img/avatars/thumbnails/';
            $originalPath = public_path().'/img/avatars/';
            $fname = time().$originalImage->getClientOriginalName();
            $thumbnailImage->save($originalPath.$fname);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$fname); 
            $input["avatar"] = $fname;
        }
        

        $user = $this->userRepository->update($input,auth()->user()->id);
        //$user->syncRoles($role_ids);
        Flash::success('User profile update successfully.');
        return redirect(route('joueur.panel'));
    }

}
