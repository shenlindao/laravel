<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormProcessor;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [
        'name' => 'Test Name',
        'age' => 35,
        'position' => 'test position',
        'address' => 'test adress'
    ];
    return view('home', $data);
});

Route::get('/contacts', function () {
    $contactData = [
        'address' => 'test adress',
        'post_code' => '0123456789',
        'email' => 'test@test.ru',
        'phone' => '+79998887766',
    ];
    return view('contacts', $contactData);
});

Route::get('/form', [FormProcessor::class, 'index']);

Route::get('/userform', [FormProcessor::class, 'index']);

Route::post('/store_form', [FormProcessor::class, 'store']);

Route::get('/test_database', function () {
    $employee = new Employee();
    $employee->name = 'Test Name';
    $employee->email = 'test@test.ru';
    $employee->position = 'test position';
    $employee->save();
});