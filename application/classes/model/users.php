<?php defined('SYSPATH')or die('No direct script access.');
/**
 * @author d1ffuz0r gladk0w@mail.ru
 * @license GPLv3
 * @copyright 2011
 */
class Model_Users extends Model
    {

	/**
	 * массив с информацией о пользователе
	 * @var array
	 */
        private $_desk;

	/**
	 * $_pang 1 - admin, 2 - cashier, 3-user
	 * @var int
	 */
        private $_rang;


        /**
         * @param string $name имя пользователя
         * @return array информацию о пользователе
         */
        public function view_user($name)
            {
                $this->_desk = DB::select()
                                ->from('users')
                                ->where('u_name', '=', $name)
                                ->as_object()
                                ->execute();
                return $this->_desk;
            }

        /**
         * @param string $name имя пользователя
         * @return int ранг пользователя
         */
        public function get_rang($name)
            {
                $this->_rang = DB::select()
				->from('users')
				->where('u_name', '=', $name)
				->execute()
				->get('u_rang');
                return $this->_rang;
            }

    }