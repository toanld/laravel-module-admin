@props(['name'=>'','filter'=>'','filter_status'=>'false','footer'=>'','fields'=>[],'create'=>'','btns'=>null,'permission'=>''])
<div class="w-full bg-white rounded overflow-hidden text-sm shadow">
    <div x-data="{ open: {{$filter_status}} }" class="w-full min-h-12   border-blue-500  border-t-4">
        <div class="w-full flex items-center">
            <div class="float-left flex-none p-2">
                <label class="btn-primary" @click="open = ! open"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="18px" viewBox="0 0 24 24" width="18px" fill="currentColor"><g><path d="M0,0h24 M24,24H0" fill="none"/><path d="M4.25,5.61C6.27,8.2,10,13,10,13v6c0,0.55,0.45,1,1,1h2c0.55,0,1-0.45,1-1v-6c0,0,3.72-4.8,5.74-7.39 C20.25,4.95,19.78,4,18.95,4H5.04C4.21,4,3.74,4.95,4.25,5.61z"/><path d="M0,0h24v24H0V0z" fill="none"/></g></svg></span> Filter</label>
            </div>
            <div class="w-full flex-auto flex text-right px-2">
                <span class="flex-auto"></span>
                {{$btns}}
                @can($permission.".create")
                    @if($create)
                        <a href="{{$create}}" class="btn-success float-right"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg></span>New</a>
                    @endif
                @endcan
                <div class="flex-none relative" x-data="{ openDrop: false }">
                    <label @click="openDrop = ! openDrop" class="btn-info float-right ml-2"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="18px" viewBox="0 0 24 24" width="18px" fill="currentColor"><g><rect fill="none" height="24" width="24"/></g><g><g><rect height="4" width="4" x="10" y="4"/><rect height="4" width="4" x="4" y="16"/><rect height="4" width="4" x="4" y="10"/><rect height="4" width="4" x="4" y="4"/><polygon
                                            points="14,12.42 14,10 10,10 10,14 12.42,14"/><path d="M20.88,11.29l-1.17-1.17c-0.16-0.16-0.42-0.16-0.58,0L18.25,11L20,12.75l0.88-0.88C21.04,11.71,21.04,11.45,20.88,11.29z"/><polygon points="11,18.25 11,20 12.75,20 19.42,13.33 17.67,11.58"/><rect height="4" width="4" x="16" y="4"/></g></g></svg></span></label>
                    <div x-show="openDrop" @click.away="openDrop = false" class="absolute z-10 bg-white top-10 right-0 border border-b-0 shadow rounded " style="display: none">
                        @foreach($fields as $k=>$val)
                            <label class="block w-full whitespace-nowrap text-left cursor-pointer p-2 border-b"><input type="checkbox" wire:model="fields.{{$k}}"> <span class="whitespace-nowrap">{{ucfirst(str_replace(['-', '_'], ' ', $k))}}</span></label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div x-show="open" class="w-full p-2 border-t" style="display: none;">
            {{$filter}}
        </div>
    </div>

    <div class="w-full block p-0  overflow-auto">
        {{$slot}}
    </div>
    <div class="w-full flex border-t">
        {!! $footer !!}
    </div>
</div>
