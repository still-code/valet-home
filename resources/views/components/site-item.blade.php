<li class="group bg-gradient-to-b from-white via-white to-gray-50 rounded-lg shadow hover:shadow-md p-6 transition delay-100 duration-300 ease-in-out cursor-pointer">
    <div class="flex justify-between items-center">
        <a href="//{{ $dir->name }}.test" class="text-gray-900 group-hover:text-amber-800 text-lg pl-1 transition delay-100 duration-300 ease-in-out">
            {{ \Illuminate\Support\Str::title($dir->name) }}
        </a>
        <span class="  px-2 py-1 text-xs {{ $dir->class }} rounded-full">{{ $dir->type }}</span>
    </div>
</li>
