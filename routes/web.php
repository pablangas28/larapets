<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('Helloworld', function(){
    return "<h1>Hello World😁</h1>";
});

Route::get('sayhello/{name}', function(){
    return "<h1> 😊 hello" . request()->name . "</h1>";
});

Route::get('getall/pets', function(){
    $pets = App\Models\Pet::take(10)->get();
    dd($pets->toArray());
});

Route::get('show/pet/{id}', function(){
    $pet = App\Models\Pet::find(request()->id);
    dd($pet->toArray());
});

Route::get('challengue/user/time', function(){
    $users = App\Models\User::take(20)->get();

    $html = '<h1>Table</h1>
             <table border="1">
                <tr>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Created</th>
                </tr>';

    foreach($users as $user){
        $age     = Carbon::parse($user->birthdate)->age;
        $created = Carbon::parse($user->created_at)->diffForHumans();

        $html .= "<tr>
                    <td>{$user->fullname}</td>
                    <td>{$age} years old</td>
                    <td>{$created}</td>
                  </tr>";
    }

    $html .= '</table>';

    return $html;
});

Route::get('view/allpets', function(){
    $pets = App\Models\Pet::all();
    return view('allpets')->with('pets', $pets);
});

Route::get('view/pet/{id}', function(){
    $pet = App\Models\Pet::find(request()->id);
    return view('showpet')->with('pet', $pet);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// MIDDLEWARE AUTH - Profile (todos los auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -------------------------------------------------------
// RUTAS SOLO ADMIN (users + pets CRUD y exports/imports)
// -------------------------------------------------------
Route::middleware(['auth', 'admin'])->group(function () {

    // Resources CRUD
    Route::resources([
        'users' => UserController::class,
        'pets'  => PetController::class,
    ]);

    // Users exports / import / search
    Route::get('export/users/pdf',   [UserController::class, 'pdf']);
    Route::get('export/users/excel', [UserController::class, 'excel']);
    Route::post('import/users',      [UserController::class, 'import']);
    Route::post('search/users',      [UserController::class, 'search']);

    // Pets exports / import / search
    Route::get('export/pets/pdf',    [PetController::class, 'pdf']);
    Route::get('export/pets/excel',  [PetController::class, 'excel']);
    Route::post('import/pets',       [PetController::class, 'import']);
    Route::post('search/pets',       [PetController::class, 'search']);
});

// -------------------------------------------------------
// RUTAS ADOPTIONS (auth, visible para Admin y Customer)
// -------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('adoptions',        [AdoptionController::class, 'index'])->name('adoptions.index');
    Route::get('adoptions/{adoption}', [AdoptionController::class, 'show'])->name('adoptions.show');

    // Solo admin puede exportar
    Route::middleware('admin')->group(function () {
        Route::get('export/adoptions/pdf',   [AdoptionController::class, 'pdf']);
        Route::get('export/adoptions/excel', [AdoptionController::class, 'excel']);
    });

    // Search disponible para todos los auth
    Route::post('search/adoptions', [AdoptionController::class, 'search']);

    // Customer ---
    
    Route::get('myprofile/',   [CustomerController::class, 'myprofile']);
    Route::put('myprofile/{id}',   [CustomerController::class, 'updatemyprofile']);

    Route::get('myadoptions/',   [CustomerController::class, 'myadoptions']);
    Route::get('myadoption/{id}',   [CustomerController::class, 'showmyadoption']);

    Route::get('listpets/',   [CustomerController::class, 'listpets']);
    Route::post('search/adoptionspets', [CustomerController::class, 'search']);
    Route::get('showpet/{id}',   [CustomerController::class, 'showpet']);
    Route::post('makeadoption',   [CustomerController::class, 'makeadoption']);
    Route::post('search/listpets', [CustomerController::class, 'searchpets']);
    

});






require __DIR__.'/auth.php';