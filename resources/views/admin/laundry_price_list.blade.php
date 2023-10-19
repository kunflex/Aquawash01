<x-app-layout>

    <div class="py-10" style="margin-top:20px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="laundry_price_list" style="font-size:20px;">Laundry Price List</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div style="float:right;">
                            <button style="transform:scale(1);margin:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;">add</button>
                        </div>
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Laundry Price List") }}</strong><hr></center>
                    <div style="margin-top:25px;margin-bottom:15px;">
                        <table>
                            <tr>
                                <th>Quantity</th>
                                <th>Items</th>
                                <th>Unit Price (<b>&#8373;</b>)</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Top wear</td>
                                <td>5</td>
                                <th>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button>
                                </th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeans Trouser</td>
                                <td>7</td>
                                <th>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button>
                                </th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Trouser Length</td>
                                <td>5</td>
                                <th>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button>
                                </th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Suit</td>
                                <td>10</td>
                                <th>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button>
                                </th>
                            </tr>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
