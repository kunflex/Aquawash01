<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="manage_enquiries" style="font-size:20px;">Manage Enquiries</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                    
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Manage Enquiries") }}</strong><hr></center>
                        <form  method="get" action="{{url('search-box2')}}" style="float:left;">
                                <input type="text" name="input-search" id="input-search" style="margin-top:8px;margin-bottom:8px;padding:6px;border-radius:10px;">
                                <button style="transform:scale(1);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;">search</button>
                        </form><br>
                    <div style="margin-top:25px;margin-bottom:15px;">
                        
                        @if (is_array($query) || is_object($query))
                        <table>
                            <tr style="height:50px;">
                                <th>ID</th>
                                <th>#Ticket No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($query as $query)
                            <tr>
                                <td>{{$query->id}}</td>
                                <td>{{$query->ticket}}</td>
                                <td>{{$query->name}}</td>
                                <td>{{$query->email}}</td>
                                <td>{{$query->description}}</td>
                                <td>
                                    <button style="transform:scale(0.8);margin-top:8px;margin-bottom:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;">View</button>
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
                                <th>#Ticket No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Description</th>
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
                     </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
