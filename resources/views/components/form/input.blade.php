@props(["name","label"=>null,'mode'=>'.debounce.300ms',"class"=>"",'type'=>'text','placeholder'=>null])
@php
$label = $label!=""?$label:\Illuminate\Support\Str::title($name);
$placeholder = $placeholder!=''?$placeholder:$label.'...';

@endphp
<x-lma.form.field :name="$name" :label="$label">
    <input wire:model{{$mode}}="{{$name}}" type="{{$type}}" placeholder="{{$placeholder}}" {{$attributes}} class="w-full  p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror"/>
</x-lma.form.field>
