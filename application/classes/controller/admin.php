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
         * @return void HTML выводим главную страницы админки
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
						    ->set('msg',Kohana::message('msg', 'no_access'));
                    }
            }
        /**
         * @return void
         */
        public function action_category()
            {
                $category = new Model_Shop();
                $this->template->title = __('Администратор: категории');
                $this->template->content = View::factory('admin/category')
                        ->set('category',$category->get_category());
            }

        /**
         * @param  $cat
         * @return void
         */
        public function action_view_category($cat)
            {
                $shop       = new Model_Shop();
                $pagination = Pagination::factory(array(
                                            'current_page'      => array('source' => 'query_string', 'key' => 'p'),
                                            'total_items'       => $shop->count_category($cat),
                                            'items_per_page'    => 30,
                                            'view'              => 'pagination/floating',
                                            'auto_hide'         => TRUE,
                                            'first_page_in_url' => TRUE
                                             ));
                $page       = $pagination->current_page;
                $per_page   = $pagination->items_per_page;
                $offset     = $per_page * ($page-1);
                $page_links = $pagination->render();

                $this->template->title   = __('Администратор: Просмотр категории');
                $this->template->content = View::factory('admin/view_category')
					    ->set('id', $shop->view_category($cat, $offset, $per_page))
					    ->set('pagination', $page_links)
                        ->set('categories',$shop->get_category());
            }

        /**
         * @return void
         */
        public function action_add_category()
            {
                $admin = new Model_Admin();
                if(!empty($_POST))
                    {
                        $name = Arr::get($_POST, 'name');
                        $rusname = Arr::get($_POST, 'rusname');
                        $admin->add_category($name, $rusname);
                        $this->template->title   = __('Администратор: категория добавлена');
                        $this->template->content = View::factory('tpl/msg')
                                ->set('msg','<h1>Категория '.$rusname.' добавлена</h1>');
                    }
            }

        /**
         * @param  $id
         * @return void
         */
        public function action_delete_category($id)
            {
                $admin = new Model_Admin();
                $admin->delete_category($id);
                $this->template->title   = __('Администратор: категория удалена');
                $this->template->content = View::factory('tpl/msg')
                                ->set('msg','<h1>Категория id'.$id.' удалена</h1>');
            }

        /**
         * @param  $id
         * @return void
         */
        public function action_edit_category($id)
            {
                $shop = new Model_Shop();
                $this->template->title   = __('Администратор: редактирование категории');
                $this->template->content = View::factory('admin/edit_category')
                                ->set('category',$shop->get_one_category($id));
            }

        /**
         * @return void
         */
        public function action_update_category()
            {
                $admin = new Model_Admin();
                if(!empty($_POST))
                    {
                        $id      = Arr::get($_POST, 'id');
                        $name    = Arr::get($_POST, 'name');
                        $rusname = Arr::get($_POST, 'rusname');
                        $param   = Arr::get($_POST, 'param');
                        $etc     = Arr::get($_POST, 'etc');
                        $admin->update_category($id, $name, $rusname, $param, $etc);
                        $this->template->title   = __('Администратор: категория обновлена');
                        $this->template->content = View::factory('tpl/msg')
                                ->set('msg','<h1>Категория '.$rusname.' изменена</h1>');
                    }
            }

        /**
         * @return void
         */
        public function action_add_product()
            {
                $admin = new Model_Admin();
                if(!empty($_POST))
                    {
                        $rusname  = Arr::get($_POST, 'rusname');
                        $desc     = Arr::get($_POST, 'desc');
                        $price    = Arr::get($_POST, 'price');
                        $category = Arr::get($_POST, 'category');
                        $admin->add_product($rusname, $desc, $price, $category);
                        $this->template->title   = __('Администратор: продукт добавлен');
                        $this->template->content = View::factory('tpl/msg')
                                ->set('msg','<h1>Продукт '.$rusname.' добавлен</h1>');
                    }
            }

        /**
         * @param  $id
         * @return void
         */
        public function action_delete_product($id)
            {
                $admin = new Model_Admin();
                $admin->delete_product($id);
                $this->template->title   = __('Администратор: продукт удалён');
                $this->template->content = View::factory('tpl/msg')
                        ->set('msg','<h1>Продукт id:'.$id.' удалён</h1>');
            }

        /**
         * @param  $id
         * @return void
         */
        public function action_edit_product($id)
            {
                $shop = new Model_Shop();
                $this->template->title   = __('Администратор: редактирование продукта');
                $this->template->content = View::factory('admin/edit_product')
                                ->set('id',$shop->get_one_product($id));
            }

        /**
         * @return void
         */
        public function action_update_product()
            {
                $admin = new Model_Admin();
                if(!empty($_POST))
                    {
                        $id       = Arr::get($_POST, 'id');
                        $rusname  = Arr::get($_POST, 'rusname');
                        $desc     = Arr::get($_POST, 'desc');
                        $price    = Arr::get($_POST, 'price');
                        $admin->update_product($id, $rusname, $desc, $price);
                        $this->template->title   = __('Администратор: продукт изменён');
                        $this->template->content = View::factory('tpl/msg')
                              ->set('msg','<h1>Продукт id:'.$id.' изменён</h1>');
                    }
            }
    }