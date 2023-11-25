<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use Illuminate\Routing\Controller as BaseController;

class JobController extends BaseController
{
    public function post(JobPostRequest $request)
    {
        return "hello";
    }

    public function get(int $jobId)
    {

    }

    public function delete(int $jobId)
    {

    }
}
