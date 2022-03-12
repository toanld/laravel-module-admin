<div class="w-full min-h-screen">
    <x-lma-header-page group="Auth Permissions" page="Show" />
    <x-lma-box-show listing="{{route('admin.auth.permissions')}}" edit="{{route('admin.auth.permissions.edit',['record_id'=>$data->id])}}">
        <tr><th class="text-right w-48 border-r">Id:</th><td>{{$data->id}}</td></tr>
        <tr><th class=" text-right border-r">Name:</th><td >{{$data->name}} (View)</td></tr>
		<tr><th class=" text-right border-r">Title:</th><td >{{$data->title}}</td></tr>
        <tr><th class=" text-right border-r">Roles:</th><td><x-lma-tags :params="$data->roles->pluck('title')" /></td></tr>
        <tr><th class="text-right border-r">Children:</th><td>
                @foreach($data->children as $child)
                    <span class="text-red-600 font-bold block">{{$child->title}}</span>
                @endforeach

            </td></tr>
        <tr><th class="text-right border-r">Created at:</th><td>{{$data->created_at}}</td></tr>
        <tr><th class="text-right border-r">Updated at:</th><td>{{$data->updated_at}}</td></tr>


    </x-lma-box-show>
</div>
