<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePostulerAPIRequest;
use App\Http\Requests\API\UpdatePostulerAPIRequest;
use App\Models\Postuler;
use App\Repositories\PostulerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PostulerController
 * @package App\Http\Controllers\API
 */

class PostulerAPIController extends AppBaseController
{
    /** @var  PostulerRepository */
    private $postulerRepository;

    public function __construct(PostulerRepository $postulerRepo)
    {
        $this->postulerRepository = $postulerRepo;
    }

    /**
     * Display a listing of the Postuler.
     * GET|HEAD /postulers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $postulers = $this->postulerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($postulers->toArray(), 'Postulers retrieved successfully');
    }

    /**
     * Store a newly created Postuler in storage.
     * POST /postulers
     *
     * @param CreatePostulerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePostulerAPIRequest $request)
    {
        $input = $request->all();

        $postuler = $this->postulerRepository->create($input);

        return $this->sendResponse($postuler->toArray(), 'Postuler saved successfully');
    }

    /**
     * Display the specified Postuler.
     * GET|HEAD /postulers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Postuler $postuler */
        $postuler = $this->postulerRepository->find($id);

        if (empty($postuler)) {
            return $this->sendError('Postuler not found');
        }

        return $this->sendResponse($postuler->toArray(), 'Postuler retrieved successfully');
    }

    /**
     * Update the specified Postuler in storage.
     * PUT/PATCH /postulers/{id}
     *
     * @param int $id
     * @param UpdatePostulerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostulerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Postuler $postuler */
        $postuler = $this->postulerRepository->find($id);

        if (empty($postuler)) {
            return $this->sendError('Postuler not found');
        }

        $postuler = $this->postulerRepository->update($input, $id);

        return $this->sendResponse($postuler->toArray(), 'Postuler updated successfully');
    }

    /**
     * Remove the specified Postuler from storage.
     * DELETE /postulers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Postuler $postuler */
        $postuler = $this->postulerRepository->find($id);

        if (empty($postuler)) {
            return $this->sendError('Postuler not found');
        }

        $postuler->delete();

        return $this->sendSuccess('Postuler deleted successfully');
    }
}
