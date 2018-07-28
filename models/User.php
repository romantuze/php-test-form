<?php

namespace models;

use core\Model;

class User extends Model
{
    public $photoname = '';

    public function validate($input, $post)
    {
        $rules = [
            'email'    => [
                'pattern' => '#^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
                'message' => LANG_ERROR_EMAIL,
            ],
            'login'    => [
                'pattern' => '#^[a-z0-9]{3,15}$#',
                'message' => LANG_ERROR_LOGIN,
            ],
            'password' => [
                'pattern' => '#^[a-zA-Z0-9]{6,30}$#',
                'message' => LANG_ERROR_PAS,
            ],
            'fio'      => [
                'pattern' => '#^[a-zA-Zа-яА-Я\s]{3,50}$#',
                'message' => LANG_ERROR_FIO,
            ],
        ];

        foreach ($input as $val) {
            if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->error = $rules[$val]['message'];
                return false;
            }
        }
        return true;
    }

    public function checkEmailExists($email)
    {
        $params = [
            'email' => $email,
        ];
        $result = $this->db->column('SELECT id FROM users WHERE email = :email', $params);
        if ($result) {
            $this->error = LANG_EXISTS_EMAIL;
            return true;
        } else {
            return false;
        }
    }

    public function checkLoginExists($login)
    {
        $params = [
            'login' => $login,
        ];
        if ($this->db->column('SELECT id FROM users WHERE login = :login', $params)) {
            $this->error = LANG_EXISTS_LOGIN;
            return false;
        }
        return true;
    }

    public function getImageInfo($file = null)
    {
        if (!is_file($file)) {
            return false;
        }

        if (!$data = getimagesize($file) or !$filesize = filesize($file)) {
            return false;
        }

        $extensions = [
            1  => 'gif',
            2  => 'jpg',
            3  => 'png',
            4  => 'swf',
            5  => 'psd',
            6  => 'bmp',
            7  => 'tiff',
            8  => 'tiff',
            9  => 'jpc',
            10 => 'jp2',
            11 => 'jpx',
            12 => 'jb2',
            13 => 'swc',
            14 => 'iff',
            15 => 'wbmp',
            16 => 'xbmp'];

        if (!isset($extensions[$data[2]])) {
            return false;
        }

        $result = ['width' => $data[0],
            'height'           => $data[1],
            'extension'        => $extensions[$data[2]],
            'size'             => $filesize,
            'mime'             => $data['mime'],
        ];
        if (!$result) {
            return false;
        }

        return $result;
    }

    public function validateImage($files)
    {

        if (!empty($files['photo'])) {

            $photo_extensions = ['gif', 'jpg', 'png'];

            if (!$photo_info = $this->getImageInfo($files['photo']['tmp_name']) or !in_array($photo_info['extension'], $photo_extensions)) {
                $this->error = LANG_ERROR_IMAGE;
                return false;
            } else {
                $upload_file_name = uniqid(null, true) . '.' . $photo_info['extension'];

                if (!@move_uploaded_file($files['photo']['tmp_name'], 'upload/' . $upload_file_name)) {
                    $this->error = LANG_ERROR_IMAGE;
                    return false;
                } else {
                    $this->photoname = $upload_file_name;
                    return true;
                }
            }

        } else {
            return true;
        }

    }

    public function reg($post)
    {
        $params = [
            'id'       => '',
            'email'    => $post['email'],
            'login'    => $post['login'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
            'fio'      => $post['fio'],
            'photo'    => $this->photoname,
        ];
        $this->db->query('INSERT INTO users VALUES(:id, :email, :login, :password, :fio, :photo)', $params);
    }

    public function login($login)
    {
        $params = [
            'login' => $login,
        ];
        $data             = $this->db->row('SELECT * FROM users WHERE login = :login', $params);
        $_SESSION['user'] = $data[0];
    }

    public function checkData($log, $pas)
    {
        $params = [
            'login' => $log,
        ];
        $hash = $this->db->column('SELECT password FROM users WHERE login = :login', $params);
        if (!$hash or !password_verify($pas, $hash)) {
            $this->error = LANG_WRONG_LR;
            return false;
        }
        return true;
    }

}
