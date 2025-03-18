<x-card class="mb-4 relative">
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
    @if($job->deleted_at)
            <div class="absolute top-0 bottom-0 right-0 bg-gray-500/35 w-full">
                <div class="w-full h-full text-5xl text-red-500 font-bold text-center flex justify-center items-center rotate-12">
                    Deleted
                </div>
            </div>
    @endif
</x-card>
