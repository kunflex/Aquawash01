<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="wash_point" style="font-size:20px;">Washing Point</a>/<a href="">Form</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Washing Points") }}</strong><hr></center>
                    <div style="margin-top:25px;margin-bottom:15px;">
                        <form action="{{url('add_location')}}" method="post">
                            @csrf
                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="name" :value="__('Washing Point Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="address" :value="__('Location')" />
                                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="category" :value="__('Category')" />
                                    <select id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" required autofocus autocomplete="username" style="border-radius:6px;border:1px solid #ddd;">
                                    <option value="">---Select Category---</option>
                                    <option value="Laundry">Laundry</option>
                                    <option value="Car">Car</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="contact" :value="__('Contact')" />
                                    <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                                </div><br>

                                <button class="block mt-1 w-full" style="background-color:#0096FF;color:white;padding:10px;border-radius:6px;"><ion-icon name="send" style="margin-top:8px;margin-right:7px"></ion-icon>Submit</button>
                           
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div><br><br>

</x-app-layout>
