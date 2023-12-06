<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
            @php
                $role_id = Auth::user()->role_id;
            @endphp
            @if($role_id == 1)
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="" style="font-size:20px;">Laundry Bookings</a></h2>
            @else
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Dashboard</a>/<a href="" style="font-size:20px;">Laundry Bookings</a></h2>
            @endif
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Laundry Bookings") }}</strong><hr></center>
                        <form  method="get" action="{{url('search-box1')}}" style="float:left;">
                                <input type="text" name="input-search" id="input-search" style="margin-top:8px;margin-bottom:8px;padding:6px;border-radius:10px;">
                                <button style="transform:scale(1);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;">search</button>
                        </form><br>
                    <div style="margin-top:25px;margin-bottom:15px;">
                        
                        @if (is_array($query) || is_object($query))
                        <table>
                            <tr style="height:50px;">
                                <th>#Invoice No.</th>
                                <th>Customer's Name</th>
                                <th>Service</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($query as $query)
                            <tr>
                                <td>{{$query->laundry_invoice}}</td>
                                <td>{{$query->customer_name}}</td>
                                <td>{{$query->service}}</td>
                                <td>{{$query->customer_number}}</td>
                                <td>
                                @php
                                    $status = $query->status;
                                @endphp
                                    @if($status == null)
                                        <button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:orangered;border-radius:10px;">Pending</button>
                                    @elseif($status == "In Progress")
                                        <button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:#0045FF;border-radius:10px;">In Progress</button>
                                    @else
                                        <button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:green;border-radius:10px;">Finished</button>
                                    @endif
                                </td>
                                <td>
                                    @if($query!== null)
                                        <a href="{{ url('update_laundry/' . $query->id) }}"><button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button></a>
                                        <a href="{{ url('#') }}"><button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>

                        @else
                        <table>
                            <tr style="height:50px;">
                            <th>#Invoice No.</th>
                                <th>Customer's Name</th>
                                <th>Service</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            <tr style="height:50px;">
                                <center>
                                    <td></td>
                                    <td></td>
                                    <td>{{$query}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </center>
                            </tr>
                        </table>
                        @endif
                     </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
