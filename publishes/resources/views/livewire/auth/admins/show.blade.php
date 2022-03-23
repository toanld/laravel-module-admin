<div class="w-full min-h-screen">
    <x-lma.header-page group="Auth Admins" page="Show" />
    <x-lma.box.show listing="{{route('admin.auth.admins')}}" edit="{{route('admin.auth.admins.edit',['record_id'=>$data->id])}}">
        <table class="table max-w-screen-lg border">
            <tr><th class="text-right w-48 border-r">Id:</th><td>{{$data->id}}</td></tr>
            <tr><th class=" text-right border-r">Name:</th><td >{{$data->name}}</td></tr>
            <tr><th class=" text-right border-r">Email:</th><td >{{$data->email}}</td></tr>
            <tr><th class=" text-right border-r">Is admin:</th><td ><x-lma.label.toggle :val="$data->is_admin" /></td></tr>
            <tr><th class=" text-right border-r">Roles:</th><td ><x-lma.label.tags :params="$data->roles->pluck('title')" /></td></tr>
            <tr><th class=" text-right border-r">Email verified at:</th><td >{{$data->email_verified_at}}</td></tr>
            <tr><th class=" text-right border-r">Current team id:</th><td >{{$data->current_team_id}}</td></tr>
            <tr><th class=" text-right border-r">Profile photo path:</th><td >{{$data->profile_photo_path}}</td></tr>

            <tr><th class="text-right border-r">Created at:</th><td>{{$data->created_at}}</td></tr>
            <tr><th class="text-right border-r">Updated at:</th><td>{{$data->updated_at}}</td></tr>
        </table>
    </x-lma.box.show>
</div>
