<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\application;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Retrieve all job postings.
     */
    public function index()
    {
        $jobs = Job::all();

        return response()->json(['status' => 'success', 'jobs' => $jobs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'requirements' => 'required',
            'salary' => 'required',
            'location'
        ]);
        $job = new Job;

        $job->title = $request->title;
        $job->description = $request->description;
        $job->requirements = $request->requirements;
        $job->salary = $request->salary;
        $job->location = $request->location;

        $job->save();

        return response()->json(['status' => 'success', 'job' => $job]);
    }

    /**
     * Display the job posting.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);

        return response()->json(['status' => 'success', 'job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Job::findOrFail($id);

        $job->title = $request->title ?? $job->title;
        $job->description = $request->description ?? $job->description;
        $job->requirements = $request->requirements ?? $job->requirements;
        $job->salary = $request->salary ?? $job->salary;
        $job->location = $request->location ?? $job->location;

        $job->save();

        return response()->json(['status' => 'success', 'job' => $job]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);

        $job->delete();

        return response()->json(['status' => 'success']);
    }

    public function filter(Request $request)
    {
        $jobs = Job::query();

        // Filter by job category
        if ($request->has('category')) {
            $jobs->where('category', $request->category);
        }

        // Filter by salary range
        if ($request->has('salary_min')) {
            $jobs->where('salary', '>=', $request->salary_min);
        }

        if ($request->has('salary_max')) {
            $jobs->where('salary', '<=', $request->salary_max);
        }

        // Filter by job type
        if ($request->has('type')) {
            $jobs->where('type', $request->type);
        }

        $jobs = $jobs->get();

        return response()->json([
            'jobs' => $jobs
        ]);
    }
    /**
     * Search for job postings.
     */

   public function search(Request $request)
    {
            $query = Job::query();

            if ($request->has('title')) {
                $query->where('title', 'LIKE', '%'.$request->title.'%');
            }

            if ($request->has('description')) {
                $query->where('description', 'LIKE', '%'.$request->description.'%');
            }

            if ($request->has('requirements')) {
                $query->where('requirements', 'LIKE', '%'.$request->requirements.'%');
            }

            if ($request->has('salary')) {
                $query->where('salary', 'LIKE', '%'.$request->salary.'%');
            }

            if ($request->has('location')) {
                $query->where('location', 'LIKE', '%'.$request->location.'%');
            }

            $jobs = $query->get();

            return response()->json(['status' => 'success', 'jobs' => $jobs]);
    }
}
