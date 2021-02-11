<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="amount" :value="__('Quantidade')" />

                <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" required />
            </div>

            <div class="mt-4">
                <x-label for="price" :value="__('Preço')" />

                <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
            </div>

            <div class="mt-4">
                <x-label for="category" :value="__('Categoria')" />

                <select name="category" id="category" class="rounded-full w-full">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
