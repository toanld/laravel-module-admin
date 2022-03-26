@props(["name","label"=>null,"class"=>"",'placeholder'=>null,"default"=>[],"params"=>[]])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::title($name)).'...';

 if(empty($default)){
     $default = [$placeholder];
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
