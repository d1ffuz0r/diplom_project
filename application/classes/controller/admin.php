<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author d1ffuz0r gladk0w@mail.ru
 * @license GPLv3
 * @copyright 2011
 */
class Controller_Admin extends Controller_Tpl
    {
        /**
         * @param POST читаем имя пользователя
         * @return HTML выводим главную страницы админки
	 * @111
         */
        public function action_index()
            {
                $username = Cookie::get('username');
                $user = Model::factory('users');
                if($user->get_rang($username) == 1)
                    {
                        $this->template->title   = __('Администратор');
                        $this->template->content = View::factory('admin/index');
                    }
                else
                    {
                        $this->template->title   = __('Ошибка');
                        $this->template->content = View::factory('tpl/msg')
                                ->set('msg','В этот раздел имеют доступ только пользователи с рангом: 1');
                    }
            }
    }