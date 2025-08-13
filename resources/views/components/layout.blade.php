<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
    {!! ToastMagic::styles() !!}
    <title>{{ $title ?? 'Isuba ERP' }}</title>
</head>

<body class="min-h-screen w-full @if (request()->is('/')) bg-slate-100 @endif">
    @if (request()->is('loginpage'))
        <main class="container mx-auto p-4 bg-slate-100 h-full">
            {{ $slot }}
        </main>
    @else
        <main class="container mx-auto bg-slate-100 h-full">


            <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
                aria-controls="sidebar-multi-level-sidebar" type="button"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>

            <aside id="sidebar-multi-level-sidebar"
                class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
                aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-sky-700 dark:bg-gray-800">
                    <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
                        {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 me-3 sm:h-7"
                            alt="Flowbite Logo" /> --}}
                        <span
                            class="self-center text-white tracking-widest text-xl font-semibold whitespace-nowrap dark:text-white">IERP</span>
                    </a>
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center p-2 rounded-lg text-white dark:text-white hover:bg-sky-900 hover:text-white dark:hover:bg-gray-700 group">
                                <svg class="shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                                </svg>

                                <span class="ms-3 text-sm font-semibold">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-sky-900 hover:text-white cursor-pointer dark:text-white dark:hover:bg-gray-700"
                                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                <svg class="shrink-0 w-5 h-5 text-white transition duration-75 dark:text-white group-hover:text-white dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>

                                <span
                                    class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-sm font-semibold">User
                                    Management</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="{{ route('roles') }}"
                                        class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-sky-900 hover:text-white dark:text-white dark:hover:bg-gray-700 text-sm">Roles</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-sky-900 hover:text-white dark:text-white dark:hover:bg-gray-700 text-sm">Registration</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-sky-900 hover:text-white dark:text-white dark:hover:bg-gray-700 text-sm">Permissions</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('category.create') }}"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-sky-900 hover:text-white dark:hover:bg-gray-700 group">
                                <svg class="shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                </svg>

                                <span class="flex-1 ms-3 whitespace-nowrap text-sm font-semibold">Category</span>
                                <span
                                    class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('product.create') }}"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-sky-900 hover:text-white dark:hover:bg-gray-700 group">
                                <svg class="shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>

                                <span class="flex-1 ms-3 whitespace-nowrap text-sm font-semibold">Products</span>
                                {{-- <span
                                    class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-sky-900 hover:text-white dark:hover:bg-gray-700 group">
                                <svg class="shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap text-sm font-semibold">Inventory</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-sky-900 hover:text-white dark:hover:bg-gray-700 group">
                                <svg class="shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                                </svg>

                                <span class="flex-1 ms-3 whitespace-nowrap text-sm font-semibold">Lookup
                                    Management</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-sky-900 hover:text-white dark:hover:bg-gray-700 group">
                                <svg class="shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>

                                <span class="flex-1 ms-3 whitespace-nowrap text-sm font-semibold">Sign out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <div class="sm:ml-64">
                <div>
                    <x-header></x-header>
                    <div class="p-2">

                        {{ $slot }}
                        @stack('scripts')
                    </div>
                    {{-- <x-footer></x-footer> --}}
                </div>
            </div>


        </main>
    @endif

    //got to put this offline
    @vite(['resources/js/flowbite.js'])
    {!! ToastMagic::scripts() !!}
</body>

</html>
