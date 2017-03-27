<?php

/**
 * GeoWordNet
 * 
 * A thesis project for three students at American international University Bangladesh. 
 * Supervised by Dr. Tabin Hasan, three undergraduate students - Farhan Ar Rafi, Sk. Golam Muhammad Hasnanin and 
 * Humayra designed this project. 
 * 
 * The thesis group also acknoledges the contribution of Shamim Ahmed, Dr. Abu Dayen and more to add. 
 * 
 * @package	GeoWordNet
 * @subpackage  Controllers
 * @author	Farhan Ar Rafi
 * @copyright	Copyright (c) 2014 - 2015, farhanarrafi@gmail.com
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://farhanarrafi.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This will act as the web interface of the API.
 */
class Web extends CI_Controller {

    private $data = array(
        'user' => array(
            'userid' => 0,
            'email' => '',
            'token' => '',
        ),
        'geoname' => array(
            'geonameid' => 0,
            'latitude' => 0.0,
            'longitude' => 0.0,
        ),
        
    );
    /**
     * 
     */
    public function index() {
        $this->load->view('default_page');
    }

    /**
     * 
     * @return none
     */
    public function get() {
        echo "<h1>WEB GET</h1>";
    }

    public function post() {
        $this->load->helper('url');
        $user_token = $this->input->post('geoname_token');
        $user_email = $this->input->post('geoname_username');
        
        if($this->validateUser($user_email, $user_token)) {
            if($this->insertGeonameData()) {
                //log_message("DEBUG", "exiting POST(), insert successfull");
                //$this->output->set_header('HTTP/1.1 200 OK', TRUE);
                //echo "Successful insert";
                redirect('user/home.html#inserts', 'refresh');
                exit();
            } else {
                $this->output->set_header('HTTP/1.1 500 INTERNAL SERVER ERROR', TRUE);
                echo "Insert failed";
            }
        } else {
            $this->output->set_header('HTTP/1.1 401 UNAUTHORIZED', TRUE);
            echo "Authorization Failed";
        }
    }
    
    /**
     * Function to validate user info prior submission into the database.
     * 
     * @param type $userdata JSON array containing user info from user
     * @return boolean Returns <b>TRUE</b> on successfull validation; <b>FLASE</b> otherwise.
     */
    private function validateUser($user_email, $user_token) {
            $this->load->model('User_class');
            $user = new User_class();
            
        if(!($user_email == NULL or $user_token == NULL)) {
            $user->token = trim($user_token);
            $user->email = trim($user_email);
            
            if($user->validateUser() != FALSE) {
                $user = $user->getUser();
                $this->data['user']['token'] = $user->token;
                $this->data['user']['email'] = $user->email;
                $this->data['user']['userid'] = $user->userid;
                //var_dump($this->data);
                return true;
            } else {
                $this->output->set_header('HTTP/1.1 401 UNAUTHORIZED', TRUE);
                return false;
            }
        } else {
            return false;
        }
        
    }
    
    private function insertGeonameData() {
        $this->load->model('geoname_data_dump_class');
        $geoname = new Geoname_data_dump_class();
        $geoname->geonameid = $geoname->getNextID();
        //var_dump($geoname->geonameid);
        $geoname->moddate = date("y-m-d");
        
        $geoname->name = $this->input->get_post('geoname_name');
        $geoname->asciiname = $this->input->get_post('geoname_name');
        $geoname->alternatenames = "alternate";
        $geoname->latitude = $this->input->get_post('geoname_latitude');
        $geoname->longitude = $this->input->get_post('geoname_longitude');
        $geoname->fclass = $this->input->get_post('geoname_class');
        $geoname->fcode = $this->input->get_post('geoname_subclass');
        $geoname->country = "BD";
        $geoname->cc2 = "bd";
        $geoname->admin1 = "admin1";
        $geoname->admin2 = "admin1";
        $geoname->admin3 = "admin1";
        $geoname->admin4 = "admin1";
        $geoname->population = 999;
        $geoname->elevation = 11;
        $geoname->gtopo30 = 11;
        $geoname->timezone = "aa";
        
        $this->data['geoname']['geonameid'] = $geoname->geonameid;
        $this->data['geoname']['longitude'] = $geoname->longitude;
        $this->data['geoname']['latitude'] = $geoname->latitude;
        
        
        
        if($geoname->insert()) {
            $this->load->model('record_class');
            $record = new Record_class();
            $record->recordid = $record->getNextID();
            $record->userid = $this->data['user']['userid'];
            $record->geonameid = $this->data['geoname']['geonameid'];
            $record->insert();
            return true;    
        } else {
            echo "Error inserting geonames in DB< /br>";
            //var_dump($geoname);
            return false;        
        }
    }

}
