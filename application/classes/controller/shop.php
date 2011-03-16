<?php defined('SYSPATH')or die('No direct script access.');
/**
 * @author d1ffuz0r gladk0w@mail.ru
 * @license GPLv3
 * @copyright 2011
 */
class Controller_Shop extends Controller_Tpl
    {

        /**
         * @param int $id  id продукта
         * @return HTML вывод формы для оформления заказа
         */
        public function action_new_order($id)
            {
                if (Cookie::get('loged_in')==TRUE)
                    {
                        $shop = Model::factory('shop');

                        $product = $shop->view_product($id);

                        $this->template->title = __('Оформление заказа');
                        $this->template->content = View::factory('page/shop/new_order')
                                        ->set('product', $product);
                    }
                else
                    {
                        $this->template->title = __('Ошибка');
                        $this->template->content = View::factory('tpl/msg')
                                        ->set('msg',Kohana::message('msg','not_login'));
                    }
            }

        /**
         * @param mixed POST данные из public action_new_order()
         * @return HTML output
         */
        public function action_add_order()
            {
                $order = Model::factory('order');

                $post = Validate::factory($_POST)
                                ->filter(TRUE, 'trim')
                                ->filter('ord_username', 'strtolower');
                $post->rule('ord_id', 'not_empty');
                $post->rule('ord_count', 'not_empty');
                $post->rule('ord_username', 'not_empty');
                $post->rule('ord_realname', 'not_empty');
                $post->rule('ord_family', 'not_empty');
                $post->rule('ord_ot4estvo', 'not_empty');
                $post->rule('ord_email', 'not_empty');
                $post->rule('ord_telephone', 'not_empty');
                $post->rule('ord_country', 'not_empty');
                $post->rule('ord_region', 'not_empty');
                $post->rule('ord_city', 'not_empty');
                $post->rule('ord_postindex', 'not_empty');
                $post->rule('ord_typebuy', 'not_empty');
                $post->rule('ord_price', 'not_empty');
                    if ($post->check())
                        {
                            $this->template->title = __('Готово');
                            $this->template->content = View::factory('tpl/msg')
                                            ->set('msg', $order->add_order($post,1));
                        }
                    else
                        {
                            $this->template->title = __('Ошибка');
                            $this->template->content = View::factory('tpl/msg')
                                            ->set('msg', Kohana::message('msg','empty_field'));
                        }
            }

        /**
         * @param string POST строка из формы поиска
         * @return HTML вывод результата поиска
         */
        public function action_search()
            {
                $shop = Model::factory('shop');

                $post = Validate::factory($_POST);
                $post->rule('search_q', 'not_empty');


                if ($post->check())
                    {
                        $this->template->title = __('Готово');
                        $this->template->content = View::factory('page/view/search')
                                        ->set('id', $shop->search($post))
                                        ->set('query', $post);
                    }
                else
                    {
                        $this->template->title = __('Ошибка');
                        $this->template->content = View::factory('tpl/msg')
                                        ->set('msg', Kohana::message('msg','not_search'));
                    }
            }

        /**
         * @param int $id id заказа
         * @return HTML
         */
        public function action_order_y($id)
            {
                $order = Model::factory('order');
                $order->set_status($id, 3);
                $this->template->title = __('Подтверждено');
                $this->template->content = View::factory('tpl/msg')
					    ->set('msg', Kohana::message('msg','order_add'));
            }

        /**
         * @param int $id id заказа
         * @return HTML
         */
        public function action_order_n($id)
            {
                $order = Model::factory('order');
                $order->set_status($id, 2);
                $this->template->title = __('Подтверждено');
                $this->template->content = View::factory('tpl/msg')
					    ->set('msg', Kohana::message('msg','order_denied'));
            }

    }