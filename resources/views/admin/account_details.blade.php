<x-app-layout>

    <div class="py-10" style="margin-top:20px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-top:25px;margin-bottom:15px;">
                <h2 style="font-size:20px;"><a href="dashboard" style="font-size:20px;">Admin Dashboard</a>/<a href="account_details" style="font-size:20px;">Account Details</a></h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div style="float:right;">
                            <button style="transform:scale(1);margin:8px;padding:6px;color:white;background-color:darkblue;border-radius:10px;">add</button>
                        </div>
                    <!-- ====Price List==== -->
                    <center><strong style="font-size:20px;">{{ __("Registered User List") }}</strong><hr></center>
                    <div style="margin-top:25px;margin-bottom:15px;">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Role</th>
                                <th>Full Name</th>
                                <th>Profile</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Admin</td>
                                <td>Super Admin</td>
                                <td>avarta</td>
                                <td>admin@gmail.com</td>
                                <td>+23358421563</td>
                                <th>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button>
                                </th>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>User</td>
                                <td>Test User</td>
                                <td>avarta</td>
                                <td>user@gmail.com</td>
                                <td>+23358421563</td>
                                <th>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button>
                                </th>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Admin</td>
                                <td>Super Admin</td>
                                <td>avarta</td>
                                <td>admin@gmail.com</td>
                                <td>+23358421563</td>
                                <th>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:#FFD700;border-radius:10px;">Update</button>
                                    <button style="transform:scale(0.8);margin:8px;padding:6px;color:white;background-color:darkred;border-radius:10px;">Delete</button>
                                </th>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Admin</td>
                                <td>Super Admin</td>
                                <td>avarta</td>
                                <td>admin@gmail.com</td>
                                <td>+23358421563</td>
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
