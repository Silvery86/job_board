<x-layout>
    <x-bread-crumbs class="mb-4" :links="[
        'My Applications' => null,
    ]"></x-bread-crumbs>
    @forelse ($applications as $application )
    <x-job-card :job="$application->job">
        <div class="flex items-center justify-between text-xs text-slate-500">
            <div>
                <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                <div>Other {{ Str::plural('applicant', $application->job->job_applications_count - 1) }} {{ $application->job->job_applications_count - 1 }}</div>
                <div>Your asking salary ${{ number_format($application->expected_salary) }}</div>
                <div>Average asking salary ${{ number_format($application->job->job_applications_avg_expected_salary ) }}</div>
            </div>
            <div>
                <form action="{{ route('my-job-applications.destroy', $application ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button>Cancel</x-button>
                </form>
            </div>
        </div>
    </x-job-card>

    @empty
        <x-card>
            <div>You dont have any application</div>
            <div class="text-center text-xl text-slate-500 ">
                <x-link-button :href="route('jobs.index')">
                    Find some jobs
                </x-link-button>

            </div>
        </x-card>
    @endforelse
</x-layout>
