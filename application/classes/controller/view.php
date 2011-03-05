<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author d1ffuz0r gladk0w@mail.ru
 * @license GPLv3
 * @copyright 2011
 */
class Controller_View extends Controller_Tpl
    {

        /**
         * @param string $cat название категории
         * @return HTML выводим все товары в запрошеной категории
         */
        public function action_cat($cat)
            {
                $shop       = Model::factory('shop');
                $pagination = Pagination::factory(array(
                                            'current_page'      => array('source' => 'query_string', 'key' => 'p'),
                                            'total_items'       => $shop->count_category($cat),
                                            'items_per_page'    => 10,
                                            'view'              => 'pagination/floating',
                                            'auto_hide'         => TRUE,
                                            'first_page_in_url' => TRUE
                                             ));
                $page       = $pagination->current_page;
                $per_page   = $pagination->items_per_page;
                $offset     = $per_page * ($page-1);
                $page_links = $pagination->render();

                $this->template->title   = __('Просмотр категории');
                $this->template->content = View::factory('page/view/cat')
                                                    ->set('id', $shop->view_category($cat,$offset))
                                                    ->set('pagination', $page_links);
            }

        /**
         * @param int $id id товара
         * @return HTML выводим описание запрошеного товара
         */
        public function action_product($id)
            {
                $shop = Model::factory('shop');

                $this->template->title   = __('Просмотр товара');
                $this->template->content = View::factory('page/view/product')
                        ->set('id',$shop->view_product($id));
            }

        /**
         * @param string $name имя пользователя
         * @return HTML выводим информацию о пользователе
         */
        public function action_user($name)
            {
                $user = Model::factory('users');
                $this->template->title   = __('Просмотр пользователя');
                $this->template->content = View::factory('page/view/user')
                    ->set('desk', $user->view_user($name));
            }
    }

