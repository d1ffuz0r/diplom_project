<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author d1ffuz0r gladk0w@mail.ru
 * @license GPLv3
 * @copyright 2011
 */
class Controller_Auth extends Controller_Tpl
    {

	/**
	 * @return HTML выводит страницу логина
	 */
	public function action_login()
	    {
		$auth = Model::factory('Auth');

		if(!empty($_POST))
		    {
			$login    = Arr::get($_POST, 'login');
			$password = Arr::get($_POST, 'password');

			$this->template->title   = __('Авторизация');
			$this->template->content = View::factory('tpl/msg')
						    ->set('msg', $auth->login($login,$password));
		    }
	    }

	/**
	 * @return HTML выводит страницу регистрации
	 */
	public function action_register()
	    {
		$auth = Model::factory('Auth');
		if(!empty($_POST))
		    {
			$login    = Arr::get($_POST, 'login');
			$password = Arr::get($_POST, 'password');
			$email    = Arr::get($_POST, 'email');

			$this->template->title   = __('Зарегистрированы');
			$this->template->content = View::factory('tpl/msg')
						    ->set('msg', $auth->register($login,$password,$email));
		    }
	    }

	/**
	 * @return HTML выход из сайта. удаление куков
	 */
	public function action_logout()
	    {
		Cookie::delete('loged_in');
		Cookie::delete('username');

		$this->template->title   = __('До свидания');
		$this->template->content = View::factory('tpl/msg')
					    ->set('msg',Kohana::message('msg','bye'));
	    }
    }