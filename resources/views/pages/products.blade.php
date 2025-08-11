<x-layout>
    <div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div
                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                <div>

                    <button data-modal-target="products" data-modal-toggle="products"
                        class="block text-white bg-sky-500 hover:bg-sky-900 cursor-pointer focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm m-2 px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800"
                        type="button">
                        Add New Product
                    </button>
                    <!-- Main modal -->
                    <div id="products" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Register New Product
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="products">
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


                                    <form class="max-w-sm mx-4" method="post" action="{{ route('product.store') }}">
                                        @csrf
                                        <div class="grid grid-cols-2 gap-3 mb-2">

                                            <div class="mb-5">
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                <input type="text" id="name" name="name"
                                                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                                                    placeholder="" />
                                                @error('name')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-5">
                                                <label for="category_id"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                <select id="category_id" name="role_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="">-- select category --</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-5">
                                                <label for="description"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                <textarea id="description" name="description"
                                                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"></textarea>
                                                @error('description')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-5">
                                                <label for="qrcode"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">QR
                                                    Code</label>
                                                <input type="text" id="qrcode" name="qrcode"
                                                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                                                @error('qrcode')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-5">
                                                <label for="price"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                                <input type="number" id="price" name="price"
                                                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                                                    required />
                                                @error('price')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                                            Product</button>
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
                        placeholder="Search for products">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <th scope="row"
                                class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $product->name }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->category_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->price }}
                            </td>
                            <td class="px-6 py">
                                <div class="mb-1">

                                    <a href="#"
                                        class="font-medium text-grey-600 dark:text-grey-500 hover:text-grey-800 transition duration-75">
                                        <span
                                            class="bg-blue-100 border border-blue-800 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">Edit</span>

                                    </a>

                                </div>
                                <div>
                                    <form action="{{ route('product.destroy', $product) }}" method="post">
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
                            <td>

                                <p class="flex items-center justify-center text-sm  p-1 m-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-4.5 m-2 text-amber-500 rounded-lg">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                    </svg> No available product
                                </p>
                            </td>
                        </tr>
                    @endforelse



                </tbody>
            </table>
        </div>

    </div>
</x-layout>
