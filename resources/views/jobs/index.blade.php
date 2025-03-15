<x-layout>
    <x-bread-crumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
    ]"></x-bread-crumbs>

    <x-card class="mb-4 text-sm" x-data="">
        <form x-ref="filters" id="filter_form" action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" placeholder="Search" value="{{ request('search') }}" formRef="filters"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-4">
                        <x-text-input name="min_salary" placeholder="Min" value="{{ request('min_salary') }}" formRef="filters"/>
                        <x-text-input name="max_salary" placeholder="Max" value="{{ request('max_salary') }}" formRef="filters"/>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="array_combine(array_map('ucfirst', \App\Models\Job::$experience),\App\Models\Job::$experience)" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="array_combine(array_map('ucfirst', \App\Models\Job::$category),\App\Models\Job::$category)" />
                </div>
            </div>
            <x-button class="w-full">Filter</x-button>
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
    <div class="mt-4">
        {{ $jobs->appends(request()->query())->links() }}
    </div>
</x-layout>
