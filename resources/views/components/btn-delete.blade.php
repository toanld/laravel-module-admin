@props(["record","confirm"=>0])
@if($record==$confirm)
    <label class="btn-danger sm" wire:click="delete" title="Delete" {{$attributes}}>Sure?</label>
@else
    <label class="btn-warning sm" wire:click="$set('confirm',{{$record}})" title="Delete" {{$attributes}}>{!! lmaIcon("delete",11) !!}</label>
@endif

