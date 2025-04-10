<x-layout>
    <h1 class="my-16 text-center text-4xl text-slate-600 font-medium"> Sign in</h1>
    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="email" :required="true">Email</x-label>
                <x-text-input name="email" type="email" placeholder="Email" required autofocus/>
            </div>
            <div class="mb-4">
                <x-label for="password" :required="true">Password</x-label>
                <x-text-input name="password" type="password" placeholder="Password" required/>
            </div>
            <div class="mb-4 flex justify-between items-center">
                <x-label for="remember" class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2 border rounded-md text-indigo-500" />
                    <span>Remember me</span>
                </x-label>
                <div>
                    <a href="#" class="text-sm text-indigo-500">Forgot your password?</a>
                </div>
            </div>
            <x-button class="w-full bg-green-50">Sign in</x-button>
        </form>
    </x-card>
</x-layout>
