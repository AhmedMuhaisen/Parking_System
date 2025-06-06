@props(['array', 'name', 'value', 'title'])


    <div class="col-sm-12">
        <select name='{{ $name }}' id=""
            class="form-select
    @error($name)
    is-invalid
    @enderror">
            <option value="" selected disabled hidden>{{ $title }}</option>

            @foreach ($array as $item)
                <option value="{{ $item->id }}" @selected(old($name, $value) == $item->id)>{{ $item->name }}</option>
            @endforeach

        </select>
        @error($name)
            <p class="text-danger">{{ $message }}</p>
        @enderror

</div>
