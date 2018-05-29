<?php

namespace App\Http\Controllers;

use App\Enumerations\UserStatus;
use App\User;
use App\UserActivation;

/**
 * Class ActivateUserController
 *
 * @package App\Http\Controllers
 * @author Pisyek K
 * @url www.pisyek.com
 * @copyright © 2017 Pisyek Studios
 */
class ActivateUserController extends Controller
{
    /**
     * Activate user by token
     *
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke($token)
    {
        $activation = UserActivation::where('token', '=', $token)->firstOrFail();

        $user = User::findOrFail($activation->user_id);

        $user->fill([
            'status' => UserStatus::ACTIVE,
        ]);

        if ($user->save()) {
            UserActivation::where('token', '=', $token)->delete();
            return redirect('login')->with('message', 'Your account has been activated.');
        }
    }
}
