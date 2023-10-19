<x-app-layout>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div style="margin-top:25px;margin-bottom:15px;">
            <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;"> Admin Dashboard / Laundry Overview</a></h2>
        </div>

            <!-- ===== card view ===== -->
            <div class="cardbox">
                <div class="xcontrol">
                    <img src="{{asset('assets/img/1.jpg')}}" alt="" style="height:260px;background-color:blue;border-radius:8px;">
                    <button class="cont"><a href="car_wash_overview" >Car wash Overview</a></button>
                </div>
                <div style="width:50%;height:300px;">
                    <div style="display:inline-flex;gap:20px;">
                        <div class="card" style="background-color:darkblue;color:white;"><h1>{{196}}</h1>Total Request</div>
                        <div class="card" style="background-color:#FFD700;color:white;"><h1>{{12}}</h1>New Request</div>
                        <div class="card" style="background-color:darkgreen;color:white;"><h1>{{9}}</h1>Accepted</div>
                    </div>
                    <div style="display:inline-flex;gap:20px; margin-top:20px;">
                        <div class="card" style="background-color:orangered;color:white;"><h1>{{30}}</h1>Inprocess</div>
                        <div class="card" style="background-color:darkblue;color:white;"><h1>{{96}}</h1>Finished Task</div>
                        <div class="card" style="background-color:black;color:white;"><h1>{{200}}</h1>Users</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-8" style="margin-top:0px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <center><strong style="font-size:20px;">{{ __("Laundry Price List") }}</strong><hr></center>
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
