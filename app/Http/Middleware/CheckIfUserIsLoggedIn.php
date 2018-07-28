<?php namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Http\Request;

/**
 * CheckIfUserIsLoggedIn
 * @package App\Http\Middleware
 * @author  Gabriel Lucernas Pascual <ghabxph.official@gmail.com>
 * @since   2018.07.28
 */
class CheckIfUserIsLoggedIn
{
    /**
     * Checks whether user is logged in or not
     *
     * @param  Request  $oRequest
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $oRequest, Closure $next)
    {
        if ($this->userInSessionExistsInDatabase() === false) {
            return redirect('/login');
        }
        return $next($oRequest);
    }

    /**
     * Checks if user exist
     *
     * @return bool
     */
    private function userInSessionExistsInDatabase(): bool
    {
        return (User::where('username', session('username'))->get()->first() !== null);
    }
}
