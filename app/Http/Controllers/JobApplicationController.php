<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{
    use Authorizable;
    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        Gate::authorize("apply", $job);
        return view("jobs.applications.create", ["job" => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Request $request)
    {
        Gate::authorize("apply", $job);

        $validatedData = $request->validate([
            'expected_salary' => 'required', 'numeric', 'min:4000', 'max:100000',
            'cv' => 'required|file|mimes:pdf|max:2048'
        ]);

        $file = $request->file('cv');
        $path = $file->store('cv','private');

        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path
        ]);

        return redirect()->route('jobs.show',$job)->with('success','Job application submitted.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $jobApplication)
    {
        return null;
    }
}
