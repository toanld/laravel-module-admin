@props(["record","confirm"=>0,"class"=>"sm"])
@if($record==$confirm)
    <label class="btn-danger {{$class}}" wire:click="delete" title="Delete" {{$attributes}}>Sure?</label>
@else
    <label class="btn-warning {{$class}}" wire:click="$set('confirm',{{$record}})" title="Delete" {{$attributes}}>{!! lmaIcon("delete",11) !!}</label>
@endif

