<div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($products as $product)
        <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
            <div class="bg-white shadow-md rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg p-8" src={{ asset('storage/' . $product->image) }} alt="product image">
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h3 class="text-gray-900 font-semibold text-xl tracking-tight dark:text-white">
                            {{ $product->name }}
                        </h3>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                        <p>{{ $product->short_description }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ $product->price }}</span>
                        <button wire:click="addToCar({{ $product->id }})"
                            class="text-white
                            bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg
                            text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700
                            dark:focus:ring-blue-800">Agregar
                            al carrito</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
