<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Profile</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        
        body {
    font-family: Arial, sans-serif;
    background-color: #000; /* Mengubah background menjadi hitam */
    color: #fff; /* Mengubah warna teks menjadi putih untuk kontras yang lebih baik */
}

.profile-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background: #333; /* Mengubah background container menjadi abu-abu tua */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.1); /* Mengubah shadow menjadi lebih terang */
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #fff; /* Mengubah warna teks menjadi putih */
}

.profile-table {
    width: 100%;
    border-collapse: collapse;
}

.profile-table th, .profile-table td {
    padding: 10px;
    border-bottom: 1px solid #555; /* Mengubah border menjadi abu-abu lebih gelap */
}

.profile-table th {
    background: #333; /* Mengubah background header tabel menjadi abu-abu lebih gelap */
    text-align: left;
    color: #fff; /* Mengubah warna teks header menjadi putih */
}

.profile-table td {
    background: #333; /* Mengubah background sel tabel menjadi abu-abu tua */
    color: #fff; /* Mengubah warna teks sel tabel menjadi putih */
}

    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Member Profile</h1>
        <table class="profile-table">
            <tr>
                <th>Name</th>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Member Start</th>
                <td>{{ $user->membership_start }}</td>
            </tr>
            <tr>
                <th>Member End</th>
                <td>{{ $user->membership_end }}</td>
            </tr>
            <tr>
                <th>Member Type</th>
                <td>{{ $user->membershipType->name }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
