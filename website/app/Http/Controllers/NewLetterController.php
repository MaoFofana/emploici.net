<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewLetterRequest;
use App\Http\Requests\UpdateNewLetterRequest;
use App\Repositories\NewLetterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NewLetterController extends AppBaseController
{
    /** @var  NewLetterRepository */
    private $newLetterRepository;

    public function __construct(NewLetterRepository $newLetterRepo)
    {
        $this->newLetterRepository = $newLetterRepo;
    }

    /**
     * Display a listing of the NewLetter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $newLetters = $this->newLetterRepository->all();

        return view('new_letters.index')
            ->with('newLetters', $newLetters);
    }

    /**
     * Show the form for creating a new NewLetter.
     *
     * @return Response
     */
    public function create()
    {
        return view('new_letters.create');
    }

    /**
     * Store a newly created NewLetter in storage.
     *
     * @param CreateNewLetterRequest $request
     *
     * @return Response
     */
    public function store(CreateNewLetterRequest $request)
    {
        $input = $request->all();

        $newLetter = $this->newLetterRepository->create($input);

        Flash::success('New Letter saved successfully.');

        return redirect('/');
    }

    /**
     * Display the specified NewLetter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newLetter = $this->newLetterRepository->find($id);

        if (empty($newLetter)) {
            Flash::error('New Letter not found');

            return redirect(route('newLetters.index'));
        }

        return view('new_letters.show')->with('newLetter', $newLetter);
    }

    /**
     * Show the form for editing the specified NewLetter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newLetter = $this->newLetterRepository->find($id);

        if (empty($newLetter)) {
            Flash::error('New Letter not found');

            return redirect(route('newLetters.index'));
        }

        return view('new_letters.edit')->with('newLetter', $newLetter);
    }

    /**
     * Update the specified NewLetter in storage.
     *
     * @param int $id
     * @param UpdateNewLetterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewLetterRequest $request)
    {
        $newLetter = $this->newLetterRepository->find($id);

        if (empty($newLetter)) {
            Flash::error('New Letter not found');

            return redirect(route('newLetters.index'));
        }

        $newLetter = $this->newLetterRepository->update($request->all(), $id);

        Flash::success('New Letter updated successfully.');

        return redirect(route('newLetters.index'));
    }

    /**
     * Remove the specified NewLetter from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newLetter = $this->newLetterRepository->find($id);

        if (empty($newLetter)) {
            Flash::error('New Letter not found');

            return redirect(route('newLetters.index'));
        }

        $this->newLetterRepository->delete($id);

        Flash::success('New Letter deleted successfully.');

        return redirect(route('newLetters.index'));
    }
}
