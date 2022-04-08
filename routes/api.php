<?php
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReponcesController;
use App\Http\Controllers\ExamenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Public routes
Route::post('/stag', [StagiaireController::class, 'store']);
Route::get('/stag', [StagiaireController::class, 'index']);
///////////////////////////////////////////////////////////////////////////////////////
Route::get('/question', [QuestionsController::class, 'index']); // api for examen build 
Route::get('/allquestion', [QuestionsController::class, 'allquestion']); // api for dashboard admin
Route::get('/getramdom', [QuestionsController::class, 'random']); //get random questions
Route::get('/question/{question}', [QuestionsController::class, 'show']); //get question with reponce
Route::put('/updatequestion/{id}', [QuestionsController::class, 'updateTimeStatut']);
///////////////////////////////////////////////////////////
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/alluser', [AuthController::class, 'user']);
Route::put('/updateuser/{id}', [AuthController::class, 'apdateuser']);
/////////////////////////////////////////////////////////////// 
Route::get('/reponce', [ReponcesController::class, 'index']);
Route::get('/reponce/{id}', [ReponcesController::class, 'show']);
Route::put('/reponce/{id}',[ReponcesController::class, 'update']);
Route::delete('/reponce/{id}',[ReponcesController::class, 'destroy']);
Route::post('/reponce', [ReponcesController::class, 'store']);
/////////////////////////////////////////////////////////////////
Route::get('/examen', [ExamenController::class, 'index']);
Route::post('/examen', [ExamenController::class, 'store']);
Route::put('/examenN/{id}', [ExamenController::class, 'updateNote']); //apdate note
Route::put('/examenQ/{id}', [ExamenController::class, 'updateQuestion']); // apdate question dans un examen
Route::delete('/question/{id}',[QuestionsController::class, 'destroy']);
//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    
    Route::post('/question',[QuestionsController::class, 'store']); 
    Route::put('/question/{id}',[QuestionsController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    
});
//Route::resource('question', QuestionsController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
