<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNewLetterAPIRequest;
use App\Http\Requests\API\UpdateNewLetterAPIRequest;
use App\Models\NewLetter;
use App\Repositories\NewLetterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NewLetterController
 * @package App\Http\Controllers\API
 */

class NewLetterAPIController extends AppBaseController
{
    /** @var  NewLetterRepository */
    private $newLetterRepository;

    public function __construct(NewLetterRepository $newLetterRepo)
    {
        $this->newLetterRepository = $newLetterRepo;
    }

    /**
     * Display a listing of the NewLetter.
     * GET|HEAD /newLetters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $newLetters = $this->newLetterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($newLetters->toArray(), 'New Letters retrieved successfully');
    }

    /**
     * Store a newly created NewLetter in storage.
     * POST /newLetters
     *
     * @param CreateNewLetterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNewLetterAPIRequest $request)
    {
        $input = $request->all();

        $newLetter = $this->newLetterRepository->create($input);

        return $this->sendResponse($newLetter->toArray(), 'New Letter saved successfully');
    }

    /**
     * Display the specified NewLetter.
     * GET|HEAD /newLetters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var NewLetter $newLetter */
        $newLetter = $this->newLetterRepository->find($id);

        if (empty($newLetter)) {
            return $this->sendError('New Letter not found');
        }

        return $this->sendResponse($newLetter->toArray(), 'New Letter retrieved successfully');
    }

    /**
     * Update the specified NewLetter in storage.
     * PUT/PATCH /newLetters/{id}
     *
     * @param int $id
     * @param UpdateNewLetterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewLetterAPIRequest $request)
    {
        $input = $request->all();

        /** @var NewLetter $newLetter */
        $newLetter = $this->newLetterRepository->find($id);

        if (empty($newLetter)) {
            return $this->sendError('New Letter not found');
        }

        $newLetter = $this->newLetterRepository->update($input, $id);

        return $this->sendResponse($newLetter->toArray(), 'NewLetter updated successfully');
    }

    /**
     * Remove the specified NewLetter from storage.
     * DELETE /newLetters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var NewLetter $newLetter */
        $newLetter = $this->newLetterRepository->find($id);

        if (empty($newLetter)) {
            return $this->sendError('New Letter not found');
        }

        $newLetter->delete();

        return $this->sendSuccess('New Letter deleted successfully');
    }
}
