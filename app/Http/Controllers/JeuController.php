<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJeuRequest;
use App\Http\Requests\UpdateJeuRequest;
use App\Repositories\JeuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Image;

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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jeuRepository->pushCriteria(new RequestCriteria($request));
        $jeus = $this->jeuRepository->paginate(25);

        return view('jeus.index')
            ->with('jeus', $jeus);
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

        if($request->hasFile("photo")){
            $originalImage= $request->file('photo');
            $thumbnailImage = Image::make($originalImage);
            //$thumbnailPath = public_path().'/img/avatars/thumbnails/';
            $originalPath = public_path().'/img/';
            $fname = 'jeu_'.time();
            $thumbnailImage->save($originalPath.$fname);
            //$thumbnailImage->resize(150,150);
            //$thumbnailImage->save($thumbnailPath.$fname); 
            $input["photo"] = $fname;
        }

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
        $input = $request->all();

        if (empty($jeu)) {
            Flash::error('Jeu not found');

            return redirect(route('jeus.index'));
        }

        if($request->hasFile("photo")){
            
            $originalImage= $request->file('photo');
            $thumbnailImage = Image::make($originalImage);
            //$thumbnailPath = public_path().'/img/avatars/thumbnails/';
            $originalPath = public_path().'/img/';
            $fname = 'jeu_'.time().$originalImage->getClientOriginalName();
            $thumbnailImage->save($originalPath.$fname);
            //$thumbnailImage->resize(150,150);
            //$thumbnailImage->save($thumbnailPath.$fname); 
            $input["photo"] = $fname;
            @unlink(public_path()."/img/".$jeu->photo);
        }

        //dd($input);
        
        $jeu = $this->jeuRepository->update($input, $id);
        
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
