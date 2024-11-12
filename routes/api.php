<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\IncomeEntryController;
use App\Http\Controllers\Api\AssetEntryController;
use App\Http\Controllers\Api\V1\BusinessAssetController;
use App\Http\Controllers\Api\V1\DirectoryShareController;
use App\Http\Controllers\Api\V1\JewelleryController;
use App\Http\Controllers\Api\V1\CashAndFundController;
use App\Http\Controllers\Api\V1\MotorVehicleController;
use App\Http\Controllers\Api\V1\FinancialAssetController;
use App\Http\Controllers\Api\V1\FurnitureEquipmentController;
use App\Http\Controllers\Api\V1\SelfFamilyExpenseController;
use App\Http\Controllers\Api\V1\HousingExpenseController;
use App\Http\Controllers\Api\V1\UtilityExpenseController;
use App\Http\Controllers\Api\V1\FinanceExpenseController;
use App\Http\Controllers\Api\V1\TransportExpenseController;
use App\Http\Controllers\Api\V1\EducationExpenseController;
use App\Http\Controllers\Api\V1\VacationFestivalExpenseController;
use App\Http\Controllers\Api\V1\AssetEntries\AgriNonAgriLandController;
use App\Http\Controllers\Api\V1\Settings\SettingController;
use App\Http\Controllers\Api\V1\Settings\TypeOfPropertyController;

// Auth routes with 'auth:api' middleware applied where necessary
Route::group(['prefix' => 'auth', 'middleware' => 'api'], function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
    Route::patch('/profile-update/{user}', [UserController::class, 'update'])->name('profile.update');
});

