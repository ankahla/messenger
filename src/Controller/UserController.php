<?php

namespace Controller;

use Model\Utils\Form;
use Model\Services\UserManager;
use Model\Services\SecurityManager;

class UserController extends AbstractController
{
    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * @var SecurityManager
     */
    private $securityManager;

    /**
     * @var Form
     */
    private $formUtils;

    public function __construct()
    {
        $this->userManager = $this->getContainer()->get(UserManager::class);
        $this->securityManager = $this->getContainer()->get(SecurityManager::class);
        $this->formUtils = new Form();
    }

    public function showLogin()
    {
        $token = $this->formUtils->getToken();
        $errors = $this->formUtils->getErrorMessage();
        $email = $this->getRequestField('email');
        $passwd = $this->getRequestField('passwd');

        $this->renderTemplate(
        	'login',
        	[
        		'email' => $email,
        		'passwd' => $passwd,
        		'errors' => $errors,
        		'token' => $token,
        	]
        );
    }

    public function processLogin()
    {
        if ($this->formUtils->checkToken()) {
            $email = $this->getRequestField('email');
            $passwd = $this->getRequestField('passwd');

            if ($this->securityManager->authenticate($email, $passwd)) {
                $this->redirectTo('/chat_board');
            } else {
                $this->formUtils->errorMessage(['Identifiant utilisateur non valide']);
                $this->redirectTo('/login');
            }
        } else {
            $this->formUtils->errorMessage(['Formulaire invalide']);
            $this->redirectTo('/login');
        }
    }

    public function showRegister()
    {
        $token = $this->formUtils->getToken();
        $errors = $this->formUtils->getErrorMessage();
        $email = $this->getRequestField('email');
        $firstName = $this->getRequestField('first_name');
        $lastName = $this->getRequestField('last_name');
        $passwd = $this->getRequestField('passwd');

        $this->renderTemplate(
        	'register',
        	[
        		'email' => $email,
        		'firstName' => $firstName,
        		'lastName' => $lastName,
        		'passwd' => $passwd,
        		'errors' => $errors,
        		'token' => $token,
        	]
        );
    }

    public function processRegister()
    {
        if ($this->formUtils->checkToken()) {
            $email = $this->getRequestField('email');
            $firstName = $this->getRequestField('first_name');
            $lastName = $this->getRequestField('last_name');
            $passwd = htmlspecialchars($_POST['passwd']);

            if ($this->userManager->createUser($email, $firstName, $lastName, $passwd)) {
                $this->securityManager->authenticate($email, $passwd);
                $this->redirectTo('/chat_board');
            } else {
                $this->formUtils->errorMessage(['Identifiant utilisateur non valide']);
                $this->redirectTo('/login');
            }
        } else {
            $this->formUtils->errorMessage(['Formulaire invalide']);
            $this->redirectTo('/login');
        }
    }

    public function logout()
    {
        if ($this->securityManager->signOut()) {
            $this->redirectTo('/login');
        }
    }
}

