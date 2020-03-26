<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;
use App\Models\Entreprise;
use App\Repositories\EntrepriseRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EntrepriseController extends AppBaseController
{
    /** @var  EntrepriseRepository */
    private $entrepriseRepository;

    public function __construct(EntrepriseRepository $entrepriseRepo)
    {
        $this->entrepriseRepository = $entrepriseRepo;
    }

    /**
     * Display a listing of the Entreprise.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $entreprises = $this->entrepriseRepository->all();

        return view('entreprises.index')
            ->with('entreprises', $entreprises);
    }

    /**
     * Show the form for creating a new Entreprise.
     *
     * @return Response
     */
    public function create()
    {
        return view('entreprises.create');
    }



    /**
     * Display the specified Entreprise.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error('Entreprise not found');

            return redirect(route('entreprises.index'));
        }

        return view('entreprises.show')->with('entreprise', $entreprise);
    }

    /**
     * Show the form for editing the specified Entreprise.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error('Entreprise not found');

            return redirect(route('entreprises.index'));
        }

        return view('entreprises.edit')->with('entreprise', $entreprise);
    }

    /**
     * Update the specified Entreprise in storage.
     *
     * @param int $id
     * @param UpdateEntrepriseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntrepriseRequest $request)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error('Entreprise not found');

            return redirect(route('entreprises.index'));
        }

        $entreprise = $this->entrepriseRepository->update($request->all(), $id);

        Flash::success('Entreprise updated successfully.');

        return redirect(route('entreprises.index'));
    }

    /**
     * Remove the specified Entreprise from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error('Entreprise not found');

            return redirect(route('entreprises.index'));
        }

        $this->entrepriseRepository->delete($id);

        Flash::success('Entreprise deleted successfully.');

        return redirect(route('entreprises.index'));
    }







    /**
     * Store a newly created Entreprise in storage.
     *
     * @param CreateEntrepriseRequest $request
     *
     * @return Response
     */
    public function store(CreateEntrepriseRequest $request)
    {
        $input = $request->all();
        $entreprise = new Entreprise($input);
        $user = User::find(Auth::id());
        $entreprise->user_id = Auth::id();
        $entreprise->save();
        // $entreprise = $this->entrepriseRepository->create($entreprise);

        Flash::success('Entreprise saved successfully.');

        return view('compte.index', ['user'=>$user]);
    }


    public function information(){
        $user = User::find(Auth::id());
        return view('compte.index', ['user'=>$user]);
    }

}
