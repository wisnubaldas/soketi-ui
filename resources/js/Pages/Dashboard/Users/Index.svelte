<script>
    import Dashboard from "../../../Components/Layouts/Dashboard.svelte"

    export let users;
</script>

<svelte:head>
  <title>Users | Soketi UI</title>
</svelte:head>

<Dashboard items="default" page="users">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 pb-4">
        <h1 class="text-2xl font-semibold text-gray-900">Users</h1>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="space-y-4">
            <div class="flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                      <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Permissions</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                          {#each users as user}
                          <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{user.name}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{user.email}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{user.permissions}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                              <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {user.name}</span></a>
                            </td>
                          </tr>
                          {/each}
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</Dashboard>