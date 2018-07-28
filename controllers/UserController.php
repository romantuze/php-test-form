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
                $this->view->message('error', $this->model->error);
            }
            $this->model->login($_POST['login']);
            $this->view->location('profile');
        }

        $this->view->render(LANG_LOGIN);
    }

    public function signupAction()
    {

        if (!empty($_POST)) {
            if (!$this->model->validate(['email', 'login', 'fio', 'password'], $_POST)) {
                $this->view->message('error', $this->model->error);
            } elseif ($this->model->checkEmailExists($_POST['email'])) {
                $this->view->message('error', $this->model->error);
            } elseif (!$this->model->checkLoginExists($_POST['login'])) {
                $this->view->message('error', $this->model->error);
            } elseif (!$this->model->validateImage($_FILES)) {
                $this->view->message('error', $this->model->error);
            }
            $this->model->reg($_POST);
            $this->view->message('success', LANG_FINISH);
        }
        $this->view->render(LANG_REGISTRATION);
    }

    public function profileAction()
    {
        if (isset($_SESSION['user'])) {
            $vars = [
                'user' => $_SESSION['user'],
            ];
            $this->view->render(LANG_PROFILE, $vars);
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

    public function langAction()
    {
        if (!empty($_POST['lang'])) {
            if ($_POST['lang'] == 'rus') {
                $_SESSION['lang'] = 'rus';
            } else if ($_POST['lang'] == 'eng') {
                $_SESSION['lang'] = 'eng';
            }
        }
    }

}
