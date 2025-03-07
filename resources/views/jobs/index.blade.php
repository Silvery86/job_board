<x-layout>
    <section class="flex flex-col items-start justify-center space-y-2">
        <h1 class="text-3xl font-bold my-8">Jobs</h1>
        @foreach ($jobs as $job)
        <div class="bg-white p-4 my-4 border border-gray-200 rounded-sm shadow-md w-1/2">
            <h1>
                {{ $job->title }}
            </h1>

        </div>

        @endforeach
    </section>

</x-layout>
