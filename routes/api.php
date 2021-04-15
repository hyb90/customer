    <?php

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

    Route::resource('document', 'APIDocumentation');

    Route::get('/migrate', function () {
        Artisan::call('migrate',
            array(
                '--path' => 'database/migrations',
                //'--database' => 'dynamicdb',
                //  '--force' => true
            )
        );
    });

    Route::get('/rollback', function () {
        Artisan::call('migrate:rollback',
            array(
                '--path' => 'database/migrations',
                //'--database' => 'dynamicdb',
                //  '--force' => true
            )
        );
    });

Route::group(['namespace' => 'App\Http\Controllers'], function () {


    Route::middleware(['auth:api','scope:admin'])->group(function (){

          Route::post('change-role', 'UserController@changeRole')->name('changerole');

    });

    Route::get('routes', 'RoutesController@view');
    Route::get('controlpanel', 'RoutesController@home');
});
