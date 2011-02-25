<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Tpl
    {
    /**
     * @return HTML вывод главной страницы
     */
        public function action_home()
            {
                $main = Model::factory('main');
                $this->template->title   = __('Добро пожаловать');
                $this->template->content = View::factory('page/index')
                        ->set('service',  $main->get_services())
                        ->set('prodone',  $main->get_fisttwo())
                        ->set('prowthree',$main->get_threefour());
            }
    /**
     * @return HTML вывод страницы помощи
     */
        public function action_help()
            {
                $this->template->title   = __('Помощь');
                $this->template->content = View::factory('page/help');
            }
    /**
     * @return HTML вывод страницы контактов
     */
        public function action_contact()
            {
                $this->template->title   = __('Контактная информация');
                $this->template->content = View::factory('page/contact');
            }
    /**
     * @param POST читаем из кук имя пользователя
     * @return HTML вывод заказов пользователя
     */
        public function action_orders()
            {
		if(Cookie::get('loged_in')==TRUE)
		    {
			$order = Model::factory('order');
			$orders = $order->view_orders(Cookie::get('username'));
			$this->template->title   = __('Заказы');
			$this->template->content = View::factory('page/orders')
				->set('list', $orders);
		    }
		else
		    {
			$this->template->title   = __('Ошибка');
			$this->template->content = View::factory('tpl/msg')
				->set('msg','Вы не авторизированы');
		    }
            }
    /**
     * @param POST проверяем из кук,залогинен ли пользователь, читаем имя пользователя
     * @return HTML вывод покупок пользователя
     */
        public function action_kart()
            {
		if(Cookie::get('loged_in')==TRUE)
		    {
		    $shop = Model::factory('shop');
		    $orders = $shop->view_kart(Cookie::get('username'));
			$this->template->title   = __('Заказы');
			$this->template->content = View::factory('page/kart')
				->set('list', $orders);
		    }
		else
		    {
			$this->template->title   = __('Ошибка');
			$this->template->content = View::factory('tpl/msg')
				->set('msg','Вы не авторизированы');
		    }
            }
    /**
     * @return HTML вывод страницы входа
     */
        public function action_login()
            {
                $this->template->title   = __('Вход');
                $this->template->content = View::factory('page/auth/login');
            }
     /**
     * @return HTML вывод страницы регистрации
     */
        public function action_reg()
            {
                $this->template->title   = __('Регистрация');
                $this->template->content = View::factory('page/auth/reg');
            }
     /**
     * @return set_cookie
     */
        public function action_changecity()
            {
                $main = Model::factory('main');
                $main->set_city($_POST['region']);
                $this->request->redirect('/index');
            }
    }

