<div class="p-5">

    @session('message')

    @include('notification.toast',['message' => session('message')])

    @endsession


    <div class="">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            {{ $title }}
        </h1>
    </div>

    {{-- button for add user and click handling --}}
    <div class="">
        <button type="button" wire:click="click"
            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
            Click Me !
        </button>
        <button type="button" wire:click="createUser"
            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
            Add Random User
        </button>
    </div>

    {{-- input for user --}}


    @include('component.form')

    {{-- table users --}}
    @include('component.table')
    <div class="p-5">
        {{ $users->Links("vendor.pagination.simple-tailwind") }}
    </div>

</div>