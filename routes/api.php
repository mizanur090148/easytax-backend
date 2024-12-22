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
use App\Http\Controllers\Api\V1\SavingsPlanController;
use App\Http\Controllers\Api\V1\NonInstitutionalLiabilitiesController;
use App\Http\Controllers\Api\V1\GovSecuritiesController;
use App\Http\Controllers\Api\V1\InstitutionalLiabilitiesController;
use App\Http\Controllers\Api\V1\OtherLiabilitiesController;
use App\Http\Controllers\Api\V1\ListedSecuritiesController;
use App\Http\Controllers\Api\V1\RetirementPlanController;
use App\Http\Controllers\Api\V1\PartnershipBusinessController;
use App\Http\Controllers\Api\V1\TotalDataController;
use App\Http\Controllers\Api\V1\AssetEntries\AgriNonAgriLandController;
use App\Http\Controllers\Api\V1\Settings\SettingController;
use App\Http\Controllers\Api\V1\Settings\TypeOfPropertyController;
use App\Http\Controllers\Api\V1\Settings\AssessmentYearController;

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
    Route::get('/institutional-liabilities', [InstitutionalLiabilitiesController::class, 'index']);
    Route::post('/institutional-liabilities', [InstitutionalLiabilitiesController::class, 'storeOrUpdate']);
    Route::delete('/institutional-liabilities/{id}', [InstitutionalLiabilitiesController::class, 'destroy']);

    Route::get('/non-institutional-liabilities', [NonInstitutionalLiabilitiesController::class, 'index']);
    Route::post('/non-institutional-liabilities', [NonInstitutionalLiabilitiesController::class, 'storeOrUpdate']);
    Route::delete('/non-institutional-liabilities/{id}', [NonInstitutionalLiabilitiesController::class, 'destroy']);

    Route::get('/other-liabilities', [OtherLiabilitiesController::class, 'index']);
    Route::post('/other-liabilities', [OtherLiabilitiesController::class, 'storeOrUpdate']);
    Route::delete('/other-liabilities/{id}', [OtherLiabilitiesController::class, 'destroy']);


    Route::get('/transport-expenses',  [TransportExpenseController::class, 'index']);
    Route::post('/transport-expenses',  [TransportExpenseController::class, 'store']);
    Route::patch('/transport-expenses/{id}',  [TransportExpenseController::class, 'update']);

    Route::get('/cash-and-funds',  [CashAndFundController::class, 'index']);
    Route::post('/cash-and-funds',  [CashAndFundController::class, 'storeOrUpdate']);
    Route::delete('/cash-and-funds/{id}', [CashAndFundController::class, 'destroy']);

    Route::get('/vacation-festival-expenses',  [VacationFestivalExpenseController::class, 'index']);
    Route::post('/vacation-festival-expenses',  [VacationFestivalExpenseController::class, 'store']);
    Route::patch('/vacation-festival-expenses/{id}',  [VacationFestivalExpenseController::class, 'update']);

    Route::get('/savings-plan',  [SavingsPlanController::class, 'index']);
    Route::post('/savings-plan',  [SavingsPlanController::class, 'store']);
    Route::patch('/savings-plan/{id}',  [SavingsPlanController::class, 'update']);
    Route::delete('/savings-plan/{id}', [SavingsPlanController::class, 'destroy']);


    Route::get('/gov-securities',  [GovSecuritiesController::class, 'index']);
    Route::post('/gov-securities',  [GovSecuritiesController::class, 'store']);
    Route::patch('/gov-securities/{id}',  [GovSecuritiesController::class, 'update']);
    Route::delete('/gov-securities/{id}', [GovSecuritiesController::class, 'destroy']);


    Route::get('/listed-securities',  [ListedSecuritiesController::class, 'index']);
    Route::post('/listed-securities',  [ListedSecuritiesController::class, 'store']);
    Route::patch('/listed-securities/{id}',  [ListedSecuritiesController::class, 'update']);
    Route::delete('/listed-securities/{id}', [ListedSecuritiesController::class, 'destroy']);

    Route::get('/retirement-plans',  [RetirementPlanController::class, 'index']);
    Route::post('/retirement-plans',  [RetirementPlanController::class, 'store']);
    Route::patch('/retirement-plans/{id}',  [RetirementPlanController::class, 'update']);
    Route::delete('/retirement-plans/{id}', [RetirementPlanController::class, 'destroy']);

    Route::get('/other-investments',  [OtherInvestmentController::class, 'index']);
    Route::post('/other-investments',  [OtherInvestmentController::class, 'store']);
    Route::patch('/other-investments/{id}',  [OtherInvestmentController::class, 'update']);
    Route::delete('/other-investments/{id}', [OtherInvestmentController::class, 'destroy']);


    Route::get('/client-lists',  [UserController::class, 'clientList']);
    Route::post('/client-lists',  [UserController::class, 'clientStore']);
    Route::patch('/client-lists/{id}',  [UserController::class, 'clientUpdate']);
    Route::delete('/client-lists/{id}', [UserController::class, 'clientDestroy']);


    Route::get('/partnership-business',  [PartnershipBusinessController::class, 'index']);
    Route::post('/partnership-business',  [PartnershipBusinessController::class, 'storeOrUpdate']);
    Route::patch('/partnership-business/{id}',  [PartnershipBusinessController::class, 'storeOrUpdate']);
    Route::delete('/partnership-business/{id}', [PartnershipBusinessController::class, 'destroy']);

    Route::get('/asset-outside-bd',  [AssetOutsideBDController::class, 'index']);
    Route::post('/asset-outside-bd',  [AssetOutsideBDController::class, 'storeOrUpdate']);
    Route::patch('/asset-outside-bd/{id}',  [AssetOutsideBDController::class, 'storeOrUpdate']);
    Route::delete('/asset-outside-bd/{id}', [AssetOutsideBDController::class, 'destroy']);

    // Expense entry
    Route::get('/tax-paid-refund',  [\App\Http\Controllers\Api\V1\TaxPaidRefundController::class, 'index']);
    Route::post('/tax-paid-refund',  [\App\Http\Controllers\Api\V1\TaxPaidRefundController::class, 'storeOrUpdate']);
    Route::patch('/tax-paid-refund/{id}',  [\App\Http\Controllers\Api\V1\TaxPaidRefundController::class, 'storeOrUpdate']);
    Route::delete('/tax-paid-refund/{id}', [\App\Http\Controllers\Api\V1\TaxPaidRefundController::class, 'destroy']);

});

Route::middleware('api')->group(function () {
    Route::get('/past-return-total', [TotalDataController::class, 'pastReturnTotal']);
    Route::get('/income-entry-total', [TotalDataController::class, 'incomeEntryTotal']);
    Route::get('/assets-return-total', [TotalDataController::class, 'assetsReturnTotal']);
    Route::get('/liabilities-total', [TotalDataController::class, 'liabilityTotal']);
    Route::get('/expenses-total', [TotalDataController::class, 'expenseTotal']);
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

    Route::get('/income-and-assessment', [AssessmentYearController::class, 'incomeAndAssessment']);
    Route::get('/assessment-years', [AssessmentYearController::class, 'index']);
    Route::post('/assessment-years', [AssessmentYearController::class, 'store']);
    Route::patch('/assessment-years/{id}', [AssessmentYearController::class, 'update']);
    Route::delete('/assessment-years/{id}', [AssessmentYearController::class, 'destroy']);



    // Drodowns
    Route::get('/dropdown', [SettingController::class, 'dropdown']);
    Route::get('/complex-dropdown', [SettingController::class, 'complexDropdown']);
});
