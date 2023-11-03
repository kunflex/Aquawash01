<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="add_car_wash_booking" style="font-size:20px;">Add Car Washing Booking</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Add Car Washing Booking") }}</strong><hr></center>
                    <div style="margin-top:25px;margin-bottom:15px;">
                        
                        <form action="{{url('carwash_form')}}" method="post">
                            <div style="display:inline-flex;gap:30px;width:100%;">
                               <!-- car_brand Address -->
                                <div style="width:100%;">
                                    <x-input-label for="invoice" :value="__('#Invoice No.')" />
                                    <x-text-input id="car_invoice" class="block mt-1 w-full" type="text" name="car_invoice" :value="old('car_invoice')" required autofocus autocomplete="username"  readonly/>
                                    <x-input-error :messages="$errors->get('car_invoice')" class="mt-2" />
                                </div>

                                <div style="width:100%;">
                                    
                                </div>

                            </div>

                            <div style="display:inline-flex;gap:30px;width:100%;">
                               <!-- car_brand Address -->
                                <div style="width:100%;margin-top:20px;">
                                    <x-input-label for="pick_up" :value="__('Pick up/Drop Date')" />
                                    <x-text-input id="pick_up" class="block mt-1 w-full" type="date" name="pick_up" :value="old('pick_up')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('pick_up')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="pick_up_time" :value="__('Pick up/Drop Time')" />
                                    <x-text-input id="pick_up_time" class="block mt-1 w-full" type="time" name="pick_up_time" :value="old('pick_up_time')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('pick_up_time')" class="mt-2" />
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
                                    <x-input-label for="car_brand" :value="__('Car Brand/Model')" />
                                    <x-text-input id="car_brand" class="block mt-1 w-full" type="text" name="car_brand" :value="old('car_brand')" required autofocus autocomplete="username"  placeholder="Toyota - Camry"/>
                                    <x-input-error :messages="$errors->get('car_brand')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="car_color" :value="__('Car Color')" />
                                    <x-text-input id="car_color" class="block mt-1 w-full" type="text" name="car_color" :value="old('car_color')" required autofocus autocomplete="username" placeholder="Black"/>
                                    <x-input-error :messages="$errors->get('car_color')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="car_number" :value="__('Car Number/Plate')" />
                                    <x-text-input id="car_number" class="block mt-1 w-full" type="text" name="car_number" :value="old('car_number')" required autofocus autocomplete="username"  placeholder="GE-9061-21"/>
                                    <x-input-error :messages="$errors->get('car_number')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="car_washing_point" :value="__('Car Washing Point')" />
                                    <select id="car_washing_point" class="block mt-1 w-full" type="text" name="car_washing_point" :value="old('car_washing_point')" required autofocus autocomplete="username" style="border-radius:6px;border:1px solid #ddd;">
                                        <option value="">---Select Washing Point---</option>
                                        <option value="">XZY Washing Bay</option>
                                        <option value="">ABC Car Washing Point</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('car_washing_point')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="service" :value="__('Service')" />
                                    <select id="service" class="block mt-1 w-full" type="text" name="service" :value="old('service')" required autofocus autocomplete="username" style="border-radius:6px;border:1px solid #ddd;">
                                        <option value="">---Select Your Washing Plan ---</option>
                                        <option value="">Basic Cleaning (Seats Cleaning, Vacuum Cleaning, Exterior Cleaning)</option>
                                        <option value="">Premium Cleaning (Seats Cleaning, Vacuum Cleaning, Exterior Cleaning, Interior Wet Cleaning)</option>
                                        <option value="">Complex Cleaning (Seats Cleaning, Vacuum Cleaning, Exterior Cleaning, Interior Wet Cleaning, Window Wiping)</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('service')" class="mt-2" />
                                </div>

                                <div style="display:inline-flex;width:100%;gap:30px;">
                                    <div  style="width:100%;margin-top:20px;">
                                        <x-input-label for="contact_person_name" value="Contact Person's Name" />
                                        <x-text-input id="contact_person_name" class="block mt-1 w-full" type="text" name="contact_person_name" :value="old('contact_person_name')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('contact_person_name')" class="mt-2" />
                                    </div>

                                    <div  style="width:100%;margin-top:20px;">
                                        <x-input-label for="contact_person_number" value="Contact Person's Number" />
                                        <x-text-input id="contact_person_number" class="block mt-1 w-full" type="text" name="contact_person_number" :value="old('contact_person_number')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('contact_person_number')" class="mt-2" />
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
    </div><br><br><br>

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

            document.getElementById("car_invoice").value = "INVC" + generateRandomNumber().toString();

        </script>