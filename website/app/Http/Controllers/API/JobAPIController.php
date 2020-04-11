<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJobAPIRequest;
use App\Http\Requests\API\UpdateJobAPIRequest;
use App\Http\Resources\User;
use App\Models\Job;
use App\Repositories\JobRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Http\Resources\Job as JobRessources;
/**
 * Class JobController
 * @package App\Http\Controllers\API
 */

class JobAPIController extends AppBaseController
{
    /** @var  JobRepository */
    private $jobRepository;

    public function __construct(JobRepository $jobRepo)
    {
        $this->jobRepository = $jobRepo;
    }

    /**
     * Display a listing of the Job.
     * GET|HEAD /jobs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $jobs = $this->jobRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return JobRessources::collection(Job::all()->where('datelimite', ">=",date("Y-m-d H:i:s")));
       // return $this->sendResponse($jobs->toArray(), 'Jobs retrieved successfully');
    }

    /**
     * Store a newly created Job in storage.
     * POST /jobs
     *
     * @param CreateJobAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJobAPIRequest $request)
    {
        $input = $request->all();

        $job = $this->jobRepository->create($input);

        return $this->sendResponse($job->toArray(), 'Job saved successfully');
    }

    /**
     * Display the specified Job.
     * GET|HEAD /jobs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return new JobRessources(Job::find($id));
    }


    public function search(Request $request) {
        $mot = $request->input('mot');
        $typeoffre = $request->input('typeoffre');
        $secteur = $request->input('secteur');
        $niveau = $request->input('niveau');


        return JobRessources::collection(Job::where([
            ['niveauetude','like',"%{$niveau}%"],['typeoffre','like',"%{$typeoffre}%"],
            ['secteuractivite','like',"%{$secteur}%"], ['titre','like',"%{$mot}%"]]));

    }

    /**
     * Update the specified Job in storage.
     * PUT/PATCH /jobs/{id}
     *
     * @param int $id
     * @param UpdateJobAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJobAPIRequest $request)
    {
        $input = $request->all();

        /** @var Job $job */
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            return $this->sendError('Job not found');
        }

        $job = $this->jobRepository->update($input, $id);

        return $this->sendResponse($job->toArray(), 'Job updated successfully');
    }

    /**
     * Remove the specified Job from storage.
     * DELETE /jobs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Job $job */
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            return $this->sendError('Job not found');
        }

        $job->delete();

        return $this->sendSuccess('Job deleted successfully');
    }
}
