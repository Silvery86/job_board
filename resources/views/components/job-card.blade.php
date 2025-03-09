<x-card class="mb-4">
    <div class="flex justify-between mb-2">
        <h2 class="text-lg font-medium">{{ $job->title }}</h2>
        <div class="text-slate-500">$ {{ number_format($job->salary) }}</div>
    </div>
    <div class="mb-4 flex justify-between items-center text-slate-500 text-sm">
        <div class="flex space-x-4">
            <div>{{ $job->employer->company_name }}</div>
            <div>{{ $job->location }}</div>
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag>
                <a href="{{ route('jobs.index', array_merge(request()->query(), ['experience' => $job->experience])) }}">
                    {{ Str::ucfirst($job->experience) }}
                </a>
            </x-tag>
            <x-tag>
                <a href="{{ route('jobs.index', array_merge( request()->query(), ['category' => $job->category ])) }}">
                    {{ $job->category }}
                </a>

            </x-tag>
        </div>
    </div>
    {{ $slot }}
</x-card>
