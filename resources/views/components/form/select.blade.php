@props(["name","label"=>null,"class"=>"",'placeholder'=>null,"default"=>[],"params"=>[]])
@php
    $label = $label!=""?$label:\Illuminate\Support\Str::title($name);
    $placeholder = $placeholder!=''?$placeholder:$label.'...';
    if(empty($default)){
        $default = [$label];
    }
@endphp
<x-lma.form.field :name="$name" :label="$label">
    <select wire:model="{{$name}}" placeholder="{{$placeholder}}" {{$attributes}} class="w-full  p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror">
        @foreach($default as $k=>$v)
            <option value="{{$k}}">{{$v}}</option>
        @endforeach
        @foreach($params as $k=>$v)
            <option value="{{$k}}">{{$v}}</option>
        @endforeach
    </select>
</x-lma.form.field>
