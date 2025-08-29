<x-layout>
    <x-subheader title="my sales" btnText="make sale" modal="sales"
        svg_d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"></x-subheader>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div>
                <!-- Main modal -->
                <div id="sales" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white uppercase">
                                    add sale
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="sales">
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


                                <form class=" mx-4" method="post" action="{{ route('sales.store') }}">
                                    @csrf
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="mb-5">
                                            <label for="product_id"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product</label>
                                            <select id="product_id" name="product_id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">-- select product --</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <label for="selling_price"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selling
                                                Price</label>
                                            <input readonly type="number" id="selling_price" name="selling_price"
                                                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                                        </div>
                                        <div class="mb-5">
                                            <label for="quantity"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                                            <input onchange="calculateTotal()" value="{{ old('quantity') }}"
                                                type="number" id="quantity" name="quantity"
                                                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                                            @error('quantity')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-5">
                                            <label for="amount"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Amount</label>
                                            <input readonly type="number" id="amount" name="amount"
                                                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                                        </div>

                                        <div class="mb-5">
                                            <label for="customer_name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer
                                                Full Name</label>
                                            <input value="{{ old('customer_name') }}" type="text" id="customer_name"
                                                name="customer_name"
                                                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                                            @error('customer_name')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-5">
                                            <label for="customer_phone"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer
                                                Phone Number</label>
                                            <input readonly type="number" id="customer_phone" name="customer_phone"
                                                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                                            @error('customer_no')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <x-submit-btn btnText="add sale"></x-submit-btn>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative m-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for sale">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Product
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sold By
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sell Date
                    </th>

                    {{-- <th scope="col" class="px-6 py-3">
                        Action
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($user_sales as $user_sale)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-5 py-3">
                            {{ $user_sale->product_id }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $user_sale->quantity }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $user_sale->amount }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $user_sale->user_id }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $user_sale->created_at }}
                        </td>

                        {{-- <td class="px-5 py-3">
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <a href=""
                                        class="font-medium text-grey-600 dark:text-grey-500 hover:text-grey-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                </div>
                                <div>
                                    <form action="{{ route('stocks.destroy', $stock->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class=" text-red-800 hover:cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>

                                        </button>
                                    </form>
                                </div>
                            </div>


                        </td> --}}
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
                                </svg> You have not made any sales today 😒
                            </p>
                        </td>
                    </tr>
                @endforelse



            </tbody>
        </table>
    </div>

    {{-- @push('scripts')
        <script src="{{ asset('vendor/js/sales.js') }}"></script>
    @endpush --}}
    <script>
        document.getElementById('product_id').addEventListener('change', function() {
            const selectedValue = this.value;

            if (!selectedValue) {
                document.getElementById('quantity').value = '';
                // document.getElementById('field2').value = '';
                return;
            }

            fetch('{{ route('product.byId') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        selected_value: selectedValue
                    })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('selling_price').value = data.price;
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error fetching data');
                });
        });

        function calculateTotal() {
            let price = document.getElementById('selling_price').value;
            let quantity = document.getElementById('quantity').value;

            let total = price * quantity;

            document.getElementById('amount').value = total;
        }
    </script>
</x-layout>
