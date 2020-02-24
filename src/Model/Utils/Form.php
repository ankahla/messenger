<?php

namespace Model\Utils;

final class Form
{
    public function __construct()
    {
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = md5(time());
        }

    }

    public function getToken(): string
    {
        return $_SESSION['token'];
    }

    public function checkToken(): bool
    {
        return
            isset($_SESSION['token']) &&
            isset($_POST['token']) &&
            !empty($_SESSION['token']) &&
            !empty($_POST['token']) &&
            $_SESSION['token'] == $_POST['token'];
    }

    public function errorMessage($errors): void
    {
        $_SESSION['formErrors'] = $errors;
    }

    public function getErrorMessage(): array
    {
        $messages = $_SESSION['formErrors'] ?? [];
        $_SESSION['formErrors'] = [];

        return $messages;
    }
}