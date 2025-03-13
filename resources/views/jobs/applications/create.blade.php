<x-layout>
    <x-bread-crumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
        $job->title => route('jobs.show', $job),
        'Apply' => null
    ]"></x-bread-crumbs>
    <x-job-card :$job>
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>
<x-card>
    <h2>Your Job Application</h2>
    <form action="{{ route('jobs.application.store', $job) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <x-label for="expected_salary" :required="true">Esxpected Salary</x-label>
            <x-text-input name="expected_salary" id="expected_salary" type="number" required></x-text-input>
        </div>
        <div class="mb-4">
            <x-label for="cv" :required="true">CV</x-label>
            <x-text-input type="file" name="cv" id="cv" class="form-input mt-1 block w-full" required></x-text-input>
        </div>
        <div class="mb-4">
            <x-button type="submit" class="w-full">Apply</x-button>
        </div>
    </form>
</x-card>
</x-layout>
