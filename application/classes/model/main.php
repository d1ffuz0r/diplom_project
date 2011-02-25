<?php defined('SYSPATH')or die('No direct script access.');

class Model_Main extends Model
        {

        private $_regions;
        private $_services;
        private $_firstprod;
        private $_twoprod;

        /**
         * @return array выдаём массив со списком городов
         */
        public function get_cities()
            {
                $this->_regions = DB::select()
                                ->from('city')
                                ->as_object()
                                ->execute();

                return $this->_regions;
            }
        /**
         * @param string $name имя города
         * @return set_cooke $name имя города
         * @return set_cooke $rusname русское имя города
         */
        public function set_city($name)
            {
                $rusname = DB::select()
                                ->from('city')
                                ->where('name','=',$name)
                                ->as_object()
                                ->execute()
                                ->get('rusname');
                Cookie::set('city', $name);
                Cookie::set('r_city', $rusname);
            }
        /**
         * @param array выдаём массив с предоставляемыми услугами
         */
        public function get_services()
            {
                $this->_services = DB::select()
                                ->from('service')
                                ->as_object()
                                ->execute();
                return $this->_services;
            }

        public function get_fisttwo()
            {
                $_sql = "select * from product where p_name = 'mouse1' union
                                select * from product where p_name = 'keyboard1'";
                $this->_firstprod = DB::query(Database::SELECT, $_sql)
                                ->as_object()
                                ->execute();
                return $this->_firstprod;
            }

        public function get_threefour()
            {
                $_sql = "select * from product where p_name = 'nb_acessory1' union
                                select * from product where p_name = 'monitors1'";
                $this->_twoprod = DB::query(Database::SELECT, $_sql)
                                ->as_object()
                                ->execute();
                return $this->_twoprod;
            }

    }