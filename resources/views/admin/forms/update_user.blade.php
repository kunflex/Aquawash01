<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="account_details" style="font-size:20px;">Account Details</a>/<a href="" style="font-size:20px;">Update</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <center><strong style="font-size:20px;">{{ __("Update User Details") }}</strong><hr></center><br>
                        
                        @if($query)
                        <form method="POST" action="{{ url('updateusers/'.$query->id) }}">
                            @csrf

                            @method('PUT')
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$query->name}}" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$query->email}}" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Phone -->
                            <div class="mt-4">
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{$query->phone}}" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <!-- role_id -->
                            <div class="mt-4">
                                <x-input-label for="role_id" :value="__('Role Type')" />
                                <select id="role_id" style="border-radius:7px;border-color:#ddd;" class="block mt-1 w-full" name="role_id" value="role_id">
                                <option value="">--choose Role Type--</option>
                                <option value="1">admin</option>
                                <option value="2">user</option>
                                </select>
                                <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
                            </div>


                        
                            <!--  Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4" style="gap:30px;">
                            
                                <button class="block mt-1 w-full" style="background-color:#0096FF;color:white;padding:10px;border-radius:6px;"><ion-icon name="send" style="margin-top:8px;margin-right:7px"></ion-icon>{{ __('Update details') }}</button>
                                              
                            </div>
                        </form>
                        @else
                            <script>window.location = "{{ url()->previous() }}";</script>
                        @endif
                        <br>
                        <a href="{{url('account_details')}}" ><button class="block mt-1 w-full" style="background-color:red;color:white;padding:10px;border-radius:6px;">{{ __('Cancel') }}</button></a>
                                  
                    </div>
            </div>
        </div>
    </div><br><br><br>


</x-app-layout>

