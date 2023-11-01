<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="account_details" style="font-size:20px;">Account Details</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div style="float:right;">
                            <button style="transform:scale(1);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;"><b>&#43;</b> new user</button>
                        </div>
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Registered User List") }}</strong><hr></center>
                        
                        <form  method="get" action="{{url('search-box')}}" style="float:left;">
                                <input type="text" name="input-search" id="input-search" style="margin-top:8px;margin-bottom:8px;padding:6px;border-radius:10px;">
                                <button style="transform:scale(1);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;">search</button>
                        </form><br>
                        
                    <div style="margin-top:25px;margin-bottom:15px;">
                        <div class="container">
                            <div class="alert alert-success alert-dismissible fade show" style="background-color:rgb(187, 248, 187); color:green;padding:10px;border-radius:6px;margin:5px;">
                                <button type="button" class="close" data-dismiss="alert" style="float:right;">×</button>
                                <b>&check;</b><strong>Success!</strong> Success Alert.
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" style="background-color:rgb(255, 193, 190);color:red;padding:10px;border-radius:6px;margin:5px;">
                                <button type="button" class="close" data-dismiss="alert" style="float:right;">×</button>
                                <b>&tridot;</b><strong>Warning!</strong> Warning Alert.
                            </div>
                        </div>
                        @if (is_array($query) || is_object($query))
                        <table>
                            <tr style="height:50px;">
                                <th>ID</th>
                                <th>Role</th>
                                <th>Full Name</th>
                                <th>Profile</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($query as $query)
                            <tr>
                                <td>{{$query->id}}</td>
                                <td>
                                    @if($query->role_id == 1)
                                        <span>admin</span>
                                    @else
                                        <span>user</span>
                                    @endif
                                </td>
                                <td>{{$query->name}}</td>
                                <td>
                                    <center>
                                        @if(!empty($query->profile))
                                        <img src="{{$query->profile}}" alt="" style="height:40px;width:40px;border-radius:50%;">
                                        @else
                                        <img src="{{asset('assets/img/customer01.jpg')}}" alt="" style="height:40px;width:40px;border-radius:50%;">
                                        @endif
                                    </center>
                                </td>
                                <td>{{$query->email}}</td>
                                <td>+23358421563</td>
                                <td>
                                    <button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button>
                                    <button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <table>
                            <tr style="height:50px;">
                                <th>ID</th>
                                <th>Role</th>
                                <th>Full Name</th>
                                <th>Profile</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                            <tr style="height:50px;">
                                <center>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{$query}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </center>
                            </tr>
                        </table>
                        @endif

                        <br><br>
                        <button class="popup-btn" id="popup-btn">open pop up</button>
                        <div class="modal-container" id="modal-container">
                            <div class="modal-content-box">
                                <button class="close" id="close-btn"><b>&plus;</b></button>
                                <center>
                                    <div class="modal-content">
                                        <div>
                                            <h1>Hello {{Auth::user()->name}}!</h1>
                                            <hr>
                                        </div><br>
                                        <p>The Laundry Management System Project In PHP gives the laundry and dry 
                                            cleaning business an automated way to handle day-to-day tasks like orders,
                                            processes, billing, and delivery management.</p>
                                    </div>
                                </center>
                            </div>
                        </div>

                     </div>
                </div>
            </div>
        </div>
    </div><br><br><br>


</x-app-layout>
