<?php namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * SampleController
 * @package App\Http\Controllers
 * @author  Gabriel Lucernas Pascual <ghabxph.official@gmail.com>
 * @since   2018.07.28
 */
class LoginController extends Controller
{
    /**
     * Invalid username and password message
     */
    private const MSG_INVALID_CREDENTIALS = 'Invalid username and/or password';

    /**
     * @var Request
     */
    private $oRequest;

    /**
     * Instance of user that is retrieved from the database
     *
     * @var User
     */
    private $oUserFromDb;

    /**
     * LoginController constructor.
     * @param Request $oRequest
     */
    public function __construct(Request $oRequest)
    {
        $this->oRequest = $oRequest;
    }

    /**
     * Shows the login page
     *
     * @return View
     */
    public function showLoginPage()
    {
        return view('login.login');
    }

    /**
     * Logs user in
     */
    public function doLogin()
    {
        try {
            return $this
                ->checkIfUserExists()
                ->thenCheckIfPasswordIsCorrect()
                ->proceedToResourceIfCredentialIsCorrect();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Checks if user exist
     *
     * @return LoginController
     * @throws Exception
     */
    private function checkIfUserExists(): LoginController
    {
        $this->oUserFromDb = User::where('username', $this->oRequest->input('username'))->get()->first();
        if ($this->oUserFromDb === null) {
            throw new Exception(self::MSG_INVALID_CREDENTIALS);
        }
        return $this;
    }

    /**
     * Checks whether password is correct
     *
     * @return LoginController
     * @throws Exception
     */
    private function thenCheckIfPasswordIsCorrect(): LoginController
    {
        if (password_verify($this->oRequest->input('password'), $this->oUserFromDb->password) === false) {
            throw new Exception(self::MSG_INVALID_CREDENTIALS);
        }
        return $this;
    }

    /**
     * Redirect to /sample page if user credential is valid
     *
     * @return RedirectResponse
     */
    private function proceedToResourceIfCredentialIsCorrect(): RedirectResponse
    {
        session(['username' => $this->oRequest->input('username')]);
        return redirect('/sample');
    }
}
