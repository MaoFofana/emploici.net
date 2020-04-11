<?php

use App\Models\Message;
use App\User;
use App\Models\MessageCountUsers;
use Illuminate\Http\Request;

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
Artisan::call('storage:link');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('entreprises', 'EntrepriseAPIController');

Route::resource('jobs', 'JobAPIController');

Route::resource('messages', 'MessageAPIController');

Route::resource('new_letters', 'NewLetterAPIController');

Route::resource('postulers', 'PostulerAPIController');

Route::post('/search', 'JobAPIController@search');
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

    Route::get('users',function (){
        $users = User::All();
        $messageCountUsers =   array();
        foreach ($users as $user) {
            $count = 0;
            $messageCountUser = new MessageCountUsers();
            $messages = Message::where('from',$user->id) ->orWhere('to', $user->id)->get();
            if(!empty($messages)){

                foreach ($messages as $message) {
                    if($message->lu == false && $message->to != $user->id){
                        ++$count;
                    }
                    $messageCountUser->dernier = $message->message;
                }

                $messageCountUser->user = $user;
                $messageCountUser->count = $count;
                array_push($messageCountUsers, $messageCountUser);
            }
        }
        return response()->json($messageCountUsers, 200) ;
    });

    Route::get('listmessage/{id}', "MessageAPIController@getMessage");

    Route::post('message/send', "MessageAPIController@sendMessage");

    Route::post('lu', "MessageAPIController@lu");
});


