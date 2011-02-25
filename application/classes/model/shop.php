<?php defined('SYSPATH')or die('No direct script access.');

class Model_Shop extends Model
    {

        private $_category;
        private $_cat_product;
        private $_product;
        private $_count;
        private $_kart;
        private $_search;

        /**
         * @return array массив категорий
         */
        public function get_category()
            {
                $this->_category = DB::select()
                                ->from('category')
                                ->as_object()
                                ->execute();
                return $this->_category;
            }

        /**
         * @param int $cat id категории
         * @return int количество строк в категории = id
         */
        public function count_category($cat)
            {
                $this->_count = DB::select()
                                ->from('product')->where('p_category', '=', $cat)
                                ->execute()
                                ->count();
                return $this->_count;
            }

        /**
         * @param int $cat - id категории
         * @param int $offset - номер страницы для постраничного вывода
         * @return array массив продуктов в категории
         */
        public function view_category($cat, $offset)
            {
                $_sql = 'SELECT product.*, (product.p_price+((product.p_price*n_nds.n_value)/100)) AS p_ndsprice, product.p_price/k_kurs.k_value AS p_kursprice
                              from product
                              join (
                                    select value as n_value
                                    from nds
                                    ) as n_nds
                              join (
                                    select value as k_value
                                    from kurs
                                    ) as k_kurs
                              where p_category = "' . $cat . '"
                              limit 10
                              offset ' . $offset . '';


                $this->_cat_product = DB::query(Database::SELECT, $_sql)
                                ->as_object()
                                ->execute();

                return $this->_cat_product;
            }

        /**
         * @param int $id  id продукта
         * @return array информация 1 продукта
         */
        public function view_product($id)
            {
                $_sql = 'SELECT product.*, (product.p_price+((product.p_price*n_nds.n_value)/100)) AS p_ndsprice, product.p_price/k_kurs.k_value AS p_kursprice
                              from product
                              join (
                                    select value as n_value
                                    from nds
                                    ) as n_nds
                              join (
                                    select value as k_value
                                    from kurs
                                    ) as k_kurs
                              where p_id = "' . $id . '"';
                $this->_product = DB::query(Database::SELECT, $_sql)
                                ->as_object()
                                ->execute();

                return $this->_product;
            }

        /**
         * @param string $username имя пользователя
         * @return array заказы выбраного пользователя
         */
        public function view_kart($username)
            {
                $this->_kart = DB::select()
                                ->from('orders')
                                ->where('ord_username', '=', $username)
                                ->where('ord_status', '=', 3)
                                ->as_object()
                                ->execute();
                return $this->_kart;
            }

        /**
         * @param string $searchQuery POST данные из формы
         * @return array найденые товары
         */
        public function search($searchQuery)
            {
                $this->_search = DB::select()
                                ->from('product')
                                ->where('p_desc', 'like', '%' . $searchQuery['search_q'] . '%')
                                ->as_object()
                                ->execute();
                return $this->_search;
            }

    }