// Income and Asset routes
Route::middleware('api')->group(function () {
    // Income entries
    Route::get('/income-entries', [IncomeEntryController::class, 'index']);
    Route::get('/income-entries/{userId}', [IncomeEntryController::class, 'show']);
    Route::post('/income-entries', [IncomeEntryController::class, 'store']);
    Route::patch('/income-entries/{id}', [IncomeEntryController::class, 'update']);
    Route::delete('/income-entries/{id}', [IncomeEntryController::class, 'destroy']);

    Route::get('/business-assets', [BusinessAssetController::class, 'index']);
    Route::post('/business-assets', [BusinessAssetController::class, 'storeOrUpdate']);
    Route::delete('/business-assets/{id}', [BusinessAssetController::class, 'destroy']);

    Route::get('/directory-shares', [DirectoryShareController::class, 'index']);
    Route::post('/directory-shares', [DirectoryShareController::class, 'storeOrUpdate']);
    Route::delete('/directory-shares/{id}', [DirectoryShareController::class, 'destroy']);

    // Asset entries
    // Route::get('/assets-entries', [\App\Http\Controllers\Api\AssetEntryController::class, 'index'])->name('asset-entries');
    // Route::post('/assets-entries', [\App\Http\Controllers\Api\AssetEntryController::class, 'store'])->name('asset-entries');
    // Route::patch('/assets-entries/{id}', [\App\Http\Controllers\Api\AssetEntryController::class, 'update'])->name('assets-entries');
    // Route::delete('/assets-entries/{id}', [\App\Http\Controllers\Api\AssetEntryController::class, 'destroy'])->name('assets-entries');


    Route::get('/agri-non-agri-lands', [AgriNonAgriLandController::class, 'index']);
    Route::post('/agri-non-agri-lands', [AgriNonAgriLandController::class, 'storeOrUpdate']);
    Route::delete('/agri-non-agri-lands/{id}', [AgriNonAgriLandController::class, 'destroy']);

    Route::get('/financial-assets', [FinancialAssetController::class, 'index']);
    Route::post('/financial-assets', [FinancialAssetController::class, 'storeOrUpdate']);
    Route::delete('/financial-assets/{id}', [FinancialAssetController::class, 'destroy']);

    Route::get('/motor-vehicles', [MotorVehicleController::class, 'index']);
    Route::post('/motor-vehicles', [MotorVehicleController::class, 'storeOrUpdate']);
    Route::delete('/motor-vehicles/{id}', [MotorVehicleController::class, 'destroy']);

    Route::get('/furniture-equipments', [FurnitureEquipmentController::class, 'index']);
    Route::post('/furniture-equipments', [FurnitureEquipmentController::class, 'storeOrUpdate']);
    Route::delete('/furniture-equipments/{id}', [FurnitureEquipmentController::class, 'destroy']);

    Route::get('/jewelleries', [JewelleryController::class, 'index']);
    Route::post('/jewelleries', [JewelleryController::class, 'storeOrUpdate']);
    Route::delete('/jewelleries/{id}', [JewelleryController::class, 'destroy']);


    Route::get('/self-family-expenses', [SelfFamilyExpenseController::class, 'index']);
    Route::post('/self-family-expenses', [SelfFamilyExpenseController::class, 'store']);
    Route::patch('/self-family-expenses/{id}', [SelfFamilyExpenseController::class, 'update']);

    Route::get('/housing-expenses', [HousingExpenseController::class, 'index']);
    Route::post('/housing-expenses', [HousingExpenseController::class, 'store']);
    Route::patch('/housing-expenses/{id}', [HousingExpenseController::class, 'update']);

    Route::get('/utility-expenses',  [UtilityExpenseController::class, 'index']);
    Route::post('/utility-expenses',  [UtilityExpenseController::class, 'store']);
    Route::patch('/utility-expenses/{id}',  [UtilityExpenseController::class, 'update']);

    Route::get('/education-expenses',  [EducationExpenseController::class, 'index']);
    Route::post('/education-expenses',  [EducationExpenseController::class, 'store']);
    Route::patch('/education-expenses/{id}',  [EducationExpenseController::class, 'update']);

    Route::get('/finance-expenses',  [FinanceExpenseController::class, 'index']);
    Route::post('/finance-expenses',  [FinanceExpenseController::class, 'store']);
    Route::patch('/finance-expenses/{id}',  [FinanceExpenseController::class, 'update']);

    //liabilities entry
    Route::get('/institutional-liabilities', [\App\Http\Controllers\Api\V1\LiabilitiesEntry\InstitutionalLiabilitiesController::class, 'index']);
    Route::post('/institutional-liabilities', [\App\Http\Controllers\Api\V1\LiabilitiesEntry\InstitutionalLiabilitiesController::class, 'storeOrUpdate']);
    Route::delete('/institutional-liabilities/{id}', [\App\Http\Controllers\Api\V1\LiabilitiesEntry\InstitutionalLiabilitiesController::class, 'destroy']);

    Route::get('/non-institutional-liabilities', [\App\Http\Controllers\Api\V1\LiabilitiesEntry\NonInstitutionalLiabilitiesController::class, 'index']);
    Route::post('/non-institutional-liabilities', [\App\Http\Controllers\Api\V1\LiabilitiesEntry\NonInstitutionalLiabilitiesController::class, 'storeOrUpdate']);
    Route::delete('/non-institutional-liabilities/{id}', [\App\Http\Controllers\Api\V1\LiabilitiesEntry\NonInstitutionalLiabilitiesController::class, 'destroy']);

    Route::get('/other-liabilities', [\App\Http\Controllers\Api\V1\LiabilitiesEntry\OtherLiabilitiesController::class, 'index']);
    Route::post('/other-liabilities', [\App\Http\Controllers\Api\V1\LiabilitiesEntry\OtherLiabilitiesController::class, 'storeOrUpdate']);
    Route::delete('/other-liabilities/{id}', [\App\Http\Controllers\Api\V1\LiabilitiesEntry\OtherLiabilitiesController::class, 'destroy']);


    Route::get('/transport-expenses',  [TransportExpenseController::class, 'index']);
    Route::post('/transport-expenses',  [TransportExpenseController::class, 'store']);
    Route::patch('/transport-expenses/{id}',  [TransportExpenseController::class, 'update']);

    Route::get('/cash-and-funds',  [CashAndFundController::class, 'index']);
    Route::post('/cash-and-funds',  [CashAndFundController::class, 'storeOrUpdate']);
    Route::delete('/cash-and-funds/{id}', [CashAndFundController::class, 'destroy']);

    Route::get('/vacation-festival-expenses',  [VacationFestivalExpenseController::class, 'index']);
    Route::post('/vacation-festival-expenses',  [VacationFestivalExpenseController::class, 'store']);
    Route::patch('/vacation-festival-expenses/{id}',  [VacationFestivalExpenseController::class, 'update']);

    Route::get('/savings-plan',  [\App\Http\Controllers\Api\V1\investmentCredit\SavingsPlanController::class, 'index']);
    Route::post('/savings-plan',  [\App\Http\Controllers\Api\V1\investmentCredit\SavingsPlanController::class, 'store']);
    Route::patch('/savings-plan/{id}',  [\App\Http\Controllers\Api\V1\investmentCredit\SavingsPlanController::class, 'update']);
    Route::delete('/savings-plan/{id}', [\App\Http\Controllers\Api\V1\investmentCredit\SavingsPlanController::class, 'destroy']);


    Route::get('/gov-securities',  [\App\Http\Controllers\Api\V1\investmentCredit\GovSecuritiesController::class, 'index']);
    Route::post('/gov-securities',  [\App\Http\Controllers\Api\V1\investmentCredit\GovSecuritiesController::class, 'store']);
    Route::patch('/gov-securities/{id}',  [\App\Http\Controllers\Api\V1\investmentCredit\GovSecuritiesController::class, 'update']);
    Route::delete('/gov-securities/{id}', [\App\Http\Controllers\Api\V1\investmentCredit\GovSecuritiesController::class, 'destroy']);


    Route::get('/listed-securities',  [\App\Http\Controllers\Api\V1\investmentCredit\ListedSecuritiesController::class, 'index']);
    Route::post('/listed-securities',  [\App\Http\Controllers\Api\V1\investmentCredit\ListedSecuritiesController::class, 'store']);
    Route::patch('/listed-securities/{id}',  [\App\Http\Controllers\Api\V1\investmentCredit\ListedSecuritiesController::class, 'update']);
    Route::delete('/listed-securities/{id}', [\App\Http\Controllers\Api\V1\investmentCredit\ListedSecuritiesController::class, 'destroy']);

    Route::get('/retirement-plans',  [\App\Http\Controllers\Api\V1\investmentCredit\RetirementPlanController::class, 'index']);
    Route::post('/retirement-plans',  [\App\Http\Controllers\Api\V1\investmentCredit\RetirementPlanController::class, 'store']);
    Route::patch('/retirement-plans/{id}',  [\App\Http\Controllers\Api\V1\investmentCredit\RetirementPlanController::class, 'update']);
    Route::delete('/retirement-plans/{id}', [\App\Http\Controllers\Api\V1\investmentCredit\RetirementPlanController::class, 'destroy']);

    Route::get('/other-investments',  [\App\Http\Controllers\Api\V1\investmentCredit\OtherInvestmentController::class, 'index']);
    Route::post('/other-investments',  [\App\Http\Controllers\Api\V1\investmentCredit\OtherInvestmentController::class, 'store']);
    Route::patch('/other-investments/{id}',  [\App\Http\Controllers\Api\V1\investmentCredit\OtherInvestmentController::class, 'update']);
    Route::delete('/other-investments/{id}', [\App\Http\Controllers\Api\V1\investmentCredit\OtherInvestmentController::class, 'destroy']);


    Route::get('/client-lists',  [UserController::class, 'clientList']);
    Route::post('/client-lists',  [UserController::class, 'clientStore']);
    Route::patch('/client-lists/{id}',  [UserController::class, 'clientUpdate']);
    Route::delete('/client-lists/{id}', [UserController::class, 'clientDestroy']);


    Route::get('/partnership-business',  [\App\Http\Controllers\Api\V1\PartnershipBusinessController::class, 'index']);
    Route::post('/partnership-business',  [\App\Http\Controllers\Api\V1\PartnershipBusinessController::class, 'storeOrUpdate']);
    Route::patch('/partnership-business/{id}',  [\App\Http\Controllers\Api\V1\PartnershipBusinessController::class, 'storeOrUpdate']);
    Route::delete('/partnership-business/{id}', [\App\Http\Controllers\Api\V1\PartnershipBusinessController::class, 'destroy']);

    Route::get('/asset-outside-bd',  [\App\Http\Controllers\Api\V1\AssetOutsideBDController::class, 'index']);
    Route::post('/asset-outside-bd',  [\App\Http\Controllers\Api\V1\AssetOutsideBDController::class, 'storeOrUpdate']);
    Route::patch('/asset-outside-bd/{id}',  [\App\Http\Controllers\Api\V1\AssetOutsideBDController::class, 'storeOrUpdate']);
    Route::delete('/asset-outside-bd/{id}', [\App\Http\Controllers\Api\V1\AssetOutsideBDController::class, 'destroy']);

});


