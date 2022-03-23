<div class="w-full min-h-screen">
    <x-lma.header-page group="Auth/ Admins" page="Listing"/>
    <x-lma.box.listing :fields="$fields" class="min-h-screen" permission="admins." create="{{route('admin.auth.admins.create')}}">
        <x-slot name="filter">
            <div class="w-full max-w-screen-lg">
                <x-lma.form.input type="text" name="fid" label="Id" placeholder="Id..."/>
            </div>
        </x-slot>
        <table class="table">
            <thead>
            <tr>
                <th class="w-10">ID</th>
                @if(data_get($fields,'name'))<th>Name</th> @endif
                @if(data_get($fields,'email'))<th>Email</th> @endif
                @if(data_get($fields,'roles'))<th>Roles</th> @endif
                @if(data_get($fields,'email_verified_at'))<th>Email verified at</th> @endif
                @if(data_get($fields,'is_admin'))<th>Is admin</th> @endif

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
					@if(data_get($fields,'email'))<td>{{$row->email}}</td> @endif
					@if(data_get($fields,'roles'))<td><x-lma.label.tags :params="$row->roles->pluck('title','id')" /></td> @endif
                    @if(data_get($fields,'email_verified_at'))<td>{{$row->email_verified_at}}</td> @endif
                    @if(data_get($fields,'is_admin'))<td> <x-lma.btn.toggle :val="$row->is_admin" wire:change="toggleField({{$row->id}},'is_admin')" /></td>@endif
                    @if(data_get($fields,'created_at'))<td>{{$row->created_at}}</td> @endif
                    @if(data_get($fields,'updated_at'))<td>{{$row->updated_at}}</td> @endif
                    <td>
                        <div class="flex flex-row justify-end space-x-1">
                            <x-lma.btn.show href="{{route('admin.auth.admins.show',['record_id'=>$row->id])}}"></x-lma.btn.show>
                            @can('admins.edit')
                                <x-lma.btn.edit href="{{route('admin.auth.admins.edit',['record_id'=>$row->id])}}"></x-lma.btn.edit>
                            @endcan
                            @can("admins.delete")
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
