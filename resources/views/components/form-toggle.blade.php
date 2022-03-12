@props(["name","label"=>null,"class"=>"",'value'=>1])
@php
$label = $label!=""?$label:\Illuminate\Support\Str::title($name);

@endphp
<x-lma-form-field :name="$name" :label="$label">
    <label class="w-12 h-4 relative rounded-l-full mt-2 rounded-r-full bg-gray-300 inline-block cursor-pointer">
        <input type="checkbox" wire:model="{{$name}}" class="hidden toggle"  value="{{$value}}" {{$attributes}}/>
        <span class="dot w-6 h-6 block border bg-white rounded-full absolute transition -top-1 left-0"></span>
    </label>
</x-lma-form-field>
