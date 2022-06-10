<x-dropdown>
    <x-slot name="trigger">
        <button>
        </button>
    </x-slot>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="/?category={{ $category->category }}"
            :active='request()->is("categories/{category->category}")'
            >{{ ucwords($category->category) }}</x-dropdown-item>
    @endforeach

</x-dropdown>