<x-app-layout>
    <div class="flex flex-row">
        <div class="hidden lg:block w-1/5 bg-blue-500 min-h-screen p-4">
            <x-layout.sidebar />
        </div>
        <div class="bg-gray-100 min-h-screen w-full sm:w-4/5">
            <div class="px-4">
                <header>
                    <div x-data="{open:false}" class="flex items-center justify-between py-4 px-2 w-full border-b-2">
                        <p class="text-xl font-semibold tracking-tighter">
                            Roles
                        </p>
                        <button @click="open=true"
                            class="block text-blue-600 bg-blue-100 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-3 py-3 text-center hover:text-white dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z" />
                            </svg>
                        </button>
                        <x-form-modal state="open" x-show="open" title="Create new Role">
                            <form action="{{ route('roles.create') }}" method="post">
                                @csrf
                                <div>
                                    <x-label for="name" :value="__('Name')" />

                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')"  />
                                </div>
                                <div class="mt-4">
                                    <x-label for="guard_name" :value="__('Guard Name')" />

                                    <x-input id="guard_name" class="block mt-1 w-full" type="text" name="guard_name"
                                        :value="old('guard_name')"  />
                                </div>

                                <div
                                    class="flex items-center justify-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                    <button
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Create
                                    </button>
                                    <button @click="open=false" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        Cancle
                                    </button>
                                </div>
                            </form>
                        </x-form-modal>
                    </div>
                </header>
                <div class="mt-4">
                    <div class="lg:order-none lg:col-span-9">
                        <div class="rounded-xl border bg-white shadow-sm">
                            <div
                                class="grid items-center gap-4 rounded-t-xl border-b bg-gray-50/40 px-4 py-3 sm:grid-cols-12">
                                <div class="col-span-12 sm:col-span-8">
                                    <div class="block font-medium tracking-tighter lg:text-lg">All Roles of Users
                                    </div>
                                    <span class="block text-xs tracking-tighter text-gray-500 lg:text-sm">
                                        You Can Changes All Roles For All or Any Users.
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
                                                    Roles Name
                                                </th>
                                                <th class=" whitespace-nowrap px-5 py-4 text-sm font-medium">
                                                    Guard Name
                                                </th>
                                                <th class=" whitespace-nowrap px-5 py-4 text-sm font-medium">
                                                    Created At
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $i => $role)
                                                <tr class=" border-b last:border-b-0 hover:bg-blue-50/30">
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        {{ $i + $roles->firstItem() }}
                                                    </td>
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        <a class="font-medium"
                                                            href="/articles/unpacking-array-php-8-php-81-vez7i4">
                                                            @if ($role->name == 'super admin')
                                                                <span
                                                                    class="px-2 py-0.5 text-blue-500 bg-blue-100 rounded-lg hover:text-blue-700">{{ $role->name }}</span>
                                                            @elseif ($role->name == 'admin')
                                                                <span
                                                                    class="px-2 py-0.5 text-green-500 bg-green-100 rounded-lg hover:text-green-700">{{ $role->name }}</span>
                                                            @else
                                                                <span
                                                                    class="px-2 py-0.5 text-amber-500 bg-amber-100 rounded-lg hover:text-amber-700">{{ $role->name }}</span>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        {{ $role->guard_name }}
                                                    </td>
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        {{ $role->created_at->format('d F, Y ') }}
                                                    </td>
                                                    <td class=" whitespace-nowrap px-5 py-4 text-sm">
                                                        <span class="flex items-center justify-center gap-x-2">
                                                            <span x-data="{open:false}">
                                                                <button @click="open=true"
                                                                    class="block text-red-600 bg-red-100 hover:bg-red-800
                                                    focus:ring-4 focus:outline-none focus:ring-red-300
                                                    font-medium rounded-full text-sm px-2 py-2 text-center
                                                    hover:text-white dark:bg-red-600 dark:hover:bg-red-700
                                                    dark:focus:ring-red-800"
                                                                    type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-4 w-4" viewBox="0 0 20 20"
                                                                        fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </button>
                                                                <x-form-modal state="open" x-show="open"
                                                                    title="Delete Role">
                                                                    <form action="{{ route('roles.delete', $role) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <p class="mb-6 text-center">
                                                                            <span
                                                                                class="text-xl text-amber-500 font-semibold">Are
                                                                                you sure ?</span>
                                                                            <br>
                                                                            you can delete
                                                                            <br>
                                                                            <span
                                                                                class="text-red-500 text-lg font-semibold">{{ $role->name }}</span>

                                                                            <br> Now . . . !
                                                                        </p>
                                                                        <div
                                                                            class="flex items-center justify-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                                            <button
                                                                                class="text-white bg-red-700 hover:bg-red-800
                                                                                focus:ring-4 focus:outline-none focus:ring-red-300
                                                                                font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600
                                                                                dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                                                Delete
                                                                            </button>
                                                                            <button @click="open=false" type="button"
                                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                                Cancle
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </x-form-modal>
                                                            </span>
                                                            <span x-data="{open:false}">
                                                                <button @click="open=true"
                                                                    class="block text-amber-600 bg-amber-100 hover:bg-amber-800
                                                    focus:ring-4 focus:outline-none focus:ring-amber-300
                                                    font-medium rounded-full text-sm px-2 py-2 text-center
                                                    hover:text-white dark:bg-amber-600 dark:hover:bg-amber-700
                                                    dark:focus:ring-amber-800"
                                                                    type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-4 w-4" viewBox="0 0 20 20"
                                                                        fill="currentColor">
                                                                        <path
                                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                                    </svg>
                                                                </button>
                                                                <x-form-modal state="open" x-show="open"
                                                                    title="Edit Role">
                                                                    <form action="{{ route('roles.update', $role) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div>
                                                                            <x-label for="name" :value="__('Name')" />
                                                                            <x-input id="name" class="block mt-1 w-full"
                                                                                type="text" name="name"
                                                                                :value="old('name') ?? $role->name"
                                                                                 />
                                                                        </div>
                                                                        <div class="mt-4">
                                                                            <x-label for="guard_name"
                                                                                :value="__('Guard Name')" />

                                                                            <x-input id="guard_name"
                                                                                class="block mt-1 w-full" type="text"
                                                                                name="guard_name"
                                                                                :value="old('guard_name') ?? $role->guard_name"
                                                                                 />
                                                                        </div>

                                                                        <div
                                                                            class="flex items-center justify-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                                            <button
                                                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                                Update
                                                                            </button>
                                                                            <button @click="open=false" type="button"
                                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                                Cancle
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </x-form-modal>
                                                            </span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
