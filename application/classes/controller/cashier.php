<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cashier extends Controller_Tpl
    {
        /**
         * @param POST читаем имя пользователя
         * @return HTML выводим главную страницы интерфейса кассира
         */
        public function action_index()
            {
                $username = Cookie::get('username');
                $user = Model::factory('users');
				$rang = $user->get_rang($username);
                if($rang == 2 or $rang == 1)
                    {
                        $this->template->title   = __('Кассир: главная');
                        $this->template->content = View::factory('cashier/index');
                    }
                else
                    {
                        $this->template->title   = __('Ошибка');
                        $this->template->content = View::factory('tpl/msg')
                                ->set('msg','В этот раздел имеют доступ только пользователи с рангом: 1');
                    }
            }
        /**
         * @return HTML вывод менеджера заказов
         */
        public function action_order_manager()
            {
                $order = Model::factory('order');
                $this->template->title   = __('Кассир: Менеджер заказов');
                $this->template->content = View::factory('cashier/order_manager')
                        ->set('list',$order->view_order_s(1));
            }
        /**
         * @return HTML вывод формы оформления нового заказа
         */
        public function action_order_add()
            {
                $shop = Model::factory('shop');
                $this->template->title   = __('Кассир: оформление заказа');
                $this->template->content = View::factory('cashier/order_add')
                        ->set('list_cat', $shop->get_category());
            }
    }