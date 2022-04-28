
<div class="container flex flex-col mx-auto w-full items-center justify-center">
    <div class="flex items-center justify-center mb-2">
        <span class="text-purple-500 dark:text-white capitalize">@lang('users according to their activities')</span>
    </div>
    <ul class="flex flex-col">
        @foreach($users as $i => $user)
        <li class="border-gray-400 flex flex-row mb-2">
            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md flex flex-1 space-x-3 items-center p-4">
                <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                    <a href="#" class="block relative">
                        <img alt="profil" src="https://www.gravatar.com/avatar/{{md5($user->email)}}?d=mp" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                    </a>
                </div>
                <div class="flex-1 md:mr-16">
                    <div class="font-medium dark:text-white">{{$user->name}}</div>
                    <div class="text-gray-600 dark:text-gray-200 text-xs">{{\Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}</div>

                </div>
                <div class="flex flex-col gap-2">
                    <div class="text-gray-600 dark:text-gray-200 text-sm">@lang('total point:') {{$user->point()}}</div>
                    <div class="text-gray-600 dark:text-gray-200 text-xs">@lang('average point:') {{$user->avgpoint()}}</div>
                </div>
            </div>
        </li>
        @endforeach

    </ul>
    <div class="mx-auto my-4 px-4">
        {{ $users->links() }}
    </div>
</div>
