<?php defined('SYSPATH')or die('No direct script access.');

class Model_Users extends Model
    {

        private $_desk;
        private $_id;
        private $_name;
        private $_password;
        private $_email;
        private $_data;
        private $_allprice;
        private $_rang;/** @var 1 - admin, 2 - cashier, 3-user */

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
                $this->_rang = DB::select()->from('users')->where('u_name', '=', $name)->execute()->get('u_rang');
                return $this->_rang;
            }

    }