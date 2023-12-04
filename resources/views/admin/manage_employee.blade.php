<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="employee" style="font-size:20px;">Employee List</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div style="float:right;">
                            <a href="new_employee"><button style="transform:scale(1);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;"><b>&#43;</b> new user</button></a>
                        </div>
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Employee List") }}</strong><hr></center>
                        
                        <form  method="get" action="{{url('search-box5')}}" style="float:left;">
                                <input type="text" name="input-search" id="input-search" style="margin-top:8px;margin-bottom:8px;padding:6px;border-radius:10px;">
                                <button style="transform:scale(1);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;">search</button>
                        </form><br>
                        
                        <div style="margin-top:25px;margin-bottom:15px;">
                            
                            @if (is_array($query) || is_object($query))
                            <table>
                                <tr style="height:50px;">
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Profile</th>
                                    <th>Phone</th>
                                    <th>Category</th>
                                    <th>Branch</th>
                                    <th>Emergency Person</th>
                                    <th>Emergency Person Contact</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($query as $query)
                                <tr>
                                    <td>{{$query->name}}</td>
                                    <td>{{$query->email}}</td>
                                    <td>{{$query->gender}}</td>
                                    <td>
                                        <center>
                                            @if(!empty($query->profile))
                                            <img src="{{asset('storage/' .$query->profile)}}" alt="" style="height:40px;width:40px;border-radius:50%;">
                                            @else
                                            <img src="{{asset('assets/img/avarta.png')}}" alt="" style="background-color:whitesmoke;padding:5px;height:40px;width:40px;border-radius:50%;">
                                            @endif
                                        </center>
                                    </td>
                                    <td>{{$query->phone}}</td>
                                    <td>{{$query->category}}</td>
                                    <td>{{$query->branch}}</td>
                                    <td>{{$query->emergency_person}}</td>
                                    <td>{{$query->emergency_person_contact}}</td>
                                    <td>
                                    <a href="{{url('update_user/'.$query -> id)}}"><button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button></a>
                                        <a href="{{url('deleteusers/'.$query -> id)}}"><button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            @else
                            <table>
                                <tr style="height:50px;">
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Profile</th>
                                    <th>Phone</th>
                                    <th>Category</th>
                                    <th>Branch</th>
                                    <th>Emergency Person</th>
                                    <th>Emergency Person Contact</th>
                                    <th>Actions</th>
                                </tr>
                                <tr style="height:50px;">
                                    <center>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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

                            
                        </div>
                        
                    <br>
                </div>
            </div>
        </div>
    </div><br><br><br>


</x-app-layout>
