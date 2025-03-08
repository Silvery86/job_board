<x-layout>
    <x-bread-crumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
    ]"></x-bread-crumbs>

    <x-card class="mb-4 text-sm">
        <form id="filter_form" action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" placeholder="Search" value="{{ request('search') }}" formId="filter_form"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-4">
                        <x-text-input name="min_salary" placeholder="Min" value="{{ request('min_salary') }}" formId="filter_form"/>
                        <x-text-input name="max_salary" placeholder="Max" value="{{ request('max_salary') }}" formId="filter_form"/>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="\App\Models\Job::$experience" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\Job::$category" />
                </div>
            </div>
            <button class="w-full border rounded-md">Filter</button>
        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)" class="mr-2">
                    View
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
    @if($jobs->isEmpty())
    <x-card>
        <div class="text-center text-slate-500 font-semibold">
            No jobs found.
        </div>
    </x-card>
    @endempty
    {{ $jobs->links() }}
</x-layout>
