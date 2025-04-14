<x-layout>

    <h1 class="font-bold text-center py-6 text-2xl text-primary">Register</h1>

    <div class="w-full bg-white shadow rounded p-4">
        <form method="POST" action="/register">
        @csrf
            <div class="justify-center items-center">
                <div class="p-4 min-w-1/2">
                    <label class="py-1 w-fit text-sm relative block">Name</label>
                    <input class="p-1 w-1/2 bg-black"
                    name="name" id="name" type="name" required/>
                </div>
                <div class="p-4 min-w-1/2">
                    <label class="py-1 w-fit text-sm relative block">Email</label>
                    <input class="p-1 w-1/2 bg-black"
                    name="email" id="email" type="email" placeholder="Email" required/>
                </div>
            </div>
            <div class="">
                <div class="p-4 min-w-1/2">
                    <label class="py-1 w-fit text-sm relative block">Email</label>
                    <input class="p-1 w-1/2 bg-black"
                    name="password" id="password" type="password" placeholder="Password" required/>
                </div>
                <div class="p-4 min-w-1/2">
                    <label class="py-1 w-fit text-sm relative block">Email</label>
                    <input class="p-1 w-1/2 bg-black"
                    name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password"/>
                </div>
            </div>
            <div class="pt-6 border-t">
                <button class="w-full px-4 py-2 text-black bg-valred rounded-2xl hover:bg-valdred focus:outline-none focus:ring-2 focus:ring-valdred focus:ring-offset-2"
                type="submit">Register</button>
            </div>
        </form>
    </div>
</x-layout>
