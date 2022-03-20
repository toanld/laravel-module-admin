<div class="w-full min-h-screen">
    <x-lma.header-page group="Auth/Roles" page="Listing"/>
    <x-lma.box.listing :fields="$fields" class="min-h-screen" permission="roles" create="{{route('admin.auth.roles.create')}}">
        <x-slot name="filter">
            <div class="w-full max-w-screen-lg">
                <x-lma.form.input type="text" name="fid" label="Id" placeholder="Id..."/>
            </div>
        </x-slot>
        <table class="w-full">
            <thead>
            <tr>
                <th class="w-10">ID</th>
                @if(data_get($fields,'name'))<th>Name</th> @endif
					@if(data_get($fields,'title'))<th>Title</th> @endif
					@if(data_get($fields,'permissions'))<th>Permissions</th> @endif

                @if(data_get($fields,'created_at'))<th>Created at</th> @endif
                @if(data_get($fields,'updated_at'))<th>Updated at</th> @endif
                <th class="w-20 text-right">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
                <tr>
                    <th>{{$row->id}}</th>
                    @if(data_get($fields,'name'))<td>{{$row->name}}</td> @endif
					@if(data_get($fields,'title'))<td>{{$row->title}}</td> @endif
					@if(data_get($fields,'permissions'))
                        <td><x-lma.label.tags :params="$row->permissions->pluck('title','id')" /></td>
                    @endif
                    @if(data_get($fields,'created_at'))<td>{{$row->created_at}}</td> @endif
                    @if(data_get($fields,'updated_at'))<td>{{$row->updated_at}}</td> @endif
                    <td>
                        <div class="flex flex-row justify-end space-x-1">
                            <x-lma.btn.show href="{{route('admin.auth.roles.show',['record_id'=>$row->id])}}"></x-lma.btn.show>
                            @can('roles.edit')
                                <x-lma.btn.edit href="{{route('admin.auth.roles.edit',['record_id'=>$row->id])}}"></x-lma.btn.edit>
                            @endcan
                            @can("roles.delete")
                                <x-lma.btn.delete :record="$row->id" :confirm="$confirm"></x-lma.btn.delete>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <x-slot name="footer">
            <div class="w-full flex">
                <div class="flex-auto p-2 pb-4">
                    {{$data->links()}}
                </div>
            </div>
        </x-slot>
    </x-lma.box.listing>
</div>
