<x-app-layout>
    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2-multiple').select2({
                    placeholder: "Select Permissions"
                });
            });
        </script>
    @endpush
    <div class="flex flex-row">
        <div class="hidden lg:block w-1/5 bg-blue-500 min-h-screen p-4">
            <x-layout.sidebar />
        </div>
        <div class="bg-gray-100 min-h-screen w-full sm:w-4/5">
            <div class="px-4">
                <header>
                    <div class="flex items-center justify-between py-4 px-2 w-full border-b-2">
                        <p class="text-xl font-semibold tracking-tighter">
                           New Devices
                        </p>
                        <a href="{{ route('devices.create') }}"
                            class="block text-blue-600 bg-blue-100 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-3 py-3 text-center hover:text-white dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z" />
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
                                    <div class="block font-medium tracking-tighter lg:text-lg">Lists Devices AP &
                                        Station
                                    </div>
                                    <span class="block text-xs tracking-tighter text-gray-500 lg:text-sm">
                                        You can see all you'r access point & all you'r devices have.
                                    </span>
                                </div>
                            </div>
                            <div class="rounded-b-xl ">
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <thead>
                                            <tr class="border-b bg-gray-50 text-left">
                                                <th class=" whitespace-nowrap px-5 py-4 text-sm font-medium">#
                                                </th>
                                                <th class=" whitespace-nowrap px-5 py-4 text-sm font-medium">
                                                    SSID
                                                </th>
                                                <th class=" whitespace-nowrap px-5 py-4 text-sm font-medium">
                                                    Brand Name
                                                </th>
                                                <th class=" whitespace-nowrap px-5 py-4 text-sm font-medium">
                                                    Type
                                                </th>
                                                <th class=" whitespace-nowrap px-5 py-4 text-sm font-medium">
                                                    IP
                                                </th>
                                                <th class=" whitespace-nowrap px-5 py-4 text-sm font-medium">
                                                    Descriptions
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($devices as $i => $device)
                                                <tr class=" border-b last:border-b-0 hover:bg-blue-50/30">
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        {{ $i + $devices->firstItem() }}
                                                    </td>
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        <a class="font-medium"  href="http://{{ $device->ip }}" target="_blank"
                                                            rel="noopener noreferrer">

                                                            <span
                                                                class="px-2 py-0.5 text-blue-500 bg-blue-100 rounded-lg hover:text-blue-700">{{ $device->ssid }}</span>

                                                        </a>
                                                    </td>
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        {{ $device->brand }}
                                                    </td>
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        {{ $device->type }}
                                                    </td>
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        <a class="hover:underline text-blue-500"
                                                            href="http://{{ $device->ip }}" target="_blank"
                                                            rel="noopener noreferrer">
                                                            {{ $device->ip }}
                                                        </a>
                                                    </td>
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        {{ $device->description }}
                                                    </td>
                                                    {{-- <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        @if ($role->name == 'super admin')
                                                            <span
                                                                class="bg-blue-100 text-blue-500 rounded-xl px-2 py-2">Can
                                                                anything . . . !</span>
                                                        @elseif ($role->name == 'admin')
                                                            <span
                                                                class="bg-green-100 text-green-500 rounded-xl px-2 py-2">{{ implode(',' . ' ', $role->getPermissionNames()->toArray()) }}</span>
                                                        @else
                                                            <span
                                                                class="bg-amber-100 text-amber-500 rounded-xl px-2 py-2">{{ implode(',' . ' ', $role->getPermissionNames()->toArray()) }}</span>
                                                        @endif
                                                    </td> --}}
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        <a href="{{ route('devices.edit', $device) }}"
                                                            class="relative text-orange-600 bg-orange-100 hover:bg-orange-800
                                                            focus:ring-4 focus:outline-none focus:ring-orange-300
                                                            font-medium rounded-full text-sm px-3 py-3 text-center
                                                            hover:text-white dark:bg-orange-600 dark:hover:bg-orange-700
                                                            dark:focus:ring-orange-800"
                                                            type="button">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4" viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path
                                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                        {{-- <x-form-modal state="open" x-show="open"
                                                            title="Update Assign Permissions to user">
                                                            <form action="{{ route('assign.update', $role) }}"
                                                                method="post">
                                                                @csrf
                                                                <div>
                                                                    <x-label for="role" :value="__('Role Name')" />

                                                                    <select id="role"
                                                                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                                        type="text" name="role">
                                                                        <option disabled selected>Choose a Role</option>
                                                                        @foreach ($roles as $item)
                                                                            <option
                                                                                {{ $role->id == $item->id ? 'selected' : '' }}
                                                                                value="{{ $item->id }}">
                                                                                {{ $item->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('role')
                                                                        <div
                                                                            class="mt-3 text-red-500 text-xs font-extralight">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mt-4">
                                                                    <x-label class="mb-3" for="permissions"
                                                                        :value="__('Permissions Name')" />

                                                                    <select id="permissions" multiple
                                                                        class="w-full select2-multiple mb-4" type="text"
                                                                        name="permissions[]">
                                                                        @foreach ($permissions as $permission)
                                                                            <option
                                                                                {{ $role->permissions()->find($permission->id) ? 'selected' : '' }}
                                                                                value="{{ $permission->id }}">
                                                                                {{ $permission->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('permissions')
                                                                        <div
                                                                            class="mt-3 text-red-500 text-xs font-extralight">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div
                                                                    class="mt-4 flex items-center justify-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                                    <button
                                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                        Assign
                                                                    </button>
                                                                    <button @click="open=false" type="button"
                                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        Cancle
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </x-form-modal> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="p-4 border-t">
                                {{ $devices->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
