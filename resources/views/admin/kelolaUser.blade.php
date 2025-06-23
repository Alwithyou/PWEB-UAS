@extends('layouts.admin')
@section('content')
<h2 class="text-2xl font-semibold mb-4">Kelola User</h2>
<table class="table-auto w-full bg-white shadow rounded-lg">
    <thead>
        <tr class="bg-green-100 text-left">
            <th class="p-2">Nama</th>
            <th class="p-2">Email</th>
            <th class="p-2">Role</th>
            <th class="p-2">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr class="border-b">
            <td class="p-2">{{ $user->name }}</td>
            <td class="p-2">{{ $user->email }}</td>
            <td class="p-2">{{ ucfirst($user->role) }}</td>
            <td class="p-2">{{ $user->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection