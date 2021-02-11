<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-5 lg:px-8">
            @if(session('success'))
                <div class="mb-5 text-white bg-green-500 w-13 p-3 rounded-2xl text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mb-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="display: flex; justify-content: space-between">
                    
                    <div>
                        <label for="categories" class="font-bold">Produto:</label><br>
                        <a href="{{ route('admin.create') }}" class="text-green-600 p-2 pt-2"><i class="fas fa-plus-circle fa-2x"></i></i></a>
                    </div>
                    <div>
                        <label for="categories" class="font-bold">Categoria:</label><br>
                        <a href="{{ route('admin.createCategory') }}" class="text-green-600 p-2 pt-2"><i class="fas fa-plus-circle fa-2x"></i></i></a>
                    </div>
                    <form action="{{ route('admin.searchCategory') }}" method="POST">
                        @csrf
                        <label for="categories" class="font-bold">Categorias:</label><br>
                        <select name="category" id="" class="rounded-full">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="text-white bg-indigo-700 p-2" style="border-radius: 50%"><i class="fas fa-search"></i></button>
                   </form>
                </div>
            </div>
            
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Produto
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantidade
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Preço
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Opções
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $product->name }}
                                    </div>
                                    </div>
                                </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $product->amount }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-medium text-gray-900">
                                    @php
                                        echo 'R$ ' . number_format($product->price, 2, ',', '');
                                    @endphp
                                </span>
                                </td>
                                <td class="flex justify-around px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <form action="{{ route('admin.edit')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <button type="submit" class="text-white bg-indigo-700  p-2" style="border-radius: 50%"><i class="fas fa-pencil-alt fa-lg"></i></button>
                                    </form>
                                    <form action="{{ route('admin.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <button type="submit" class="text-red-600 p-2"><i class="fas fa-minus-circle fa-2x"></i></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More items... -->
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
