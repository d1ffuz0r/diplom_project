<?php defined('SYSPATH')or die('No direct script access.');
/**
 * @author d1ffuz0r gladk0w@mail.ru
 * @license GPLv3
 * @copyright 2011
 */
class Model_Admin extends Model
    {
        /**
         * @param  $c_name
         * @param  $c_rusname
         * @return void
         */
        public function add_category($c_name, $c_rusname)
            {
                $c_id = rand(0, 1000);
                DB::insert('category',array('c_id','c_name','c_rusname','c_param','c_etc'))
                        ->values(array($c_id,$c_name,$c_rusname,0,0))
                        ->execute();
            }

        /**
         * @param  $id
         * @return void
         */
        public function delete_category($id)
            {
                DB::delete('category')->where('c_id','=',$id)->execute();
            }

        /**
         * @param  $id
         * @param  $name
         * @param  $rusname
         * @param  $param
         * @param  $etc
         * @return void
         */
        public function update_category($id, $name, $rusname, $param, $etc)
            {
                DB::update('category')
                        ->set(array(
                                   'c_name'   =>$name,
                                   'c_rusname'=>$rusname,
                                   'c_param'  =>$param,
                                   'c_etc'    =>$etc
                              ))
                        ->where('c_id','=',$id)
                        ->execute();
            }

        /**
         * @param  $rusname
         * @param  $desc
         * @param  $price
         * @param  $category
         * @return void
         */
        public function add_product($rusname, $desc, $price, $category)
            {
                $p_id = rand(0, 100000);
                DB::insert('product',array('p_id','p_rusname','p_desc','p_price','p_category','p_countsell'))
                        ->values(array($p_id, $rusname, $desc, $p_id, $category, 0))
                        ->execute();
            }
        /**
         * @param  $id
         * @return void
         */
        public function delete_product($id)
            {
                DB::delete('product')->where('p_id','=',$id)->execute();
            }

        /**
         * @param  $id
         * @param  $rusname
         * @param  $desc
         * @param  $price
         * @return void
         */
        public function update_product($id, $rusname, $desc, $price)
            {
                DB::update('product')
                        ->set(array(
                                    'p_rusname'=>$rusname,
                                    'p_desc'=>$desc,
                                    'p_price'=>$price
                              ))
                        ->where('p_id','=',$id)
                        ->execute();
            }
    }