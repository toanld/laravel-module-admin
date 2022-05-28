@props(["name","label"=>null,"title"=>null, "class"=>"",'placeholder'=>null, 'value'=>1])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';
@endphp
<x-lma.form.field :name="$name" :label="$label">
    <div class="w-full flex flex-wrap space-x-2 md:pt-1">
        <label class="flex-none flex items-center">
            <input type="checkbox" wire:model="{{$name}}" value="{{$value}}">
            <span class="flex-auto pl-1 pr-4">{{$title}}</span>
        </label>
    </div>
</x-lma.form.field>
