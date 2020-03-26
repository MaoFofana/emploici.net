<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostulerRequest;
use App\Http\Requests\UpdatePostulerRequest;
use App\Models\Job;
use App\Models\Postuler;
use App\Repositories\PostulerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PostulerController extends AppBaseController
{
    /** @var  PostulerRepository */
    private $postulerRepository;

    public function __construct(PostulerRepository $postulerRepo)
    {
        $this->postulerRepository = $postulerRepo;
    }

    /**
     * Display a listing of the Postuler.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $postulers = $this->postulerRepository->all();

        return view('postulers.index')
            ->with('postulers', $postulers);
    }

    /**
     * Show the form for creating a new Postuler.
     *
     * @return Response
     */
    public function create()
    {
        return view('postulers.create');
    }

    /**
     * Store a newly created Postuler in storage.
     *
     * @param CreatePostulerRequest $request
     *
     * @return Response
     */
    public function store(CreatePostulerRequest $request)
    {
        $input = $request->all();

        $postuler = new Postuler($input);
        $postuler->job_id = $request->input('job_id');

        // cache the file
        $cv = $request->file('cv');

        // generate a new filename. getClientOriginalExtension() for the file extension
        $cvname = 'cv-' . time() . '.' . $cv->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        $path = $cv->storeAs('public', $cvname);

        $postuler->cv = $cvname;

        // cache the file
        $lettre= $request->file('lettre');

        // generate a new filename. getClientOriginalExtension() for the file extension
        $lettrename = 'lettre-' . time() . '.' . $lettre->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        $path = $lettre->storeAs('public', $lettrename);

       

        $postuler->lettre= $lettrename;
        $postuler->save();
        $jobs = Job::paginate(15);
        return view('liste', ['jobs'=>$jobs, 'message'=>'Message envoyez']);
    }


    /**
     * Display the specified Postuler.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postuler = $this->postulerRepository->find($id);

        if (empty($postuler)) {
            Flash::error('Postuler not found');

            return redirect(route('postulers.index'));
        }

        return view('postulers.show')->with('postuler', $postuler);
    }

    /**
     * Show the form for editing the specified Postuler.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postuler = $this->postulerRepository->find($id);

        if (empty($postuler)) {
            Flash::error('Postuler not found');

            return redirect(route('postulers.index'));
        }

        return view('postulers.edit')->with('postuler', $postuler);
    }

    /**
     * Update the specified Postuler in storage.
     *
     * @param int $id
     * @param UpdatePostulerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostulerRequest $request)
    {
        $postuler = $this->postulerRepository->find($id);

        if (empty($postuler)) {
            Flash::error('Postuler not found');

            return redirect(route('postulers.index'));
        }

        $postuler = $this->postulerRepository->update($request->all(), $id);

        Flash::success('Postuler updated successfully.');

        return redirect(route('postulers.index'));
    }

    /**
     * Remove the specified Postuler from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postuler = $this->postulerRepository->find($id);

        if (empty($postuler)) {
            Flash::error('Postuler not found');

            return redirect(route('postulers.index'));
        }

        $this->postulerRepository->delete($id);

        Flash::success('Postuler deleted successfully.');

        return redirect(route('postulers.index'));
    }
}
