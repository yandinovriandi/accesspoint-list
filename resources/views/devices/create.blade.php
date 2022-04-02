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
                        <a href="{{ route('devices.table') }}"
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
                                    <div class="block font-medium tracking-tighter lg:text-lg">Create new data device
                                    </div>
                                    <span class="block text-xs tracking-tighter text-gray-500 lg:text-sm">
                                        You can add all data credentials a device.
                                    </span>
                                </div>
                            </div>
                            <div class="rounded-b-xl ">
                                <div class="p-4">
                                    <form action="{{ route('devices.create') }}" method="post">
                                        @csrf
                                        <div class="grid grid-col md:grid-cols-2 gap-x-2">
                                            <div class="mt-2">
                                                <x-label class="mb-2" :value=" __('Area') " />
                                                <select id="area"
                                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    type="text" name="area">
                                                    <option disabled selected>Choose an Area</option>
                                                    @foreach ($areas as $area)
                                                        <option value="{{ $area->name }}">{{ $area->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('area')
                                                    <div class="mt-3 text-red-500 text-xs font-extralight">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mt-2">
                                                <x-label for="user_placed" class="mb-2"
                                                    :value=" __('Name User Placed Device ') " />
                                                <x-input type="text" class="w-full" name="user_placed"
                                                    id="user_placed"
                                                    value="{{ old('user_placed') }}" placeholder="Ahmad"/>
                                                @error('user_placed')
                                                    <div class="mt-3 text-red-500 text-xs font-extralight">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-col md:grid-cols-2 gap-x-2">
                                            <div class="mt-2">
                                                <x-label for="ssid" class="mb-2" :value=" __('SSID') " />
                                                <x-input class="w-full" type="text" name="ssid" id="ssid"
                                                    placeholder="Wifi Hotspot" value="{{ old('ssid') }}" />
                                                @error('ssid')
                                                    <div class="mt-3 text-red-500 text-xs font-extralight">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mt-2">
                                                <x-label for="ip" class="mb-2" :value=" __('IPV4') " />
                                                <x-input name="ip" id="ip" class="w-full" type="text"
                                                    placeholder="xxx.xxx.xxx.xxx" value="{{ old('ssid') }}" />
                                                @error('ip')
                                                    <div class="mt-3 text-red-500 text-xs font-extralight">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-col md:grid-cols-2 gap-x-2">
                                            <div class="mt-2">
                                                <x-label for="username" class="mb-2"
                                                    :value=" __('Usename') " />
                                                <x-input class="w-full" name="username" id="username"
                                                    type="text" placeholder="Username"
                                                    value="{{ old('username') }}" />
                                                @error('username')
                                                    <div class="mt-3 text-red-500 text-xs font-extralight">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mt-2" x-data="{ show: true }">
                                                <x-label for="password" class="mb-2"
                                                    :value=" __('Password') " />
                                                <div class="relative">
                                                    <input :placeholder="show ?'*******':'Ba Kekok! 😜'"
                                                        :type="show ? 'password' : 'text'" name="password" id="password"
                                                        value="{{ old('password') }}"
                                                        class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                        {{-- class="text-md block px-3 py-2 rounded-lg w-full
                                                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                                                focus:placeholder-gray-500
                                                focus:bg-white
                                                focus:border-gray-600
                                                focus:outline-none" --}} />
                                                    <div
                                                        class="hover:cursor-pointer absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                                        {{-- <svg
                                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                            <path fill="currentColor"
                                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                            </path>
                                                        </svg> --}}
                                                        <svg class="h-5 w-5" fill="currentColor"
                                                            @click="show = !show"
                                                            :class="{'hidden': !show, 'block':show }"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            <path fill-rule="evenodd"
                                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="h-5 w-5" viewBox="0 0 20 20"
                                                            fill="currentColor" @click="show = !show"
                                                            :class="{'block': !show, 'hidden':show }"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                                                clip-rule="evenodd" />
                                                            <path
                                                                d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                                        </svg>
                                                    </div>
                                                    @error('password')
                                                        <div class="mt-3 text-red-500 text-xs font-extralight">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="grid grid-col md:grid-cols-2 gap-x-2">
                                            <div class="mt-2">
                                                <x-label for="brand" class="mb-2" :value=" __('Brand') " />
                                                <x-input name="brand" id="brand" class="w-full" type="text"
                                                    placeholder="Huawei" value="{{ old('brand') }}" />
                                                @error('brand')
                                                    <div class="mt-3 text-red-500 text-xs font-extralight">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mt-2">
                                                <x-label for="type" class="mb-2" :value=" __('Type') " />
                                                <x-input class="w-full" type="text" name="type" id="type"
                                                    placeholder="HG8245H5" value="{{ old('type') }}" />
                                                @error('type')
                                                    <div class="mt-3 text-red-500 text-xs font-extralight">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <x-label for="description" class="mb-2"
                                                :value=" __('Descriptions') " />
                                            <textarea class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                type="text" name="description"
                                                id="description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="mt-3 text-red-500 text-xs font-extralight">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="flex items-center md:justify-start gap-x-3">
                                            <x-button>Create</x-button>
                                            <a href="{{ route('devices.table') }}"
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
