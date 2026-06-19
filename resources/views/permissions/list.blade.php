<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
        @can('create permissions')
        <a href="{{route('permissions.create')}}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
        @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <table class="w-full ">
                <thead class="bg-gray-50">
                    <tr class="border-bottom">
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Created</th>
                        <th class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($permissions->isNotEmpty())
                        @foreach ($permissions as $permission)
                            <tr class="border-b">
                                <td class="px-6 py-3 text-left">
                                    {{$permission->id}}
                                </td>
                                <td class="px-6 py-3 text-left">
                                    {{$permission->name}}
                                </td>
                                <td class="px-6 py-3 text-left">
                                    {{\Carbon\Carbon::parse($permission->created_at)->format('d M, Y')}}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    @can('edit permissions')
                                    <a href="{{route('permissions.edit',$permission->id)}}" class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md text-white px-3 py-2">
                                        Edit
                                    </a>
                                    @endcan

                                     @can('delete permissions')
                                    <a href="{{route('permissions.destroy', $permission->id)}}"
                                        onclick="event.preventDefault();
                                        if(confirm('Are you sure?')){
                                            document.getElementById('delete-permission-{{ $permission->id }}').submit();
                                        }"
                                        class="bg-red-600 hover:bg-red-500 text-sm rounded-md text-white px-3 py-2">

                                            Delete

                                    </a>
                                    @endcan
                                    <form id="delete-permission-{{ $permission->id }}"
                                        action="{{route('permissions.destroy', $permission->id)}}"
                                        method="POST"
                                        class="hidden">

                                        @csrf
                                        @method('DELETE')

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{-- To show page links --}}
            <div class="my-3">
                {{$permissions->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
