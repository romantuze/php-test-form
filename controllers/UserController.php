<?php
namespace controllers;

use core\Controller;

class UserController extends Controller
{
    public function loginAction()
    {

        if (!empty($_POST)) {
            if (!$this->model->validate(['login', 'password'], $_POST)) {
                $this->view->message('error', $this->model->error);
            }
            if (!$this->model->checkData($_POST['login'], $_POST['password'])) {
                $this->view->message('error', 'Логин или пароль указан не верно');
            }
            $this->model->login($_POST['login']);
            $this->view->location('profile');
        }

        $this->view->render('Вход');
    }

    public function signupAction()
    {

        if (!empty($_POST)) {
            if (!$this->model->validate(['email', 'login', 'fio', 'password'], $_POST)) {
                $this->view->message('error', $this->model->error);
            } elseif ($this->model->checkEmailExists($_POST['email'])) {
                $this->view->message('error', 'Этот E-mail уже используется');

            } elseif (!$this->model->checkLoginExists($_POST['login'])) {
                $this->view->message('error', $this->model->error);
            } elseif (!$this->model->validateImage($_FILES)) {
                $this->view->message('error', $this->model->error);
            }

            $this->model->reg($_POST);
            $this->view->message('success', 'Регистрация завершена');
        }

        $this->view->render('Регистрация');
    }

    public function profileAction()
    {
        if (isset($_SESSION['user'])) {
            $vars = [
                'user' => $_SESSION['user'],
            ];
            $this->view->render('Профиль', $vars);
        } else {
            $this->view->redirect('');
        }
    }

    public function logoutAction()
    {
        unset($_SESSION['user']);
        $this->view->render('Выход');
        $this->view->redirect('');
    }

}
