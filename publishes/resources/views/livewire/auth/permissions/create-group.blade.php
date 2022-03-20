<div class="w-full min-h-screen">
    <x-lma.header-page group="Auth/Permissions" page="Create"/>
    <x-lma.box.create listing="{{route('admin.auth.permissions')}}">
        <x-lma.form.input type="text" name="name" label="Name"/>
        <x-lma.form.input type="text" name="title" label="Title"/>
        <x-lma.form.select name="parent_id" label="Parent" :default="['ROOT']" :params="$parents"/>
        <table>
            <tr>
                <th><span class=""><input type="checkbox" checked disabled /> View</span></th>
                <th><label class="cursor-pointer"><input type="checkbox" wire:model="create"> Create</label></th>
                <th><label class="cursor-pointer"><input type="checkbox" wire:model="edit"> Edit</label></th>
                <th><label class="cursor-pointer"><input type="checkbox" wire:model="delete"> Delete</label></th>
            </tr>
            <tr>
                <td>
                    <x-lma.form.checkbox-multi name="view_roles" label="View Roles" :params="$roles"/>
                </td>
                <td>
                    <x-lma.form.checkbox-multi name="create_roles" label="Create Roles" :params="$roles"/>
                </td>
                <td>
                    <x-lma.form.checkbox-multi name="edit_roles" label="Edit Roles" :params="$roles"/>
                </td>
                <td>
                    <x-lma.form.checkbox-multi name="delete_roles" label="Delete Roles" :params="$roles"/>
                </td>
            </tr>
        </table>
    </x-lma.box.create>
</div>
