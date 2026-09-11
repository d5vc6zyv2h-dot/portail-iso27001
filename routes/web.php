
<?php
use App\Http\Controllers\HelpController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ReportEditController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Page d'accueil
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});


/*
|--------------------------------------------------------------------------
| Tableau de bord
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profil
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/rapport/pdf', [ReportController::class, 'pdf'])
        ->name('report.pdf');


Route::get('/rapport/modifier', [ReportEditController::class, 'edit'])
    ->name('report.edit');

Route::put('/rapport/modifier', [ReportEditController::class, 'update'])
    ->name('report.update');
});


/*
|--------------------------------------------------------------------------
| Gestion des utilisateurs
|--------------------------------------------------------------------------
*/

Route::get('/users', [UserManagementController::class, 'index'])
    ->middleware(['auth', 'role:Administrateur'])
    ->name('users.index');

Route::get('/users/create', [UserManagementController::class, 'create'])
    ->middleware(['auth', 'role:Administrateur'])
    ->name('users.create');

Route::post('/users', [UserManagementController::class, 'store'])
    ->middleware(['auth', 'role:Administrateur'])
    ->name('users.store');

Route::get('/users/{user}', [UserManagementController::class, 'show'])
    ->middleware(['auth', 'role:Administrateur'])
    ->name('users.show');

Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])
    ->middleware(['auth', 'role:Administrateur'])
    ->name('users.edit');

Route::put('/users/{user}', [UserManagementController::class, 'update'])
    ->middleware(['auth', 'role:Administrateur'])
    ->name('users.update');

Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])
    ->middleware(['auth', 'role:Administrateur'])
    ->name('users.destroy');

Route::get('/questionnaire', [QuestionnaireController::class, 'index'])
    ->middleware(['auth'])
    ->name('questionnaire.index');

Route::post('/questionnaire', [QuestionnaireController::class, 'store'])
    ->middleware(['auth'])
    ->name('questionnaire.store');

Route::get('/risks', [RiskController::class, 'index'])
    ->middleware(['auth', 'permission:gerer_risques'])
    ->name('risks.index');

Route::get('/treatments', [TreatmentController::class, 'index'])
    ->middleware(['auth', 'permission:gerer_traitements'])
    ->name('treatments.index');

Route::post('/treatments/{risk}', [TreatmentController::class, 'store'])
    ->middleware(['auth', 'permission:gerer_traitements'])
    ->name('treatments.store');

Route::get('/questionnaire/nouvelle', [QuestionnaireController::class, 'create'])
    ->middleware(['auth'])
    ->name('questionnaire.create');

Route::get('/audit', [AuditLogController::class, 'index'])
    ->middleware(['auth', 'permission:voir_audit'])
    ->name('audit.index');

Route::delete('/audit/{id}', [AuditLogController::class, 'delete'])
    ->name('audit.delete');

Route::post('/audit/{id}/restore', [AuditLogController::class, 'restore'])
    ->middleware(['auth', 'role:Administrateur'])
    ->name('audit.restore');

Route::delete('/audit/{id}/force-delete', [AuditLogController::class, 'forceDelete'])
    ->name('audit.forceDelete');

Route::delete('/audit/{id}/force-delete', [AuditLogController::class, 'forceDelete'])
    ->name('audit.forceDelete');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/evaluations', [EvaluationController::class, 'index'])
        ->name('evaluations.index');

    Route::post('/evaluations/create', [EvaluationController::class, 'create'])
        ->name('evaluations.create');

    Route::post('/evaluations/{evaluation}/select', [EvaluationController::class, 'select'])
        ->name('evaluations.select');

Route::delete('/evaluations/{evaluation}', [EvaluationController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('evaluations.destroy');


Route::post('/evaluations/{id}/restore', [EvaluationController::class, 'restore'])
    ->middleware(['auth', 'verified'])
    ->name('evaluations.restore');	


Route::get('/aide-contact', [HelpController::class, 'index'])
    ->middleware('auth')
    ->name('help.index');	

});
/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/


require __DIR__.'/auth.php';
