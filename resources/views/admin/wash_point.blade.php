<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="wash_point" style="font-size:20px;">Washing Point</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div style="float:right;">
                            <a href="{{url('location')}}"><button style="transform:scale(1);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;"><b>&#43;</b> new location</button></a>
                        </div>
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Washing Points") }}</strong><hr></center>
                        <form  method="get" action="{{url('search-box4')}}" style="float:left;">
                                <input type="text" name="input-search" id="input-search" style="margin-top:8px;margin-bottom:8px;padding:6px;border-radius:10px;">
                                <button style="transform:scale(1);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;">search</button>
                        </form><br>
                    <div style="margin-top:25px;margin-bottom:15px;">
                        @if (is_array($query) || is_object($query))
                        <table>
                            <tr style="height:50px;">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th>contact</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($query as $query)
                            <tr>
                                <td>{{$query->id}}</td>
                                <td>{{$query->name}}</td>
                                <td>{{$query->address}}</td>
                                <td>{{$query->category}}</td>
                                <td>{{$query->contact}}</td>
                                <td>
                                    <a href=""><button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button></a>
                                    <a href="{{url('deletewashpoints'.$query -> id)}}"><button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                        @else
                        <table>
                            <tr style="height:50px;">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th>contact</th>
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
                                </center>
                            </tr>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

</x-app-layout>
