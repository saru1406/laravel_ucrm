<?php

use App\Http\Requests\SearchCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/searchCustomers', function (SearchCustomerRequest $request) {
    return Customer::customerSearch($request->getSearch())->paginate(10);
});
