<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Customer');;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Customer Setting');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Setting');
        $this->twiggy->set('LIST_TITLE', 'Customer Setting');
    }
    

    function index()
    { 
    	$data = array();

        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/customer')->render();
        
        $this->twiggy->set('FORM_NAME', 'form_customer');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');        
        $this->twiggy->set('FORM_IDKEY', 'full.class_id');
        $this->twiggy->set('FORM_LINK', site_url('setting/customer/form'));
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $this->twiggy->set('content_page', $content);
        $script_page = $this->twiggy->template('script/customer')->render();       

        $this->twiggy->set('SCRIPTS', $script_page);
        $this->twiggy->set('content_page', $content);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);     
    }

    function form()
    {
        $data = array();        
        
        $content = $this->twiggy->template('breadcrumbs')->render();     
        $content .= $this->twiggy->template('form/form_customer')->render();
        
        $this->twiggy->set('content_page', $content);
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }
 }