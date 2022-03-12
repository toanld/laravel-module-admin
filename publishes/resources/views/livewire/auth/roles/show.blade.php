<div class="w-full min-h-screen">
    <x-lma-header-page group="Auth Roles" page="Show"/>
    <x-lma-box-show listing="{{route('admin.auth.roles')}}" edit="{{route('admin.auth.roles.edit',['record_id'=>$data->id])}}">
        <tr>
            <th class="text-right w-48 border-r">Id:</th>
            <td>{{$data->id}}</td>
        </tr>
        <tr>
            <th class=" text-right border-r">Name:</th>
            <td>{{$data->name}}</td>
        </tr>
        <tr>
            <th class=" text-right border-r">Title:</th>
            <td>{{$data->title}}</td>
        </tr>
        <tr>
            <th class=" text-right border-r">Permissions:</th>
            <td>
                @php
                    $permissions = $data->permissions->reduce(function ($rt,$item){
                                    if($item->parent_id ==0){
                                        $rt[$item->id]["parent"] = $item;
                                    }else{
                                        $rt[$item->parent_id]["children"][] = $item;
                                    }
                                    return $rt;
                        },[])
                @endphp
                @foreach($permissions as $permission)
                    <div class="block">
                        @if(isset($permission["parent"]))
                            <span class="text-blue-500 font-bold">{{$permission["parent"]['title']}}: </span>
                            <span class="text-red-500 font-bold">View </span>
                        @endif
                        @if(isset($permission["children"]))
                            @foreach($permission["children"] as $child)
                                <span class="text-red-500 font-bold">,{{$child->title}} </span>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </td>
        </tr>
        <tr>
            <th class="text-right border-r">Created at:</th>
            <td>{{$data->created_at}}</td>
        </tr>
        <tr>
            <th class="text-right border-r">Updated at:</th>
            <td>{{$data->updated_at}}</td>
        </tr>
    </x-lma-box-show>
</div>
