@props([
    'name', 'label'
])

<div class="flex flex-col space-y-1">
    <label for="{{ $name }}" class="text-sm text-slate-700 font-semibold tracking-wide @error($name) text-red-700 @enderror">{{ $label }}</label>
    <input wire:model="{{ $name }}" type="text" id="{{ $name }}" 
        class="text-sm p-2 rounded border-slate-300  focus:outline-none focus:ring-inset 
        focus:ring-indigo-300 focus:border-indigo-300 @error($name) bg-red-50 border-2 border-red-300  
        focus:outline-none focus:ring-inset focus:ring-red-300 focus:border-red-300  @enderror">

    @error($name)
        <span class="italic text-red-700 text-sm">{{ $message }}</span>
    @enderror
</div>