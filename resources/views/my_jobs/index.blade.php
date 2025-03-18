<x-layout>
    <x-bread-crumbs :links="[
        'My Jobs' => '#',
    ]" class="mb-4" />

        <div class="mb-8 text-right">
            <x-link-button href="{{ route('my-jobs.create') }}" class="bg-slate-100">Create New Job</x-link-button>
        </div>
        <x-card>
        @forelse($jobs as $job)
            <x-job-card :$job>
                <div class="text-xs text-slate-500">
                    @forelse($job->jobApplications as $application)
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <div>{{ $application->user->name }}</div>
                                <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                                <div>Dowload CV</div>
                            </div>
                            <div>$ {{ number_format($application->expected_salary) }}</div>
                        </div>
                    @empty
                    <div class="mb-4">No application yet</div>
                    @endforelse
                    <div class="flex space-x-2">
                        <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>
                        <form action="{{ route('my-jobs.destroy',$job) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button>Delete</x-button>
                        </form>
                    </div>
                </div>
            </x-job-card>
        @empty
            <div class="round-md border border-dashed border-slate-300 p-8">
                <div class="text-center font-medium">
                    No job yet
                </div>
                <div class="text-center">
                    Post your first job <a class="text-indigo-500" href='{{ route('my-jobs.create') }}'> here</a>
                </div>
            </div>
        @endforelse
    </x-card>
</x-layout>
