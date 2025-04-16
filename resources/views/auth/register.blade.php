<x-layout>
    <div class="absolute bg-gradient-to-r from-primary to-secondary left-0 w-screen h-screen overflow-hidden">
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-primary to-primary/80">
        <div class="flex items-center justify-center w-full px-4 py-12">
            <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl transform transition-all hover:scale-[1.01]">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-primary font-suse">Create Account</h2>
                    <p class="text-gray-500 mt-2">Please fill in your details</p>
                </div>

                <form method="POST" action="/register" class="space-y-6">
                    @csrf

                    <div>
                        <label class="relative block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 absolute top-1/2 transform -translate-y-1/2 left-3 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <input class="w-full bg-gray-50 pl-10 p-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                name="name"
                                type="text"
                                placeholder="Full Name"
                                required />
                        </label>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="relative block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 absolute top-1/2 transform -translate-y-1/2 left-3 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <input class="w-full bg-gray-50 pl-10 p-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                name="email"
                                type="email"
                                placeholder="Email Address"
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
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                            <input class="w-full bg-gray-50 pl-10 p-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                name="phone"
                                type="tel"
                                placeholder="Phone Number"
                                required />
                        </label>
                        @error('phone')
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
                                placeholder="Password"
                                required />
                        </label>
                        @error('password')
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
                                name="password_confirmation"
                                type="password"
                                placeholder="Confirm Password"
                                required />
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-primary text-white py-3 rounded-xl font-semibold hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transform transition-all hover:scale-[1.02]">
                        Create Account
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        Already have an account?
                        <a href="/login" class="text-primary hover:text-primary/80 font-semibold">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout>