<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\AuthController;
use \App\Models\Bus;
use \App\Models\Trayek;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/buses', function (){
        $buses = Bus::all();
        return response()->json([
            'message' => 'Success',
            'data' => $buses
        ]);
    });
    Route::post('/buses', function (Request $request){
        $bus = Bus::create([
            'id_trayek' => $request->id_trayek,
            'kapasitas' => $request->kapasitas,
            'total_penumpang' => $request->total_penumpang,
            'status' => $request->status,
            'cam_address' => $request->cam_address
        ]);
        return response()->json([
           'message' => 'Success',
           'data' => $bus
        ]);
    });
    Route::put('/buses/{id}', function (Request $request, $id){
        $bus = Bus::find($id);
        $bus->update($request->all());
        return response()->json([
            'message' => 'Success',
            'data' => $bus
        ]);
    });
    Route::delete('/buses/{id}', function ($id){
        Bus::destroy($id);
        return response()->json([
            'message' => 'Success'
        ]);
    });
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/trayek', function (){
        $trayek = Trayek::all();
        return response()->json([
            'message' => 'Success',
            'data' => $trayek
        ]);
    });
    Route::post('/trayek', function (Request $request){
        $trayek = Trayek::create([
            'nama_trayek' => $request->nama_trayek,
        ]);
        return response()->json([
            'message' => 'Success',
            'data' => $trayek
        ]);
    });
    Route::put('/trayek/{id}', function (Request $request, $id){
        $trayek = Trayek::find($id);
        $trayek->update($request->all());
        return response()->json([
            'message' => 'Success',
            'data' => $trayek
        ]);
    });
    Route::delete('/trayek/{id}', function ($id){
        Trayek::destroy($id);
        return response()->json([
            'message' => 'Success'
        ]);
    });
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/registration', [AuthController::class, 'registration']);
