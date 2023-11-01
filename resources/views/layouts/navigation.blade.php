

<div>
  <div class="bg-white">
        <div class="p-2 text-gray-900">
            <div style="float:left;margin-top:16px;">
                <button id="toggle-button" style="transform:scale(1.7);margin-left:280px;"><ion-icon name="menu-outline"></ion-icon></button>
            </div>
                        <div class="user">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3  border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div style="margin-right:6px;">
                                            @php
                                                $profile = auth()->user()->profile;
                                            @endphp
                                            @if(!empty($profile))
                                                <img src="{{Auth::user()->profile}}" name="profile" alt="" style="border-radius:50%;height:30px;width:30px;">
                                            @else
                                            <img src="{{asset('assets/img/customer01.jpg')}}" alt="" style="border-radius:50%;height:30px;width:30px;">
                                            @endif
                                        </div>
                                        <div class="user-name">{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" >
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>

                                    </form>    

                                       
                                </x-slot>
                            </x-dropdown>
                        </div>
        </div>
    </div>
</div>



