<x-app-layout>
    <div class="flex flex-row">
        <div class="hidden lg:block w-1/5 bg-blue-500 min-h-screen p-4">
            <x-layout.sidebar />
        </div>
        <div class="bg-gray-100 min-h-screen w-full sm:w-4/5">
            <div class="px-4">
                <header>
                    <div class="py-4 px-2 w-full border-b-2">
                        <p class="text-xl font-semibold tracking-tighter">
                            Dashboard
                        </p>
                        {{-- <x-button>Add</x-button> --}}
                    </div>
                </header>
                <div class="py-4">
                    Selamat datang {{ auth()->user()->name }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
