<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="laundry_price_list" style="font-size:20px;">Laundry Price List</a>/<a href="laundry_new_item" style="font-size:20px;">Form</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Laundry Price") }}</strong><hr></center>
                    <div style="margin-top:25px;margin-bottom:15px;">
                    <form action="{{url('laundry_price_form')}}" method="post">
                            
                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="quantity" :value="__('Quantity')" />
                                    <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="item" :value="__('Item')" />
                                    <x-text-input id="item" class="block mt-1 w-full" type="text" name="item" :value="old('item')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('item')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="unit_price" value="Unit Price (₵)" />
                                    <x-text-input id="unit_price" class="block mt-1 w-full" type="text" name="unit_price" :value="old('unit_price')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('unit_price')" class="mt-2" />
                                </div><br>

                                <button class="block mt-1 w-full" style="background-color:#0096FF;color:white;padding:10px;border-radius:6px;"><ion-icon name="send" style="margin-top:8px;margin-right:7px"></ion-icon>Submit</button>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
