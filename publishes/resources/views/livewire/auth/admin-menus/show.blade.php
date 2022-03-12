<div class="w-full min-h-screen">
    <x-lma-header-page group="Auth Adminmenus" page="Show" />
    <x-lma-box-show listing="{{route('admin.auth.admin-menus')}}" edit="{{route('admin.auth.admin-menus.edit',['record_id'=>$data->id])}}">
        <tr><th class="text-right w-48 border-r">Id:</th><td>{{$data->id}}</td></tr>
        <tr><th class=" text-right border-r">Name:</th><td >{{$data->name}}</td></tr>
		<tr><th class=" text-right border-r">Parent:</th><td >{{$data->parent->name}}</td></tr>
		<tr><th class=" text-right border-r">Sort:</th><td >{{$data->sort}}</td></tr>
		<tr><th class=" text-right border-r">Icon:</th><td >{{$data->icon}}</td></tr>
		<tr><th class=" text-right border-r">Route:</th><td >{{$data->route}}</td></tr>
		<tr><th class=" text-right border-r">Roles:</th><td ><x-lma-tags :params="$data->roles->pluck('title')"></x-lma-tags></td></tr>
        <tr><th class="text-right border-r">Created at:</th><td>{{$data->created_at}}</td></tr>
        <tr><th class="text-right border-r">Updated at:</th><td>{{$data->updated_at}}</td></tr>
        @if($data->children->isNotEmpty())
            <tr><th class="text-right border-r">Children:</th><td>
                    @foreach($data->children as $child)
                        <a class="block" href="{{route("admin.auth.admin-menus.show",$child->id)}}">{{$child->name}}</a>
                    @endforeach
                </td></tr>
         @endif

    </x-lma-box-show>
</div>
