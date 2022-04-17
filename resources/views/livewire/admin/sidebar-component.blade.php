<nav x-cloak @click.outside="nav = false" class="md:block overflow-x-hidden overflow-y-hidden shadow-2xl bg-white inset-y-0 z-10 fixed md:relative flex-shrink-0 w-64 overflow-y-auto bg-white dark:bg-darkSidebar"
     :class="{'hidden': nav == false}">
    <div class="h-14 border-b dark:border-gray-600 flex px-4 py-2 gap-3">
        <span class="w-10 h-10 rounded-full bg-purple-600 border dark:border-gray-600 shadow-xl"></span>
        <span class="my-auto text-xl text-gray-500 font-mono dark:text-gray-300">Atomize</span>
    </div>
    @auth
    <div class="h-16 border-b dark:border-gray-600 flex px-4 py-2 gap-3">
        <span class="w-10 h-10 rounded-full bg-indigo-600 border dark:border-gray-600 shadow-xl"></span>
        <span class="my-auto text-sm text-gray-600 font-medium dark:text-gray-300">{{auth()->user()->name}}</span>
    </div>
    @endauth
    <div class="m-2 mt-4 flex">
        <input type="search"  class="border dark:border-gray-500 dark:bg-gray-600 dark:placeholder-gray-300 text-gray-200 text-sm border-gray-300 bg-gray-100 px-2 w-48 h-9 rounded-md rounded-r-none" placeholder="Search">
        <a href="" class="border  dark:bg-gray-600 border-gray-300 dark:border-gray-500 bg-gray-100 rounded-l-none p-2 h-9 rounded-md"><x-h-o-search class="w-5 text-gray-600 dark:text-gray-200"/></a>
    </div>
    <div class="overflow-hidden h-screen scrollbar-none overflow-y-scroll scrollbar-thumb-gray-400 scrollbar-track-white  scrollbar-thin">
        <div class="capitalize">
            <x-menu :route="'admin.home'"><x-slot name="icon"><x-h-o-home class="w-5"/></x-slot> Dashboard</x-menu>
            <x-menu :route="'admin.atom'"><x-slot name="icon"><x-h-o-home class="w-5"/></x-slot> Learn Atoms</x-menu>
            <x-menu :route="'practise.index'"><x-slot name="icon"><x-h-o-home class="w-4"/></x-slot> practise</x-menu>
            <x-menu :route="'admin.quiz'"><x-slot name="icon"><x-h-o-home class="w-5"/></x-slot> Quiz</x-menu>


{{--            <div  x-data="{setup: @if(Route::is('admin.*')) true @else false @endif}">--}}
{{--                <div @click="setup= !setup"  class="subNavMenuLink {{Route::is('admin.*')?'subNavActive':'subNavInactive'}}">--}}
{{--                    <x-h-o-home class="w-5"/><span class="">{{__('setup')}}</span>--}}
{{--                    <x-h-o-chevron-left x-show="!setup" class="w-4 ml-auto"/><x-h-o-chevron-down x-show="setup" class="w-4 ml-auto"/>--}}
{{--                </div>--}}

{{--                <div x-cloak x-show="setup" class="" x-collapse--}}
{{--                     x-transition:enter="transition ease-out duration-300"--}}
{{--                     x-transition:enter-start="opacity-0 scale-90"--}}
{{--                     x-transition:enter-end="opacity-100 scale-100"--}}
{{--                     x-transition:leave="transition ease-in duration-300"--}}
{{--                     x-transition:leave-start="opacity-100 scale-100"--}}
{{--                     x-transition:leave-end="opacity-0 scale-90">--}}
{{--                    <x-sub-menu :route="'admin.home'"><x-slot name="icon"><x-h-o-home class="w-4"/></x-slot> Dashboard</x-sub-menu>--}}
{{--                    <x-sub-menu :route="'admin.atom'"><x-slot name="icon"><x-h-o-home class="w-4"/></x-slot> Atoms</x-sub-menu>--}}
{{--                    <x-sub-menu :route="'admin.alpine'"><x-slot name="icon"><x-h-o-home class="w-4"/></x-slot> Alpine</x-sub-menu>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div  x-data="{artisan: false}">--}}
{{--                <div @click="artisan= !artisan"  class="navMenuLink navInactive">--}}
{{--                    <x-h-o-home class="w-5"/><span class="">{{__('Artisan')}}</span>--}}
{{--                    <x-h-o-chevron-left x-show="!artisan" class="w-4 ml-auto"/><x-h-o-chevron-down x-show="artisan" class="w-4 ml-auto"/>--}}
{{--                </div>--}}
{{--                <div x-cloak x-show="artisan" class="" x-collapse>--}}
{{--                    <x-sub-menu :route="'optimize'"><x-slot name="icon"><x-h-o-home class="w-4"/></x-slot> opt</x-sub-menu>--}}
{{--                    <x-sub-menu :route="'migrate'"><x-slot name="icon"><x-h-o-home class="w-4"/></x-slot> mgr</x-sub-menu>--}}
{{--                    <x-sub-menu :route="'migrate.fresh'"><x-slot name="icon"><x-h-o-home class="w-4"/></x-slot> mfs</x-sub-menu>--}}
{{--                    <x-sub-menu :route="'migrate.rollback'"><x-slot name="icon"><x-h-o-home class="w-4"/></x-slot> mrb</x-sub-menu>--}}
{{--                    <x-sub-menu :route="'db.seed'"><x-slot name="icon"><x-h-o-home class="w-4"/></x-slot> dbs</x-sub-menu>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</nav>
