<?php defined('SYSPATH')or die('No direct script access.');
/**
 * @author d1ffuz0r gladk0w@mail.ru
 * @license GPLv3
 * @copyright 2011
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

                        return Kohana::message('msg','auth_success');
                    }
                else
                    {
                        return Kohana::message('msg','auth_error');
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
                        return Kohana::message('msg', 'reg_error');
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