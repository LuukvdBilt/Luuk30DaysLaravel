@props(['name'])
@error($name)
    <span class="text-red-500 text-sm italic">{{ $message }}</span>
@enderror