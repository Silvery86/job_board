<x-layout>
    <x-bread-crumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
        $job->title => null
    ]"></x-bread-crumbs>
    <x-job-card :$job>
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>
        @can('apply', $job)
        <x-link-button :href="route('jobs.application.create', $job)">Apply</x-link-button>
        @else
        <div class="text-center my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-400"> You already apply to this job</div>
        @endcan


    </x-job-card>
    <x-card>
        <h2>More other Jobs for {{ $job->employer->company_name }}</h2>
        <div class="flex flex-col w-full ">
            @foreach ($job->employer->jobs->except($job->id) as $otherJob)
                <x-job-card :job='$otherJob'>
                    <div class="text-sm text-slate-500 mb-4">
                        {{ $otherJob->created_at->diffForHumans() }}
                    </div>
                    <div class="w-full flex">
                        <x-link-button :href="route('jobs.show', $otherJob)" class="mr-2 w-full text-center">
                            Show
                        </x-link-button>
                    </div>
                </x-job-card>
            @endforeach
        </div>
    </x-card>
</x-layout>
