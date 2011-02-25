<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tpl extends Controller_Template
    {

    public $template = 'tpl/template';

    public function before()
        {
            parent::before();

            if ($this->auto_render)
                {
                    $this->template->title      = '';
                    $this->template->content    = '';
                    $this->template->styles     = array();
                    $this->template->categories = array();
                    $this->template->regions    = array();
                    $this->template->msg        = '';
                }
        }

    public function after()
        {
            $main  = Model::factory('Main');
            $shop  = Model::factory('Shop');
            
            if ($this->auto_render)
                {
                    $this->template->categories  = $shop->get_category();
                    $this->template->regions     = $main->get_cities();
                }
            parent::after();
        }

    }