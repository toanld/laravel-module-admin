@props(["name","label"=>null,"class"=>"",'placeholder'=>null,"default"=>[],"params"=>[]])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';


@endphp
<x-lma.form.field :name="$name" :label="$label">
    <ul class="inline-block max-w-60 border rounded max-h-96 p-2 overflow-auto">
        @foreach($params as $k=>$param)
            <li class="w-full flex border-b">
                <label class=" flex p-2 items-center cursor-pointer">
                    <span class="w-6"><input wire:model="{{$name}}" value="{{$k}}" type="checkbox"></span>
                    <span class="flex-1">{{$param}}</span>
                </label>
            </li>
        @endforeach
    </ul>
</x-lma.form.field>
