@props(["name","label"=>""])
@php
    $label = trim($label,":");
    $label = trim($label);
    if($label !=""){
        $label .= ": ";
    }
@endphp

<div class="form-field @error($name) error @enderror">
    @if($label !="")
        <label class="label">{{$label}}</label>
    @endif
    <div class="field">
        {{$slot}}
        @error($name)<span class="message">{{$message}}</span>@enderror
    </div>
</div>
