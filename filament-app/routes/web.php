<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('cc', function () {
//     $user = User::create([
//         'name' => 'Hesam1+',
//         'email' => 'Hesam1@gmail.com',
//         'password' => Hash::make('123456')
//     ]);
//     if ($user) {
//         dd('create user success', $user);
//     } else {
//         dd('worning!');
//     }
// });

Route::get('spatie', function () {
    $user = User::find(1);
    $role = Role::create(['name' => 'Admin']);
    $user->assignRole($role);
    dd('success');
});
