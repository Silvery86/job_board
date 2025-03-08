<nav {{ $attributes }}>
    <ul class="flex text-sm text-slate-500 space-x-4">
        <li>
            <a href="/">Home</a>
        </li>
        @foreach ($links as $label => $link)
            <li>
                >
            </li>
            <li>
               <a href="{{ $link }}">{{ $label }}</a>
            </li>
        @endforeach
    </ul>
</nav>
