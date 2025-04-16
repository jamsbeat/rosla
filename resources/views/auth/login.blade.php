<x-layout>
    <div class="absolute bg-gradient-to-r from-primary to-secondary left-0 w-screen h-screen overflow-hidden">
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-primary to-primary/80">
        <div class="flex items-center justify-center w-full px-4 py-12">
            <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl transform transition-all hover:scale-[1.01]">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-primary font-suse">Welcome Back</h2>
                    <p class="text-gray-500 mt-2">Please sign in to continue</p>
                </div>

                <form method="POST" action="/login" class="space-y-6">
                    @csrf
                    <div>
                        <label class="relative block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 absolute top-1/2 transform -translate-y-1/2 left-3 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <input class="w-full bg-gray-50 pl-10 p-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                name="email"
                                type="email"
                                placeholder="Enter your email"
                                required />
                        </label>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="relative block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 absolute top-1/2 transform -translate-y-1/2 left-3 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                            </svg>
                            <input class="w-full bg-gray-50 pl-10 p-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                name="password"
                                type="password"
                                placeholder="Enter your password"
                                required />
                        </label>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-primary text-white py-3 rounded-xl font-semibold hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transform transition-all hover:scale-[1.02]">
                        Sign in
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        Don't have an account?
                        <a href="/register" class="text-primary hover:text-primary/80 font-semibold">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout>