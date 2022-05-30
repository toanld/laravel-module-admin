@props(["name","label"=>null,"class"=>"",'placeholder'=>null,"default"=>[],"params"=>[]])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';

 if(empty($default)){
     $default = [$placeholder];
 }
@endphp
<x-lma.form.field :name="$name" :label="$label">
    <select wire:model="{{$name}}" placeholder="{{$placeholder}}" {{$attributes}} class="form-input">
        @foreach($default as $k=>$v)
            <option value="{{$k}}">{{$v}}</option>
        @endforeach
        @foreach($params as $k=>$v)
            <option value="{{$k}}">{{$v}}</option>
        @endforeach
    </select>
</x-lma.form.field>
