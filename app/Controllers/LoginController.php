<?php

namespace App\Controllers;

// use CodeIgniter\HTTP\RedirectResponse;
// use CodeIgniter\Shield\Authentication\Authenticators\Session;
// // use CodeIgniter\Shield\Authentication\Passwords;
// // use CodeIgniter\Shield\Traits\Viewable;

use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;

class LoginController extends ShieldLogin
{
    /**
     * Attempts to log the user in.
     */
    public function mobileLogin()
    {
        // auth()->logout();
        $returnResponse = ['success' => false];
        if (auth()->loggedIn()) {
            $returnResponse['success'] = true;
            $returnResponse['access_token'] = $this->request->getPost('token');
            $returnResponse['data'] = auth()->user();

            return $this->response->setJSON($returnResponse);
        }
        // return $this->response->setJSON(['message' => 'request recieved']);
        // return $this->response->setJSON(['message'=>'request recieved']);
        // Validate credentials
        $rules = setting('Validation.login') ?? [
            'email' => [
                'label' => 'Auth.email',
                'rules' => config('AuthSession')->emailValidationRules,
            ],
            'password' => [
                'label' => 'Auth.password',
                'rules' => 'required',
            ],
            'device_name' => [
                'label' => 'Device Name',
                'rules' => 'required|string',
            ],
        ];

        // return $this->response->setJSON($this->validateData($this->request->getPost(), $rules));
        if (!$this->validateData($this->request->getPost(), $rules)) {
            return $this->response
                ->setJSON(['errors' => $this->validator->getErrors()])
                ->setStatusCode(401);
        }

        // Get the credentials for login
        // $credentials             = $this->request->getPost(setting('Auth.validFields'));
        // $credentials             = array_filter($credentials);
        $credentials['email'] = $this->request->getPost('email');
        $credentials['password'] = $this->request->getPost('password');
        // return $this->response->setJSON(['$credentials' => $credentials]);

        // Attempt to login
        $result = auth()->attempt($credentials);
        // return $this->response->setJSON(['$result' => $result]);

        if (!$result->isOK()) {
            // return $this->response->setJSON(['!$result->isOK()' => $result->reason()]);
            return $this->response
                ->setJSON(['error' => $result->reason()])
                ->setStatusCode(401);
        }

        // Generate token and return to client
        $tokenKey = $this->request->getPost('email') . $this->request->getPost('device_name') . time();
        // return $this->response->setJSON(['$tokenKey' => $tokenKey]);

        $userData = auth()->user();
        $token = $userData->generateAccessToken($tokenKey);
        // return $this->response->setJSON(['$token' => $token]);

        // return $this->response->setJSON(['$userData' => $userData]);

        $returnResponse['success'] = true;
        $returnResponse['access_token'] = $token->raw_token;
        $returnResponse['data'] = $userData;

        return $this->response->setJSON($returnResponse);
    }

    public function mobileLogout()
    {
        if (auth()->loggedIn()) {
            auth()->user()->revokeAllAccessTokens();
            auth()->logout();
        }
        return $this->response->setJSON(['success' => true]);
    }
}
