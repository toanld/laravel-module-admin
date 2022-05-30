@props(["name","label"=>null,'mode'=>'.debounce.300ms',"class"=>"",'type'=>'text','placeholder'=>null])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';


@endphp
<x-lma.form.field :name="$name" :label="$label">
    <input wire:model{{$mode}}="{{$name}}" type="{{$type}}" placeholder="{{$placeholder}}" {{$attributes}} class="form-input"/>
</x-lma.form.field>
