<div>
    <label for="{{ $name }}" class="flex mb-1 text-sm">
        <input type="radio" name="{{ $name }}" value=""
        @checked(!request( $name ))
        />
        <span class="ml-2">
            All
        </span>
    </label>
    @foreach( $options as $option )
    <label for="{{ $name }}" class="flex mb-1 text-sm">
        <input type="radio" name="{{ $name }}" value="{{ $option }}"
        @checked($option == request($name))
        />
        <span class="ml-2">
            {{ Str::ucfirst($option) }}
        </span>
    </label>
    @endforeach
</div>
