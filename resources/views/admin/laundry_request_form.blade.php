<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="laundry_request_form" style="font-size:20px;">Laundry Request Form</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Laundry Request Form") }}</strong><hr></center>
                    <div style="margin-top:25px;margin-bottom:15px;">
                        <form action="{{url('laundry_form')}}" method="post">

                            <div style="display:inline-flex;gap:30px;width:100%;">
                               <!-- car_brand Address -->
                                <div style="width:100%;">
                                    <x-input-label for="invoice" :value="__('#Invoice No.')" />
                                    <x-text-input id="laundry_invoice" class="block mt-1 w-full" type="text" name="laundry_invoice" :value="old('laundry_invoice')" required autofocus autocomplete="username"  readonly/>
                                    <x-input-error :messages="$errors->get('laundry_invoice')" class="mt-2" />
                                </div>

                                <div style="width:100%;">
                                    
                                </div>

                            </div>


                            <div style="display:inline-flex;gap:30px;width:100%;margin-top:20px;">
                               <!-- top_wear Address -->
                                <div style="width:100%;">
                                    <x-input-label for="Pick_up" :value="__('Pick up/Drop Date')" />
                                    <x-text-input id="pick_up" class="block mt-1 w-full" type="date" name="pick_up" :value="old('pick_up')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('pick_up')" class="mt-2" />
                                </div>

                                <div  style="width:100%;">
                                    <x-input-label for="Pick_up_time" :value="__('Pick up Time')" />
                                    <x-text-input id="Pick_up_time" class="block mt-1 w-full" type="time" name="Pick_up_time" :value="old('Pick_up_time')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('Pick_up_time')" class="mt-2" />
                                </div>

                            </div>

                            <div style="display:inline-flex;gap:30px;width:100%;">
                               <!-- top_wear Address -->
                                <div style="width:100%;margin-top:20px;">
                                    <x-input-label for="delivery_date" :value="__('Delivery Date')" />
                                    <x-text-input id="delivery_date" class="block mt-1 w-full" type="date" name="delivery_date" :value="old('delivery_date')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('delivery_date')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="delivery_time" :value="__('Delivery Time')" />
                                    <x-text-input id="delivery_time" class="block mt-1 w-full" type="time" name="delivery_time" :value="old('delivery_time')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('delivery_time')" class="mt-2" />
                                </div>

                            </div>

                            <div>

                                <div style="display:inline-flex;width:100%;gap:30px;">
                                    <div  style="width:100%;margin-top:20px;">
                                        <x-input-label for="customer_name" value="Customer's Name" />
                                        <x-text-input id="customer_name" class="block mt-1 w-full" type="text" name="customer_name" value="{{Auth::user()->name}}" required autofocus autocomplete="username"  readonly/>
                                        <x-input-error :messages="$errors->get('customer_name')" class="mt-2" />
                                    </div>

                                    <div  style="width:100%;margin-top:20px;">
                                        <x-input-label for="customer_number" value="Customer's Number" />
                                        <x-text-input id="customer_number" class="block mt-1 w-full" type="text" name="customer_number" value="{{Auth::user()->number}}" required autofocus autocomplete="username" readonly/>
                                        <x-input-error :messages="$errors->get('customer_number')" class="mt-2" />
                                    </div>
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="top_wear" :value="__('Topwear (T-Shirt, Shirt & Top)')" />
                                    <x-text-input id="top_wear" class="block mt-1 w-full" type="text" name="top_wear" :value="old('top_wear')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('top_wear')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="woolen_cloth" :value="__('Woolen Cloth')" />
                                    <x-text-input id="woolen_cloth" class="block mt-1 w-full" type="text" name="woolen_cloth" :value="old('woolen_cloth')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('woolen_cloth')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="jeans" :value="__('Jeans')" />
                                    <x-text-input id="jeans" class="block mt-1 w-full" type="text" name="jeans" :value="old('jeans')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('jeans')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="others" :value="__('Others')" />
                                    <x-text-input id="others" class="block mt-1 w-full" type="text" name="others" :value="old('others')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('others')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="service" :value="__('Service')" />
                                    <select id="service" class="block mt-1 w-full" type="text" name="service" :value="old('service')" required autofocus autocomplete="username" style="border-radius:6px;border:1px solid #ddd;">
                                        <option value="">---Select Service type ---</option>
                                        <option value="">Dry Cleaning</option>
                                        <option value="">Ironing</option>
                                        <option value="">washing</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('service')" class="mt-2" />
                                </div>

                                <div style="display:inline-flex;width:100%;gap:30px;">
                                    <div  style="width:100%;margin-top:20px;">
                                        <x-input-label for="contact_person" value="Contact Person's Name" />
                                        <x-text-input id="contact_person" class="block mt-1 w-full" type="text" name="contact_person" :value="old('contact_person')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('contact_person')" class="mt-2" />
                                    </div>

                                    <div  style="width:100%;margin-top:20px;">
                                        <x-input-label for="contact_person" value="Contact Person's Number" />
                                        <x-text-input id="contact_person" class="block mt-1 w-full" type="text" name="contact_person" :value="old('contact_person')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('contact_person')" class="mt-2" />
                                    </div>
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="description" :value="__('Description (Optional)')" />
                                    <textarea id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="username" style="border-radius:6px;border:1px solid #ddd;"></textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div><br>

                                <button class="block mt-1 w-full" style="background-color:#0096FF;color:white;padding:10px;border-radius:6px;"><ion-icon name="send" style="margin-top:8px;margin-right:7px"></ion-icon>Submit Request</button>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div><br><br>

</x-app-layout>
<script>
           var currentNumber = 100000;

            function generateRandomNumber() {
            var randomNumber = Math.floor(Math.random() * 900000) + 100000;

            // Make sure the random number is always greater than the current number.
            while (randomNumber <= currentNumber) {
                randomNumber = Math.floor(Math.random() * 900000) + 100000;
            }

            currentNumber = randomNumber;

            return randomNumber;
            }

            document.getElementById("laundry_invoice").value = "INVL" + generateRandomNumber().toString();

        </script>