<x-app-layout>
    <div class="flex flex-row">
        <div class="hidden lg:block w-1/5 bg-blue-500 min-h-screen p-4">
            <x-layout.sidebar />
        </div>
        <div class="bg-gray-100 min-h-screen w-full sm:w-4/5">
            <div class="px-4">
                <header>
                    <div class="flex items-center justify-between py-4 px-2 w-full border-b-2">
                        <p class="text-xl font-semibold tracking-tighter">
                            New Data Device
                        </p>
                        <a href="{{ route('areas.table') }}"
                            class="block text-blue-600 bg-blue-100 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-3 py-3 text-center hover:text-white dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M6.707 4.879A3 3 0 018.828 4H15a3 3 0 013 3v6a3 3 0 01-3 3H8.828a3 3 0 01-2.12-.879l-4.415-4.414a1 1 0 010-1.414l4.414-4.414zm4 2.414a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 101.414 1.414L12 11.414l1.293 1.293a1 1 0 001.414-1.414L13.414 10l1.293-1.293a1 1 0 00-1.414-1.414L12 8.586l-1.293-1.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </header>
                <div class="mt-4">
                    <div class="lg:order-none lg:col-span-9">
                        <div class="rounded-xl border bg-white shadow-sm">
                            <div
                                class="grid items-center gap-4 rounded-t-xl border-b bg-gray-50/40 px-4 py-3 sm:grid-cols-12">
                                <div class="col-span-12 sm:col-span-8">
                                    <div class="block font-medium tracking-tighter lg:text-lg">Create new coverage area
                                    </div>
                                    <span class="block text-xs tracking-tighter text-gray-500 lg:text-sm">
                                        You can new coverage area.
                                    </span>
                                </div>
                            </div>
                            <div class="rounded-b-xl ">
                                <div class="p-4">
                                    <form action="{{ route('areas.create') }}" method="post">
                                        @csrf
                                        <div class="grid grid-col lg:grid-cols-2 gap-x-2">
                                            <div class="my-2">
                                                <x-label class="mb-2" :value="__('Area Name')" />
                                                <x-input class="w-full" name="name" id="name" :value="old('name')"
                                                    type="text" placeholder="Kp.Cimuti" />
                                                @error('name')
                                                    <div class="mt-3 text-red-500 text-xs font-extralight">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <div class="my-2">
                                                <x-label for="keterangan" class="mb-2"
                                                    :value=" __('Descriptions') " />
                                                <textarea class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    type="text" name="keterangan"
                                                    id="keterangan" placeholder="Descriptions Coverage Area Placed ">{{ old('keterangan')}}</textarea>
                                                @error('keterangan')
                                                    <div class="mt-3 text-red-500 text-xs font-extralight">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="flex items-center md:justify-start gap-x-3 mt-3">
                                            <x-button>Create</x-button>
                                            <a href="{{ route('areas.table') }}"
                                                class="text-md font-medium capitalize px-3 py-1.5 text-center bg-amber-500 rounded-lg text-white">Cancle</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
