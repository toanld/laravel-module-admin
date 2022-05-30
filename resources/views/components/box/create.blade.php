@props(['listing'=>'','btns'=>null,"box"=>"full"])
<div class="box-form {{$box}}">
    <div class="box-title">
        <span class="flex-none text-gray-800  text-xl p-2">Create</span>
        <div class="flex-none p-2 grid gap-1">
            @if($listing)
                <a class="btn-primary" href="{{$listing}}">{!! lmaIcon('list') !!}<span class="text">List</span></a>
            @endif
        </div>
    </div>
    <div class="box-container">
       {{$slot}}
        <div class="form-field">
            <span class="table-cell"></span>
            <div class="footer">
                <div class="w-full flex-none flex items-center border-t py-5">
                    <label class="btn-primary mr-2" wire:click="store">Create</label>
                    <div class="flex-none grid grid-flow-col gap-4 text-xs">
                        <label class=" flex  items-center">
                            <input type="radio" wire:model="done" value="0">
                            <span class="ml-1">Continue Create</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" wire:model="done" value="1">
                            <span class="ml-1">View</span>
                        </label>
                        <label class=" flex items-center">
                            <input type="radio" wire:model="done" value="2">
                            <span class="ml-1">Edit</span>
                        </label>
                        <label class=" flex items-center">
                            <input type="radio" wire:model="done" value="3">
                            <span class="ml-1">Listing</span>
                        </label>
                    </div>
                    <div class="flex-auto "></div>
                    <label class="btn ml-2" wire:click="resetForm">Reset</label>
                </div>

            </div>
        </div>
    </div>
</div>
