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
    <form action="{{ route('jobs.application.store', $job) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="expected_salary" class="block text-sm text-slate-500">Esxpected Salary</label>
            <x-text-input name="expected_salary" id="expected_salary" type="number" required></x-text-input>
            @error('expected_salary')
                <p class="text-red-500 text-xs mt-1">{{ $expected_salary }}</p>
            @enderror
        </div>
        {{-- <div class="mb-4">
            <label for="cv" class="block text-sm text-slate-500">CV</label>
            <input type="file" name="cv" id="cv" class="form-input mt-1 block w-full" required>
            @error('cv')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div> --}}
        <div class="mb-4">
            <x-button type="submit" class="w-full">Apply</x-button>
        </div>
    </form>
</x-card>
</x-layout>
