<div class="w-full min-h-screen">
    <x-lma-header-page group="Auth/Permissions" page="Listing"/>
    <x-lma-box-listing :fields="$fields" class="min-h-screen" permission="permissions" create="{{route('admin.auth.permissions.create')}}">
        <x-slot name="filter">
            <div class="w-full max-w-screen-lg">
                <x-lma-form-input type="text" name="fid" label="Id" placeholder="Id..."/>
            </div>
        </x-slot>
        <div class="w-full p-2">
            @foreach($data as $row)
                <div class="w-full">
                    <div class="w-full flex border items-center bg-gray-50 my-1 space-x-2 pr-1">
                        <span class="flex-none font-bold border-r p-2">{{$row->id}}</span>
                        @if(data_get($fields,'title'))  <span class="flex-none font-bold">{{$row->title}}</span>@endif
                        @if(data_get($fields,'name'))  <span class="flex-none text-red-500 font-bold">  {{$row->name}} </span>@endif
                        <div class="flex-auto"> @if(data_get($fields,'roles')) <x-lma-tags :params="$row->roles->pluck('title')"/>@endif</div>
                        @if(data_get($fields,'created_at'))<span class=" tex-xs">created: {{$row->created_at}}</span> @endif
                        @if(data_get($fields,'updated_at'))<span class=" text-xs">updated: {{$row->updated_at}}</span> @endif
                        <div class="flex-none flex flex-row  justify-end space-x-1">
                            <x-lma-btn-show href="{{route('admin.auth.permissions.show',['record_id'=>$row->id])}}"></x-lma-btn-show>
                            @can('permissions.edit')
                                <x-lma-btn-edit href="{{route('admin.auth.permissions.edit',['record_id'=>$row->id])}}"></x-lma-btn-edit>
                            @endcan
                            @can("permissions.delete")
                                <x-lma-btn-delete :record="$row->id" :confirm="$confirm"></x-lma-btn-delete>
                            @endcan
                        </div>
                    </div>
                    @if($row->children)
                        <div class="w-full pl-8">
                            @foreach($row->children as $child)
                                <div class="w-full flex border bg-gray-50 items-center pr-1 space-x-2 my-1">
                                    <span class="flex-none font-bold border-r p-2 ">{{$child->id}}</span>
                                    @if(data_get($fields,'title'))  <span class="flex-none font-bold">{{$child->title}}</span>@endif
                                    @if(data_get($fields,'name'))  <span class="flex-none text-red-500 font-bold ">  {{$child->name}} </span>@endif
                                    <div class="flex-auto"> @if(data_get($fields,'roles')) <x-lma-tags :params="$row->roles->pluck('title')"/>@endif</div>
                                    @if(data_get($fields,'created_at'))<span class=" tex-xs">created: {{$child->created_at}}</span> @endif
                                    @if(data_get($fields,'updated_at'))<span class="text-xs">updated: {{$child->updated_at}}</span> @endif

                                    <div class="flex-none flex flex-row justify-end space-x-1">
                                        <x-lma-btn-show href="{{route('admin.auth.permissions.show',['record_id'=>$child->id])}}"></x-lma-btn-show>
                                        @can('permissions.edit')
                                            <x-lma-btn-edit href="{{route('admin.auth.permissions.edit',['record_id'=>$child->id])}}"></x-lma-btn-edit>
                                        @endcan
                                        @can("permissions.delete")
                                            <x-lma-btn-delete :record="$child->id" :confirm="$confirm"></x-lma-btn-delete>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <x-slot name="footer">
            <div class="w-full flex">
                <div class="flex-auto p-2 pb-4">
                    {{$data->links()}}
                </div>
            </div>
        </x-slot>
    </x-lma-box-listing>
</div>
