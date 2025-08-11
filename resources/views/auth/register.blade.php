<x-layout>
    <div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div
                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                <div>

                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="block text-white bg-sky-500 hover:bg-sky-900 cursor-pointer focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm m-2 px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800"
                        type="button">
                        Add New User
                    </button>
                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    {{-- <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Register New user
                                    </h3> --}}
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">


                                    <form class="max-w-sm mx-4" method="post" action="{{ route('register.store') }}">
                                        @csrf
                                        <div class="grid grid-cols-2 gap-3 mb-2">

                                            <div class="mb-5">
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                                                    Name</label>
                                                <input type="text" id="name" name="name"
                                                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                                                    placeholder="" />
                                                @error('name')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-5">
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                <input type="email" id="email" name="email"
                                                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                                                    placeholder="name@flowbite.com" required />
                                                @error('email')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-5">
                                                <label for="password"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                                <input type="password" id="password" name="password"
                                                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                                                    required />
                                                @error('password')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-5">
                                                <label for="repeat-password"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat
                                                    password</label>
                                                <input type="password" id="repeat-password" name="password_confirmation"
                                                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                                                    required />
                                                @error('password_confirmation')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="role_id"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                                Role</label>
                                            <select id="role_id" name="role_id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                                            new account</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for users">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <th scope="row"
                                class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full" src="" alt="Jese image">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $user->name }}</div>
                                    <div class="font-normal text-gray-500">{{ $user->email }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->role_id }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if ($user->is_active)
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Active</span>
                                    @else
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">In
                                            Active</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py">
                                <div class="mb-1">
                                    <form action="{{ route('register.status_update', $user) }}" method="post">
                                        @csrf
                                        @method('put')
                                        @if ($user->is_active)
                                            <button type="submit"
                                                class="bg-gray-100 border border-gray-800 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-gray-300 hover:cursor-pointer">Deactivate
                                                User</button>
                                        @else
                                            <button type="submit"
                                                class="bg-yellow-100 border border-yellow-800 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300 hover:cursor-pointer">Activate
                                                User</button>
                                        @endif

                                    </form>
                                </div>
                                <div class="mb-1">

                                    <a href="#"
                                        class="font-medium text-grey-600 dark:text-grey-500 hover:text-grey-800 transition duration-75">
                                        <span
                                            class="bg-blue-100 border border-blue-800 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">Edit</span>

                                    </a>
                                </div>
                                <div>
                                    <form action="{{ route('register.delete', $user) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="bg-red-100 border border-red-800 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300 hover:cursor-pointer">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <p>No Data available</p>
                        </tr>
                    @endforelse



                </tbody>
            </table>
        </div>

    </div>
</x-layout>
