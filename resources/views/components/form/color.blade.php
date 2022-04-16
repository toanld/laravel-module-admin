@props(["name","label"=>null,'mode'=>'.debounce.300ms',"class"=>"",'placeholder'=>null])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';


@endphp
<x-lma.form.field :name="$name" :label="$label" :class="$class">
    <input wire:model{{$mode}}="{{$name}}" type="color" placeholder="{{$placeholder}}" {{$attributes}} class="w-20  h-20 p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror"/>
</x-lma.form.field>
