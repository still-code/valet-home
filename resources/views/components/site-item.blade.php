<li class="group col-span-1 bg-white bg-gradient-to-b from-white via-white to-gray-50 rounded-lg shadow hover:shadow-md transition delay-100 duration-300 ease-in-out divide-y divide-gray-200 cursor-pointer">
    <div class="bg-o w-full flex items-center justify-between p-6 space-x-6">
        <div class="flex-1 truncate">
            <div class="flex justify-between items-center space-x-3">
                <a href="//{{ $dir->name }}.test" class="font-bolsd text-gray-900 group-hover:text-yellow-800 text-lg pl-1 transition delay-100 duration-300 ease-in-out">
                    {{ \Illuminate\Support\Str::title($dir->name) }}
                </a>
                <span class="flex-shrink-0  px-2 py-0.5 text-xs {{ $dir->class }} rounded-full">{{ $dir->type }}</span>
            </div>
        </div>
    </div>
</li>
