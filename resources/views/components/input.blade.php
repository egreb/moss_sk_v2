<label class="block text-gray-700 text-sm font-bold mb-1 mt-3" for="{{ isset($id) ? $id : $name }}">
    {{ $label }}
</label>
<input class="{{ isset($class) ? $class : '' }}" id="{{ isset($id) ? $id : $name }}"
       type="{{ isset($type) ? $type : 'text' }}" placeholder="{{ isset($placeholder) ? $placeholder : $label }}"
       name="{{ $name }}" value="{{ isset($value) ? $value : old($name) }}">
@error($name)
    <p class="text-red-500 mt-2">{{ $message }}</p>
@enderror
