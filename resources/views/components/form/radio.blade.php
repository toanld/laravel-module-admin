@props(["name","label"=>null,"class"=>"",'placeholder'=>null,"default"=>[],"params"=>[]])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';
@endphp
<x-lma.form.field :name="$name" :label="$label">
    <div class="w-full flex flex-wrap space-x-2">
        @foreach($params as $k=>$val)
            <label class="flex-none flex items-center">
                <input type="radio" wire:model="{{$name}}" value="{{$k}}">
                <span class="flex-auto pl-1 pr-4">{{$val}}</span>
            </label>
        @endforeach
    </div>
</x-lma.form.field>
