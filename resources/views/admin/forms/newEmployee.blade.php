<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="employee" style="font-size:20px;">Employee list</a>/<a href="newEmployee" style="font-size:20px;">Form</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <center><strong style="font-size:20px;">{{ __("Registered New Employee") }}</strong><hr></center><br>
                     
                    <form method="POST" action="{{ url('create_new_employee') }}">
                        @csrf

                        <!-- === Profile Upload === -->
                        <div style="margin-right:6px;display:inline-flex;gap:12px;">
                            <div>
                                <img src="{{asset('assets/img/avarta.png')}}"  id="uploadedAvatar" alt="user-avatar" style="background-color:whitesmoke;border-radius:10px;height:110px;width:110px;">
                                <p class="text-muted mb-0" style="color:gray;">Allowed JPG or PNG</p>  
                            </div>
                            <div>
                                    <label  for="upload" tabindex="0" style="margin-top:75px;box-shadow:0px 3px 6px #ddd;padding:7px;background-color:blue;color:white;border-radius:6px;">Upload
                                        <input type="file" id="upload" name="profile" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                                    </label>
                                    <button type="button" class="account-image-reset" style="margin-top:75px;box-shadow:0px 3px 6px #ddd;transform:scale(0.9);padding:7px;background-color:darkred;color:white;border-radius:6px;">Remove</button>
                            </div>
                        </div><br><br>

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Gender -->
                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="gender" :value="__('Gender')" />
                                    <select id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" required autofocus autocomplete="username" style="border-radius:6px;border:1px solid #ddd;">
                                    <option value="">---Select Gender---</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                         <!-- location -->
                         <div class="mt-4">
                            <x-input-label for="location" :value="__('Location')" />
                            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>


                        <!-- Category -->
                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="category" :value="__('Category')" />
                                    <select id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" required autofocus autocomplete="username" style="border-radius:6px;border:1px solid #ddd;">
                                    <option value="">---Select Category---</option>
                                    <option value="Laundry">Laundry</option>
                                    <option value="Car">Car</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>


                        <!-- Branch  -->
                                        <div  style="width:100%;margin-top:20px;">
                                            <x-input-label for="branch" :value="__('Select Branch')" />
                                            <select id="branch" class="preview-input" type="text" name="branch" :value="old('branch')" required autofocus autocomplete="username"  data-preview="#preview13">
                                                <option value="---Select a Branch Item  ---">---Select a Branch  ---</option>
                                                @foreach($branch as $branch)
                                                <option value="{{$branch->name}}, {{$branch->address}}">
                                                    <tr>
                                                        <td>{{$branch->name}},</td>
                                                        <td>{{$branch->address}}</td>
                                                        <td>--{{$branch->category}}</td>
                                                    </tr>
                                                </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('branch')" class="mt-2" />
                                        </div>


                        <!-- Emergency Info -->
                                <div style="display:inline-flex;width:100%;gap:30px;">
                                    <div  style="width:100%;margin-top:20px;">
                                        <x-input-label for="emergency_person" value="Emergency Person's Name" />
                                        <input id="emergency_person" class="preview-input" type="text" name="emergency_person" :value="old('emergency_person')" required autofocus autocomplete="username" data-preview="#preview14" />
                                        <x-input-error :messages="$errors->get('emergency_person')" class="mt-2" />
                                    </div>

                                    <div  style="width:100%;margin-top:20px;">
                                        <x-input-label for="emergency_person_contact" value="Person's Contact" />
                                        <input id="emergency_person_contact" class="preview-input" type="text" name="emergency_person_contact" :value="old('emergency_person_contact')" required autofocus autocomplete="username" data-preview="#preview15" />
                                        <x-input-error :messages="$errors->get('emergency_person_contact')" class="mt-2" />
                                    </div>
                                </div>

                        

                        <div class="flex items-center justify-end mt-4">
                        
                            <button class="block mt-1 w-full" style="background-color:#0096FF;color:white;padding:10px;border-radius:6px;"><ion-icon name="send" style="margin-top:8px;margin-right:7px"></ion-icon>{{ __('Register') }}</button>
                                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><br><br>
</x-app-layout>
