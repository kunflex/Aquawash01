<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
            @php
                $role_id = Auth::user()->role_id;
            @endphp
            @if($role_id == 1)
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="laundry_request_form" style="font-size:20px;">Laundry Request Form</a></h2>
            @else
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Dashboard</a>/<a href="laundry_request_form" style="font-size:20px;">Laundry Request Form</a></h2>
            @endif
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Laundry Request Form") }}</strong><hr></center>
                    <div style="margin-top:25px;margin-bottom:15px;">
                        <form action="{{ url('laundry_request') }}" method="post">
                            @csrf
                            <div style="display:inline-flex;gap:30px;width:100%;">
                               <!-- car_brand Address -->
                                <div style="width:100%;">
                                    <x-input-label for="Pick_up" :value="__('#Invoice No.')" />
                                    <input id="laundry_invoice" class="preview-input" type="text" name="laundry_invoice" :value="old('laundry_invoice')" data-preview="#preview1" required autofocus autocomplete="username"  readonly/>
                                    <x-input-error :messages="$errors->get('laundry_invoice')" class="mt-2" />
                                </div>

                                <div style="width:100%;">
                                    
                                </div>

                            </div>


                            <div style="display:inline-flex;gap:30px;width:100%;margin-top:20px;">
                               <!-- regular_cloth Address -->
                                <div style="width:100%;">
                                    <x-input-label for="Pick_up" :value="__('Pick up/Drop Date')" />
                                    <input id="pick_up" class="preview-input" type="date" name="pick_up" :value="old('pick_up')" required autofocus autocomplete="username" data-preview="#preview2" />
                                    <x-input-error :messages="$errors->get('pick_up')" class="mt-2" />
                                </div>

                                <div  style="width:100%;">
                                    <x-input-label for="pick_up_time" :value="__('Pick up Time')" />
                                    <input id="pick_up_time" class="preview-input" type="time" name="pick_up_time" :value="old('pick_up_time')" required autofocus autocomplete="username" data-preview="#preview3"/>
                                    <x-input-error :messages="$errors->get('pick_up_time')" class="mt-2" />
                                </div>

                            </div>

                            <div style="display:inline-flex;gap:30px;width:100%;">
                               <!-- regular_cloth Address -->
                                <div style="width:100%;margin-top:20px;">
                                    <x-input-label for="delivery_date" :value="__('Delivery Date')" />
                                    <input id="delivery_date" class="preview-input" type="date" name="delivery_date" :value="old('delivery_date')" required autofocus autocomplete="username" data-preview="#preview4" />
                                    <x-input-error :messages="$errors->get('delivery_date')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="delivery_time" :value="__('Delivery Time')" />
                                    <input id="delivery_time" class="preview-input" type="time" name="delivery_time" :value="old('delivery_time')" required autofocus autocomplete="username"  data-preview="#preview5"/>
                                    <x-input-error :messages="$errors->get('delivery_time')" class="mt-2" />
                                </div>

                            </div>

                            <div>

                                <div style="display:inline-flex;width:100%;gap:30px;">
                                    <div  style="width:100%;margin-top:20px;">
                                        <x-input-label for="customer_name" value="Customer's Name" />
                                        <input id="customer_name" class="preview-input" type="text" name="customer_name" value="{{Auth::user()->name}}" required autofocus autocomplete="username" data-preview="#preview6" readonly/>
                                        <x-input-error :messages="$errors->get('customer_name')" class="mt-2" />
                                    </div>

                                    <div  style="width:100%;margin-top:20px;">
                                        <x-input-label for="customer_number" value="Customer's Number" />
                                        <input id="customer_number" class="preview-input" type="text" name="customer_number" value="{{Auth::user()->phone}}" required autofocus autocomplete="username" data-preview="#preview7" readonly/>
                                        <x-input-error :messages="$errors->get('customer_number')" class="mt-2" />
                                    </div>
                                </div>

                                <div>
                                    
                                    <div id="templateContainer" class="templateContainer">
                                        <button style="width:25px;height:25px;background-color:red;margin-bottom:10px;border-radius:50%;color:white;font-size:15px;float:right;" onclick="closeClonedTemplate()">&minus;</button>
                                    
                                        <div  style="width:100%;margin-top:20px;">
                                            <x-input-label for="itemSelect" :value="__('Select Laundry Item')" />
                                            <select id="itemSelect1" class="preview-input" type="text" name="itemSelect[]" :value="old('itemSelect')" required autofocus autocomplete="username"  data-preview="#preview13">
                                                <option value="---Select a Laundry Item  ---">---Select a Laundry Item  ---</option>
                                                @foreach($price as $price)
                                                <option value="{{$price->id}}">
                                                    <tr>
                                                        <td>{{$price->quantity}}</td>
                                                        <td>{{$price->items}}</td>
                                                        <td>cost <b>&#8373;</b>{{$price->price}}</td>
                                                    </tr>
                                                </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('itemSelect')" class="mt-2" />
                                        </div>

                                        <div  style="width:100%;margin-top:20px; " id="quantityDiv">
                                            <x-input-label for="quantity" value="Quantity" />
                                            <input id="quantity1" class="preview-input" type="text" name="quantity[]" :value="old('quantity')" required autofocus autocomplete="username" data-preview="#preview7" />
                                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                    <button style="width:25px;height:25px;background-color:blue;margin-top:10px;border-radius:50%;color:white;font-size:15px;" onclick="cloneTemplate()">&plus;</button>
                                 

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="others" :value="__('Other Items (Specify and quantity): ')" />
                                    <input id="others" class="preview-input" type="text" name="others" :value="old('others')" required autofocus autocomplete="username" data-preview="#preview12" />
                                    <x-input-error :messages="$errors->get('others')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="service" :value="__('Service')" />
                                    <select id="service" class="preview-input" type="text" name="service" :value="old('service')" required autofocus autocomplete="username"  data-preview="#preview13">
                                        <option value="">---Select Service type ---</option>
                                        <option value="Dry Cleaning">Dry Cleaning</option>
                                        <option value="Ironing">Ironing</option>
                                        <option value="Wash and Fold">Wash and Fold </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('service')" class="mt-2" />
                                </div>

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

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="description" :value="__('Description (Optional)')" />
                                    <textarea id="description" class="preview-input" type="text" name="description" :value="old('description')" required autofocus autocomplete="username" style="border-radius:6px;border:1px solid #ddd;" data-preview="#preview16"></textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="payment" :value="__('Payment Method')" />
                                    <select id="payment" class="preview-input" type="text" name="payment" :value="old('payment')" required autofocus autocomplete="username" style="border-radius:6px;border:1px solid #ddd;" data-preview="#preview17">
                                        <option value="">---Select payment type ---</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="mobile money">mobile money</option>
                                        <option value="Cash on Delivery">Cash on Delivery </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('payment')" class="mt-2" />
                                </div>

                            </div>
                               <br>
                                <button class="preview-input" style="background-color:#0096FF;color:white;padding:10px;border-radius:6px;"><ion-icon name="send" style="margin-top:8px;margin-right:7px"></ion-icon>Submit Request</button>
                            
                        </form>
                     </div>

                     

                     <!-- =====Preview mode===== -->
                        <div class="modal-container" id="modal-container">
                            <div style="width:50%;height:100%;">
                                <br><br>
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 560px; overflow-y: auto;">
                                    <button class="close" onclick="closeUpdateModal()"><b>&plus;</b></button>
                                        <div class="p-6 text-gray-900">
                                            <center><strong style="font-size:20px;">{{ __("Preview Details") }}</strong><hr></center><br>
                                            
                                            <div>
                                                <span id="preview1"> </span><br>
                                                <span id="preview2"> </span><br>
                                                <span id="preview3"> </span><br>
                                                <span id="preview4"> </span><br>
                                                <span id="preview5"> </span><br>
                                                <span id="preview6"> </span><br>
                                                <span id="preview7"> </span><br>
                                                <span id="preview8"> </span><br>
                                                <span id="preview9"> </span><br>
                                                <span id="preview10"> </span><br>
                                                <span id="preview11"> </span><br>
                                                <span id="preview12"> </span><br>
                                                <span id="preview13"> </span><br>
                                                <span id="preview14"> </span><br>
                                                <span id="preview15"> </span><br>
                                                <span id="preview16"> </span><br>
                                                <span id="preview17"> </span><br>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                        </div>

                        
                            <!-- preview mode -->
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                <script>
                                $(document).ready(function () {
                                $('.preview-input').on('input', function () {
                                    var previewId = $(this).data('preview');
                                    var label = $('label[for="' + $(this).attr('id') + '"]').text();
                                    $(previewId).text(label+ $(this).val());
                                });
                            });

                                </script>
                            <!-- end preview mode -->
                        <!-- end preview page -->

                        <script>
                            function openUpdateModal() {
                            // Assuming 'modal-container' is the ID of the modal element
                            var modalContainer = document.getElementById('modal-container');
                            modalContainer.style.display = 'flex';
                        }

                        function closeUpdateModal() {
                            // Assuming 'modal-container' is the ID of the modal element
                            var modalContainer = document.getElementById('modal-container');

                            // Set the display property to 'none' to hide the modal
                            modalContainer.style.display = 'none';
                        }

                        </script>
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

<!-- Add this script in your HTML file -->
<script>
    var currentTemplateIndex = 1;

    function closeClonedTemplate() {
        // Get the cloned template container
        var templateContainer = document.getElementById("templateContainer");

        // Remove the cloned template container
        if (templateContainer) {
            templateContainer.parentNode.removeChild(templateContainer);
        }
    }

    function cloneTemplate() {
        // Clone the template container
        var originalTemplate = document.getElementById("templateContainer");
        var clonedTemplate = originalTemplate.cloneNode(true);

        // Increment the template index
        currentTemplateIndex++;

        // Update the IDs and names in the cloned template
        var inputs = clonedTemplate.querySelectorAll('input, select');
        inputs.forEach(function(input) {
            var newId = input.id + currentTemplateIndex;
            var newName = input.name + currentTemplateIndex;

            // Update ID and name attributes
            input.id = newId;
            input.name = newName;

            // Clear the input value
            input.value = '';
        });

        // Append the cloned template to the parent container
        originalTemplate.parentNode.appendChild(clonedTemplate);
    }
</script>
