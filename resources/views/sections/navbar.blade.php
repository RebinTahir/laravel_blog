<nav class="border-gray-200 bg-slate-200 dark:bg-gray-900 rounded-lg mx-5 mt-2">

    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4 md:justify-evenly bg-slate-200">
        <button data-collapse-toggle="navbar-language" type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
            aria-controls="navbar-language" aria-expanded="false">
            <span class="sr-only"> {{__("ap.menu")}}</span>
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        {{-- shown on small screens only --}}
        <h1 class="inline font-extrabold text-black md:hidden">{{ __('ap.appname') }}</h1>

        <div class="flex items-center md:order-2 bg-slate-200">
            <button type="button" data-dropdown-toggle="language-dropdown-menu"
                class="inline-flex cursor-pointer items-center justify-center rounded-lg px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 128C0 92.7 28.7 64 64 64H256h48 16H576c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H320 304 256 64c-35.3 0-64-28.7-64-64V128zm320 0V384H576V128H320zM178.3 175.9c-3.2-7.2-10.4-11.9-18.3-11.9s-15.1 4.7-18.3 11.9l-64 144c-4.5 10.1 .1 21.9 10.2 26.4s21.9-.1 26.4-10.2l8.9-20.1h73.6l8.9 20.1c4.5 10.1 16.3 14.6 26.4 10.2s14.6-16.3 10.2-26.4l-64-144zM160 233.2L179 276H141l19-42.8zM448 164c11 0 20 9 20 20v4h44 16c11 0 20 9 20 20s-9 20-20 20h-2l-1.6 4.5c-8.9 24.4-22.4 46.6-39.6 65.4c.9 .6 1.8 1.1 2.7 1.6l18.9 11.3c9.5 5.7 12.5 18 6.9 27.4s-18 12.5-27.4 6.9l-18.9-11.3c-4.5-2.7-8.8-5.5-13.1-8.5c-10.6 7.5-21.9 14-34 19.4l-3.6 1.6c-10.1 4.5-21.9-.1-26.4-10.2s.1-21.9 10.2-26.4l3.6-1.6c6.4-2.9 12.6-6.1 18.5-9.8l-12.2-12.2c-7.8-7.8-7.8-20.5 0-28.3s20.5-7.8 28.3 0l14.6 14.6 .5 .5c12.4-13.1 22.5-28.3 29.8-45H448 376c-11 0-20-9-20-20s9-20 20-20h52v-4c0-11 9-20 20-20z"/></svg>
                {{-- chosen language --}}
                
                <span id="chosenlang" class="mx-2">

                    @if(App::getLocale() == "en")
                    English (EN)
                    @elseif(App::getLocale() == "ar")
                    Arabic (AR)
                    @elseif(App::getLocale() == "kr")
                    Kurdish (KR)
                    @endif
                    
                </span>


            </button>
            <!-- language Dropdown -->
            <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded-lg  text-base shadow dark:bg-gray-700"
                id="language-dropdown-menu">
                {{-- <a href="hidden  md:hidden  "> {{ __('ap.appname') }}</a> --}}

                <ul class="py-2 font-medium" role="none">
                    <li>
                        <button onclick="mtranslate('en')"
                            class="block w-full text-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400
                             dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">
                            <div class="inline-flex items-center">
                              
                                English
                            </div>
                        </button>
                    </li>
                    <li>
                        <button onclick="mtranslate('ar')"
                            class="w-full text-center block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">
                            <div class="inline-flex items-center">
                              
                                Arabic
                            </div>
                        </button>
                    </li>
                    <li>
                        <button onclick="mtranslate('kr')"
                            class=" w-full text-center block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">
                            <div class="inline-flex items-center">
                              
                                Kurdish
                            </div>
                        </button>
                    </li>



                </ul>
            </div>




        </div>


        <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto bg-slate-200" id="navbar-language">
            <ul
                class="mt-4 flex flex-col rounded-lg border border-gray-100  p-4 font-medium dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-8 md:border-0  md:p-0 md:dark:bg-gray-900">
                <li>
                    <a href="{{ route('home') }}"
                        class="block rounded bg-blue-700 py-2 pl-3 pr-4 text-white md:bg-transparent md:p-0 md:text-blue-700 md:dark:text-blue-500"
                        aria-current="page">{{ __('ap.home') }}</a>
                </li>

                <li>
                    <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown"
                        class="flex w-full items-center justify-between rounded py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-blue-500 md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-600 md:dark:hover:bg-transparent md:dark:hover:text-blue-500">
                        {{ __('ap.lessons') }}
                        <svg class="ml-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                        class="block rounded py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500">About</a>
                </li>

            </ul>
        </div>
    </div>
    {{-- this is mega menu drop down for links and website sections --}}
    <div id="mega-menu-full-dropdown"
        class="mt-1 hidden border-y border-gray-200 shadow-sm dark:border-gray-600 dark:bg-gray-800 bg-slate-300">
        <div class="mx-auto grid max-w-screen-xl px-4 py-5 text-gray-900 dark:text-white sm:grid-cols-2 md:px-6">
            <ul>
                <li>
                    <a href="#" class="block rounded-lg p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="font-semibold">Online Stores</div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that
                            you're already using.</span>
                    </a>
                </li>

            </ul>
            <ul>
                <li>
                    <a href="#" class="block rounded-lg p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="font-semibold">Marketing CRM</div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that
                            you're already using.</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
