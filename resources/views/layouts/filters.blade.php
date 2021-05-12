<div class="w-2/3 mx-auto text-center mt-4">
    <div class="grid-cols-6 gap-4 p-3" id="filtering">
        <button class="focus:ring-0 focus:outline-none py-2 px-4 shadow transition delay-100 duration-300 ease-in-out text-paige-900 hover:text-paige-100 dark:text-paige-100 dark:hover:text-paige-800 rounded-md hover:rounded-lg bg-paige-400 hover:bg-paige-600 dark:bg-paige-800 dark:hover:bg-paige-100 activeItem filter-btn" onclick="geeksportal('all')">
            Show all
        </button>
        @foreach($directories->unique('type') as $tag)
            <button onclick="window.geeksportal('{{ $tag->type }}')" class="{{ $tag->class }} focus:ring-0 focus:outline-none py-2 px-4 transition delay-100 duration-300 ease-in-out hover:opacity-80 shadow rounded-md hover:rounded-lg filter-btn">
                {{ $tag->type }}
            </button>
        @endforeach
    </div>
</div>
