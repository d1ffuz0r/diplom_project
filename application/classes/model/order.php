<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author d1ffuz0r gladk0w@mail.ru
 * @license GPLv3
 * @copyright 2011
 */
class Model_Order extends Model
    {
	/**
	 * заказы пользователя
	 * @var array
	 */
        private $_orders;

        /**
	 * просмотр заказов выбраного статуса
         * @param string $status статус заказа
         * @return array заказы выбраного статуса.
	 * @tutorial 1 - в ожидании, 2 - отказано , 3 - принято
         */
        public function view_order_s($status)
            {
                $this->_orders = DB::select()
                                ->from('orders')
                                ->where('ord_status', '=', $status)
                                ->as_object()
                                ->execute();
                return $this->_orders;
            }

        /**
	 * просмотр заказов пользователем
         * @param string $username имя пользователя
         * @return array заказы 1 пользователя
         */
        public function view_orders($username)
            {
                $this->_orders = DB::select()
                                ->from('orders')
                                ->where('ord_username', '=', $username)
                                ->where('ord_status', '=', 1)
                                ->or_where('ord_status', '=', 2)
                                ->as_object()
                                ->execute();
                return $this->_orders;
            }

        /**
	 * оформление заказа
         * @param mixed $array массив данных из формы заказа
         * @return string добавление заказа
         * @todo реализовать увеличение счётчика покупок у пользователя при совершении покупки
         */
        public function add_order($array,$status)
            {
                $price = $array['ord_count']*$array['ord_price'];
                $date = date("d.m.y");
                $id = rand(0, 100000);
                $query = DB::insert('orders', array(
                                    'ord_id',
                                    'ord_username',
                                    'ord_product',
                                    'ord_realname',
                                    'ord_family',
                                    'ord_ot4estvo',
                                    'ord_email',
                                    'ord_telephone',
                                    'ord_country',
                                    'ord_region',
                                    'ord_city',
                                    'ord_postindex',
                                    'ord_typebuy',
                                    'ord_count',
                                    'ord_status',
                                    'ord_date',
                                    'ord_price'
                                ))->values(array(
                                    $id,
                                    $array['ord_username'],
                                    $array['ord_id'],
                                    $array['ord_realname'],
                                    $array['ord_family'],
                                    $array['ord_ot4estvo'],
                                    $array['ord_email'],
                                    $array['ord_telephone'],
                                    $array['ord_country'],
                                    $array['ord_region'],
                                    $array['ord_city'],
                                    $array['ord_postindex'],
                                    $array['ord_typebuy'],
                                    $array['ord_count'],
                                    $status,
                                    $date,
                                    $price
                                ))
                                ->execute();
                return Kohana::message('msg','order_add');
            }

        /**
         * установка статуса заказа
         * @param int $id id заказа
         * @param int $status статус. 1- в ожидании, 2 - отказано , 3 принято
         */
        public function set_status($id, $status)
            {
                DB::update('orders')
			->set(array('ord_status' => $status))
			->where('ord_id', '=', $id)
			->execute();
            }

    }