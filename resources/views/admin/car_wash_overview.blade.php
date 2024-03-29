<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div style="margin-top:25px;margin-bottom:15px;">
            <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;"> Admin Dashboard / Laundry Overview</a>/<a href="car_wash_overview" style="font-size:20px;">Car Wash Overview</a></h2>
        </div>

            <!-- ===== card view ===== -->
            <div class="cardbox">
                <div class="xcontrol">
                    <img src="{{asset('assets/img/car1.jpg')}}" alt="" style="width:100%;height:260px;background-color:white;border-radius:8px;">
                    <button class="cont"><a href="dashboard" >Laundry Overview</a></button>
                </div>
                <div style="width:50%;height:300px;">
                    <div style="width:100%;display:inline-flex;gap:20px;">
                        <div class="card" style="background-color:darkblue;color:white;"><h1>{{96}}</h1>Total Bookings</div>
                        <div class="card" style="background-color:#FFD700;color:white;"><h1>{{7}}</h1>New Bookings</div>
                        <div class="card" style="background-color:darkgreen;color:white;"><h1>{{$car_wash_point}}</h1>Wash Points</div>
                    </div>
                    <div style="width:100%;display:inline-flex;gap:20px; margin-top:20px;">
                        <div class="card" style="background-color:orangered;color:white;"><h1>{{40}}</h1>Inprocess</div>
                        <div class="card" style="background-color:darkblue;color:white;"><h1>{{60}}</h1>Finished Task</div>
                        <div class="card" style="background-color:black;color:white;"><h1>{{200}}</h1>Enquiries</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-8" style="margin-top:0px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <center><strong style="font-size:20px;">{{ __("Car Wash List") }}</strong><hr></center>
                    <div style="margin-top:25px;margin-bottom:15px;">
                        <table>
                            <tr>
                                <th>Quantity</th>
                                <th>Items</th>
                                <th>Unit Price (<b>&#8373;</b>)</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Top wear</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeans Trouser</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Trouser Length</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Suit</td>
                                <td>10</td>
                            </tr>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div><br><br>

</x-app-layout>
