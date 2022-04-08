<script>
    import { Inertia } from '@inertiajs/inertia'
    import { fade } from 'svelte/transition';

    import Button from "../Inputs/Button.svelte"
    import Text from "../Inputs/Text.svelte"
    import Select from 'svelte-select';

    export let user;

    const permissions = [
        {value: 'admin', label: 'Admin'},
        {value: 'standard', label: 'Standard'},
    ];

    function handlePermissionsSelect(event) {
        user.permissions = [];
        if (event.detail != null) event.detail.forEach(event => user.permissions.push(event.value));
    }

    function getPermissions() {
        if (user.permissions == null) return;
        return permissions.filter(event => user.permissions.includes(event.value));
    }

    function cancel() {
        user = false;
    }

    function submit() {
        Inertia.post('/users', user);
        user = false;
    }
</script>

<div transition:fade="{{ duration: 200 }}" class="fixed z-20 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div on:click={cancel} class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="opacity-100 translate-y-0 sm:scale-100 relative inline-block align-bottom bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
        <div class="bg-white p-4 rounded-lg ">
            <div class="flex items-center pb-2 w-full">
                <h1 class="text-xl font-semibold">Add/Edit User</h1>
            </div>
            <div class="w-full grid grid-cols-1 gap-2">
                <div>
                    <h1 class="font-semibold">Name</h1>
                    <Text bind:input={user['name']} />
                </div>
                <div>
                    <h1 class="font-semibold">Email</h1>
                    <Text bind:input={user['email']} />
                </div>
                <div class="w-full flex space-x-2 pt-2">
                    <div class="w-full">
                        <h1 class="font-semibold">Permissions</h1>
                        <Select on:select={handlePermissionsSelect} isMulti={true} items={permissions} value={getPermissions()}></Select>
                    </div>
                </div>
                <div class="w-full pt-4">
                    <div on:click={submit} class="ml-auto text-right">
                        <Button label="Save" />
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
