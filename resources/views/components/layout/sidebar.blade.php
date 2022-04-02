<div>
    <ul class="space-y-1">
        <li>
            <a class="text-blue-100 font-light hover:bg-blue-700 hover:text-white rounded-lg py-3 transition group duration-300 ease-in-out px-4 block w-full"
                href="{{ route('dashboard') }}">
                Dashboard
            </a>
        </li>
        @foreach ($navigations as $navigation)
            @can($navigation->permission_name)
                <li class="space-y-1" x-data="{ open: false }">
                    <button @click="open=!open" :class="{'bg-blue-600':open}"
                        class="flex items-center justify-between text-blue-100 font-light hover:bg-blue-700 hover:text-white rounded-lg py-3 transition group duration-300 ease-in-out px-4 relative w-full">
                        {{ $navigation->name }}
                        <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-90':open}"
                            class="h-5 w-5 transition duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open">
                        @foreach ($navigation->children as $child)
                            <a class="flex items-center justify-between text-xs text-blue-100 hover:bg-blue-700 hover:text-white rounded-lg py-3.5 transition group duration-300 ease-in-out px-8 relative w-full"
                                href="{{ url($child->url) }}">
                                {{ $child->name }}
                            </a>
                        @endforeach
                    </div>
                </li>
            @endcan
        @endforeach
    </ul>
</div>
