<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitDoctorController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\EMHController;
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
Route::post('/timetable', [VisitDoctorController::class, 'index']);

// Запись на время
Route::post('/timetable/create', [VisitDoctorController::class, 'CreatePatient']);

//Просмотр записи по времени
Route::get('/timetable/show/{id}', [VisitDoctorController::class, 'ShowOne']);

//Удаление записи по времени
Route::delete('/timetable/delete/{id}', [VisitDoctorController::class, 'delete']);

//Добавление записи в карту пациента
Route::post('/emh/create', [EMHController::class, 'Create']);

//Вывод шаблона
Route::get('/emh/template/{id}', [TemplatesController::class, 'ShowTemplate']);

//Заполнение шаблона переменными
Route::get('/emh/patient/{id}', [PatientsController::class, 'Show']);

//Заполнение шаблона переменными
Route::get('/emh/show/{id}', [EMHController::class, 'ShowOne']);