### SETTINGS ROUTE ###
Route::group(['prefix' => 'settings', 'middleware' => 'api'], function () {
    Route::get('/common', [SettingController::class, 'index']);
    Route::post('/common', [SettingController::class, 'store']);
    Route::patch('/common/{id}', [SettingController::class, 'update']);
    Route::delete('/common/{id}', [SettingController::class, 'destroy']);

    Route::get('/type-of-properties', [TypeOfPropertyController::class, 'index']);
    Route::post('/type-of-properties', [TypeOfPropertyController::class, 'store']);
    Route::patch('/type-of-properties/{id}', [TypeOfPropertyController::class, 'update']);
    Route::delete('/type-of-properties/{id}', [TypeOfPropertyController::class, 'destroy']);
    Route::get('/type-of-vehicles', [TypeOfVehicleController::class, 'index']);
    Route::post('/type-of-vehicles', [TypeOfVehicleController::class, 'store']);
    Route::patch('/type-of-vehicles/{id}', [TypeOfVehicleController::class, 'update']);
    Route::delete('/type-of-vehicles/{id}', [TypeOfVehicleController::class, 'destroy']);

    Route::get('/circles', [\App\Http\Controllers\Api\V1\Settings\CircleController::class, 'index']);
    Route::post('/circles', [\App\Http\Controllers\Api\V1\Settings\CircleController::class, 'store']);
    Route::patch('/circles/{id}', [\App\Http\Controllers\Api\V1\Settings\CircleController::class, 'update']);
    Route::delete('/circles/{id}', [\App\Http\Controllers\Api\V1\Settings\CircleController::class, 'destroy']);

    Route::get('/zones', [\App\Http\Controllers\Api\V1\Settings\ZoneController::class, 'index']);
    Route::post('/zones', [\App\Http\Controllers\Api\V1\Settings\ZoneController::class, 'store']);
    Route::patch('/zones/{id}', [\App\Http\Controllers\Api\V1\Settings\ZoneController::class, 'update']);
    Route::delete('/zones/{id}', [\App\Http\Controllers\Api\V1\Settings\ZoneController::class, 'destroy']);

    // Drodowns
    Route::get('/dropdown', [SettingController::class, 'dropdown']);
    Route::get('/complex-dropdown', [SettingController::class, 'complexDropdown']);
});
