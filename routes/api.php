<?php
use App\Http\Controllers\MatterController;
use App\Http\Controllers\ProffessorController;
use App\Http\Controllers\TurnController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Endpoints para la tabla Matter (Materia)
Route::controller(MatterController::class)->group(function () {
    Route::get('/mattersIndex', 'index');
    Route::post('/matterCreate', 'store');
    Route::get('/matterView/{matter}', 'show');
    Route::patch('/matterUpdate/{id}', 'update');
    Route::delete('/matterDelete/{id}', 'destroy');
    Route::get('/matterFindDescription/{description}', 'findDescription');
    Route::get('/matterFindNameDescription/{search}', 'findNameDescription');
    Route::get('/matterFindName/{name}', 'findName');
    Route::post('/matterRel/{id}', 'addRelation');
    Route::post('/matterDelRel/{id}', 'delRelation');
});

// Endpoints para la tabla Proffessor (Profesor)
Route::controller(ProffessorController::class)->group(function () {
    Route::get('/proffessorsIndex', 'index');
    Route::get('/proffessorsMatters', 'profmat');
    Route::post('/proffessorCreate', 'store');
    Route::get('/proffessorView/{proffessor}', 'show');
    Route::get('/proffessorFindCi/{ci}', 'getCi');
    Route::patch('/proffessorUpdate/{id}', 'update');
    Route::delete('/proffessorDelete/{id}', 'destroy');
    Route::get('/proffessorFindLastname/{lastname}', 'findLastname');
    Route::get('/proffessorFindNameLastname/{search}', 'findNameLastname');
    Route::get('/proffessorFindName/{name}', 'findName');
    Route::post('/proffessorRel/{id}', 'addRelation');
    Route::post('/proffessorDelRel/{id}', 'delRelation');

});

// Endpoints para la tabla Turn (Turno)
Route::controller(TurnController::class)->group(function () {
    Route::get('/turnsIndex', 'index');
    Route::post('/turnCreate', 'store');
    Route::get('/turnView/{turn}', 'show');
    Route::patch('/turnUpdate/{id}', 'update');
    Route::delete('/turnDelete/{id}', 'destroy');
    Route::get('/turnFindName/{name}', 'findName');
});

// Endpoints para la tabla Group (Grupo)
Route::controller(GroupController::class)->group(function () {
    Route::get('/groupsIndex', 'index');
    Route::post('/groupCreate', 'store');
    Route::get('/groupView/{matter}', 'show');
    Route::put('/groupUpdate/{id}', 'update');
    Route::delete('/groupDelete/{id}', 'destroy');
    Route::get('/groupFindDescription/{description}', 'findDescription');
    Route::get('/groupFindNameDescription/{search}', 'findNameDescription');
    Route::get('/groupFindName/{name}', 'findName');
});

// Route::controller(AbsenceController::class)->group(function () {
//     Route::get('/absencesIndex', 'index');
//     Route::post('/absenceCreate', 'store');
//     Route::get('/absenceView/{matter}', 'show');
//     Route::put('/abcenseUpdate/{id}', 'update');
//     Route::delete('/abcenseDelete/{id}', 'destroy');
// });

// Route::controller(GmpController::class)->group(function () {
//     Route::get('/gmpIndex', 'index');
//     Route::post('/gmpCreate', 'store');
//     Route::get('/gmpView/{matter}', 'show');
//     Route::put('/gmpUpdate/{id}', 'update');
//     Route::delete('/gmpDelete/{id}', 'destroy');
// });


// Route::controller(MgController::class)->group(function () {
//     Route::get('/mgIndex', 'index');
//     Route::post('/mgCreate', 'store');
//     Route::get('/mgView/{matter}', 'show');
//     Route::put('/mgUpdate/{id}', 'update');
//     Route::delete('/mgDelete/{id}', 'destroy');
// });


// Route::controller(ProffesorController::class)->group(function () {
//     Route::get('/mattersIndex', 'index');
//     Route::post('/matterCreate', 'store');
//     Route::get('/matterView/{matter}', 'show');
//     Route::put('/matterUpdate/{id}', 'update');
//     Route::delete('/matterDelete/{id}', 'destroy');
//     Route::get('/matterFindDescription/{description}', 'findDescription');
//     Route::get('/matterFindNameDescription/{search}', 'findNameDescription');
//     Route::get('/matterFindName/{name}', 'findName');
// });

// Route::controller(ProfileController::class)->group(function () {
//     Route::get('/mattersIndex', 'index');
//     Route::post('/matterCreate', 'store');
//     Route::get('/matterView/{matter}', 'show');
//     Route::put('/matterUpdate/{id}', 'update');
//     Route::delete('/matterDelete/{id}', 'destroy');
//     Route::get('/matterFindDescription/{description}', 'findDescription');
//     Route::get('/matterFindNameDescription/{search}', 'findNameDescription');
//     Route::get('/matterFindName/{name}', 'findName');
// });

// Route::controller(SpecialtyController::class)->group(function () {
//     Route::get('/mattersIndex', 'index');
//     Route::post('/matterCreate', 'store');
//     Route::get('/matterView/{matter}', 'show');
//     Route::put('/matterUpdate/{id}', 'update');
//     Route::delete('/matterDelete/{id}', 'destroy');
//     Route::get('/matterFindDescription/{description}', 'findDescription');
//     Route::get('/matterFindNameDescription/{search}', 'findNameDescription');
//     Route::get('/matterFindName/{name}', 'findName');
// });









