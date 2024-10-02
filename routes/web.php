<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResidentController;
use App\Models\Category;
use App\Models\Letter;
use App\Models\Resident;
use App\Models\VillageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view("pages.index"));
Route::get('/letters', function () {
    $categories = Category::select("*")->get();
    return view("pages.letters", compact('categories'));
});
Route::get("/test", function (Request $request) {
    $id = $request->query('id');
    $letter = Letter::with(['category', 'villageManager', 'resident'])->where('resident_id', $id)->first();
    $person = Resident::find($id);
    $issuer =  VillageManager::find($letter['issued_by']);
    return view('letter.letters.rekom', compact('letter', 'person', 'issuer'));
});
Route::get("/letter/{id}", [LetterController::class, "add"]);
Route::get("/letters/create", [LetterController::class, "create"]);
Route::post("/letters/add", [LetterController::class, "store"]);
Route::get("/myletters", [LetterController::class, 'myletter']);

Route::middleware("guest")->group(function () {
    Route::get("/login", fn() => view("pages.login"))->name('login');
    Route::post("/login", [AuthController::class, 'login']);
});
Route::get("/print/{id}", [LetterController::class, 'print']);

Route::post("/resident", [ResidentController::class, 'store']);
Route::get("/resident/create", function () {
    return view("resident.create");
});
Route::middleware("auth")->group(function () {
    Route::get("/dashboard", function () {
        $residents = Resident::count();
        $letters = Letter::count();
        return   view("pages.dashboard.index", compact('residents', 'letters'));
    });


    Route::get("/dashboard/edit", fn() => view('pages.dashboard.edit'));
    Route::put("/dashboard/edit", [AuthController::class, 'edit']);
    Route::middleware('admin')->group(function () {
        Route::get("/dashboard/residents", [ResidentController::class, 'index']);
        Route::post("/dashboard/resident", [ResidentController::class, 'store']);
        Route::put("/dashboard/resident/{id}", [ResidentController::class, 'update'])->name('residents.update');
        Route::get("/dashboard/residents/create", [ResidentController::class, 'create']);
        Route::get("/dashboard/residents/import", function () {
            return view("pages.dashboard.residentImport");
        });
        Route::get('/excelexample', function () {
            return response()->download(storage_path("app/private/test.xlsx"));
        });
        Route::post("/dashboard/residents/import", [ResidentController::class, 'import']);
        Route::get("/dashboard/residents/export", [ResidentController::class, 'export']);
        Route::get("/dashboard/resident/edit", [ResidentController::class, 'edit']);
        Route::get("/dashboard/resident/delete/{id}", [ResidentController::class, 'delete']);
        Route::get("/dashboard/letter/delete", [LetterController::class, "delete"]);
        Route::get("/dashboard/letter/confirm", [LetterController::class, "confirm"]);
        Route::get("/dashboard/letter/add", [LetterController::class, "dashboardcreate"]);
    });
    Route::get("/dashboard/letter/print/{id}", [LetterController::class, 'print']);
    Route::get("/dashboard/reports", [ReportController::class, 'index']);
    Route::get("/dashboard/reports/print", [ReportController::class, 'print']);
    Route::get("/dashboard/letters", [LetterController::class, "dashboard"]);
    Route::delete("/logout", [AuthController::class, 'logout']);
    Route::get("/api/letters", [LetterController::class, 'api']);
});
