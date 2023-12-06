<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="LaundryBookList" style="font-size:20px;">Laundry Bookings</a>/<a href="" style="font-size:20px;">Update</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                    
                    <!-- ====people List==== -->
                    <center><strong style="font-size:20px;">{{ __("Update Laundry Booking") }}</strong><hr></center>
                      
                    <div style="margin-top:25px;margin-bottom:15px;">
                        <strong>#Invoice No.: </strong><span>{{$query->laundry_invoice}}</span><br>
                        <strong>Pick Up/Drop Date: </strong><span>{{$query->pick_up }}</span><br>
                        <strong>Pick Up Time: </strong><span>{{$query->pick_up_time }}</span><br>
                        <strong>Customer Name: </strong><span>{{$query->customer_name }}</span><br>
                        <strong>Customer No.: </strong><span>{{$query->customer_number }}</span><br>
                        
                        @if($data!==null)
                            @foreach($fan as $fan)
                                @if($data->itemSelect == $fan->id)
                                <strong>Laundry Item(s): </strong><span> {{$fan->items}} unit price ${{$fan->price}}</span><br>
                                <strong>Quantity: </strong><span>{{$data->quantity }}</span><br>
                                <strong>Amount Charged: </strong><span>${{$data->quantity }}*{{$fan->price }}</span><br>
                                @endif
                            @endforeach
                            @else
                            <strong>Laundry Item(s): </strong><span>{{'null'}}</span><br>
                        @endif
                        
                        <strong>Other Items: </strong><span>{{$query->others }}</span><br>
                        <strong>Description: </strong><span>{{$query->description }}</span><br>
                        <strong>Service: </strong><span>{{$query->service }}</span><br>

                        @if ($query !== null)
                            @if ($query->status !== null)
                                <strong>Status: </strong><span>{{ $query->status }}</span><br>
                            @else
                                <strong>Status: </strong><span>Null</span><br>
                            @endif
                        @else
                            <strong>Status: </strong><span>Null</span><br>
                        @endif

                        <strong>Contact Person name: </strong><span>{{$query->emergency_person }}</span><br>
                        <strong>Contact Person No.: </strong><span>{{$query->emergency_person_contact }}</span><br>

                        @if ($query !== null)
                            @if ($query->status !== null)
                                <strong>Amount Paid: </strong><span>{{$query->amount }}</span><br>
                            @else
                                <strong>Amount Paid: </strong><span>Null</span><br>
                            @endif
                        @else
                            <strong>Amount Paid: </strong><span>Null</span><br>
                        @endif

                        @if ($query !== null)
                            @if ($query->assigned_to !== null)
                                <strong>Assigned to: </strong><span>{{$query->assigned_to }}</span><br>
                            @else
                                <strong>Assigned to: </strong><span>Null</span><br>
                            @endif
                        @else
                            <strong>Assigned to: </strong><span>Null</span><br>
                        @endif
                        
                        <strong>Payment Method: </strong><span>{{$query->payment }}</span><br>
                        
                        <form action="{{url('carupdate/'.$query->id)}}" method="post">
                            @csrf
                                @method('Put')
                            <div  style="width:100%;margin-top:20px;">
                                <x-input-label for="assigned_to" :value="__('Assigned to')" />
                                <select id="assigned_to" class="preview-input" type="text" name="assigned_to" :value="old('assigned_to')" required autofocus autocomplete="username"  data-preview="#preview13">
                                    <option value="">---Select an employee  ---</option>
                                    @foreach($people as $people)
                                    <option value="{{$people->name}} {{$people->branch}} {{$people->phone}}">
                                        <tr>
                                            <td>{{$people->name}},</td>
                                            <td>{{$people->branch}}</td>
                                            <td>--{{$people->phone}}</td>
                                        </tr>
                                    </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('assigned_to')" class="mt-2" />
                            </div>

                            <div  style="width:100%;margin-top:20px;">
                                <x-input-label for="status" :value="__('Status')" />
                                    <select id="status" class="preview-input" type="text" name="status" :value="old('status')" required autofocus autocomplete="username"  data-preview="#preview13">
                                        <option value="">---Select Status ---</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Finished">Finished</option>
                                    </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <div  style="width:100%;margin-top:20px;">
                                    <x-input-label for="amount" :value="__('Amount Paid')" />
                                    <input id="amount" class="preview-input" type="text" name="amount" :value="old('amount')" required autofocus autocomplete="username" style="border-radius:6px;border:1px solid #ddd;" data-preview="#preview16"/>
                                    <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                                </div>

                            <div class="flex items-center justify-end mt-4" style="gap:30px;">
                            
                                <button class="block mt-1 w-full" style="background-color:#0096FF;color:white;padding:10px;border-radius:6px;"><ion-icon name="send" style="margin-top:8px;margin-right:7px"></ion-icon>{{ __('Update details') }}</button>
                                              
                            </div>
                        </form>
                        
                        <br>
                        <a href="{{url('LaundryBookList')}}" ><button class="block mt-1 w-full" style="background-color:red;color:white;padding:10px;border-radius:6px;">{{ __('Cancel') }}</button></a>
                         
                     </div><br>
                     <center>
                        <a href="{{url('print-pdf/'.$query->id)}}" style="color:blue;"><span>Print Receipt</span></a>
                     </center>
                </div>
            </div>
        </div>
    </div><br><br>

</x-app-layout>

