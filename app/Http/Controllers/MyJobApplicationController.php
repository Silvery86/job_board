<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MyJobApplicationController extends Controller
{

    public function index()
    {
        return view("my_job_applications.index", [
            'applications' => Auth::user()->jobApplications()->with([
                'job' => fn($query) => $query->withCount('jobApplications')
                ->withAvg('jobApplications', 'expected_salary'),
                'job.employer'
                ])->latest()->get(),
        ]);
    }

    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();
        return redirect()->back()->with('success','Successfully cancel application!');
    }
}
