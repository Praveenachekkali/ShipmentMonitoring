<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentsController;
use App\Http\Controllers\ShipmentStatusEvaluationController;
use App\Http\Controllers\TemperatureDeviationEvaluationController;
use App\Http\Controllers\DataIngestionController;

use Illuminate\Http\Request;
use App\Jobs\ProcessRabbitMQMessage;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::get('/shipments', [ShipmentsController::class,'index'])->name('shipment.index');
});

Route::prefix('api')->group(function () {
    Route::get('/shipments/import', [ShipmentsController::class,'import'])->name('shipment.import');
});

Route::prefix('api')->group(function () {
    Route::post('/ingestdata', [DataIngestionController::class,'ingestData'])->name('shipment.ingestData');
});

Route::prefix('api')->group(function () {
    Route::get('/shipment-status', [ShipmentStatusEvaluationController::class,'evaluateShipmentStatus'])->name('shipment.evaluateShipmentStatus');
});

Route::prefix('api')->group(function () {
    Route::get('/temperature-deviation', [TemperatureDeviationEvaluationController::class,'evaluateTemperatureDeviation'])->name('shipment.evaluateTemperatureDeviation');
});


Route::get('/send-message', function () {
    ProcessRabbitMQMessage::dispatch();
    
    return "Message sent to RabbitMQ!";
});