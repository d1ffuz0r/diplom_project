<?php defined('SYSPATH')or die('No direct script access.');
/*
 * model auth
 */

class Model_Auth extends Model
        {

        /**
         * @param string $login  логин пользователя
         * @param string $password пароль полльзователя
         * @return boolean если true то логинимся и ставим куку, если false выдаём ошибку
         */
        public function login($login, $password)
            {
                $query = DB::select()
                                ->from('users')
                                ->where('u_name', '=', $login)
                                ->where('u_password', '=', $password)
                                ->execute();
                if ($query->count()>=1)
                    {
                        Cookie::set('loged_in', TRUE);
                        Cookie::set('username', $login);

                        return 'Вы авторизированы';
                    }
                else
                    {
                        return 'Ошибка. введите правильный логин или пароль';
                    }
            }

        /**
         * @param string $login  логин пользователя
         * @param string $password пароль полльзователя
         * @param string $email email пользователя
         * @return mixed если пользователь с таким логином существует то выдаём ошибку,если нет то регистрируем. ранг по умолчанию 3(пользователь)
         */
        public function register($login, $password, $email)
            {
                $query = DB::select()
                                ->from('users')
                                ->where('u_name', '=', $login)
                                ->execute();
                if ($query->count()>=1)
                    {
                        return 'Ошибка. такой логин уже существует';
                    }
                else
                    {
                        DB::insert('users', array('u_name', 'u_password', 'u_email', 'u_data', 'u_allprice', 'u_rang'))
                                ->values(array($login, $password, $email, 'etc.', 0, 3))
                                ->execute();
                        Cookie::set('loged_in', TRUE);
                        Cookie::set('username', $login);
                        return 'Добро пожаловать! Вы зарегистрированы.<br>Логин:' . $login . '<br>Пароль:' . $password;
                    }
            }

    }