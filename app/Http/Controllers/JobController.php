<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Services\Job\JobModifierService;
use App\Services\Job\JobProviderService;
use Illuminate\Routing\Controller as BaseController;
use Predis\Response\ServerException;
use Symfony\Component\HttpFoundation\Response;

class JobController extends BaseController
{
    public function __construct(
        readonly private JobModifierService $modifier,
        readonly  private JobProviderService $provider,
    ) {
    }

    public function post(JobPostRequest $request): Response
    {
        try {
            return response()->json(['jobId' => $this->modifier->create($request->all())], Response::HTTP_OK);
        }
        catch(ServerException $exception) {
            return response()->json($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function get(string $jobId)
    {
         return response()->json($this->provider->getJobByIdAsJson($jobId));
    }

    public function delete(int $jobId)
    {

    }
}
