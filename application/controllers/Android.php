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
 * This class serves as the most important class of the API. 
 * This class acts as the port for all ANDROID communication.
 * All android communication has to be done through the post and get methods.
 * Post will be used for receiving data on server side and GET for sending data on request. 
 * The request to GET must contain longitude and latitude of a location in ordedr to get 
 * infromation back.
 * 
 * @author Farhan Ar Rafi http://www.farhanarrafi.com
 * @version 1.0.0
 */
class Android extends CI_Controller {
    
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
    
    private $inputStream = "";
    /**
     * This fuction acts as a front for this API and will display the information
     * and instruction for accessing this API.
     */
    public function index()
    {
        $this->load->view('general/default_page');
    }

    /**
     * This function sends data sent through http using 
     * GET. Data has to be received using a predefined schema.
     * 
     * @return null Return nothing
     */
    public function get() 
    {
        header('Content-type: application/json');
        

    }
    /**
     * This function receives data sent through http using 
     * POST. Data has to be sent using a predefined schema.
     * 
     * @return null Returns nothing
     */
    public function post() 
    {
        $user_data = array();
        $geoname_data = array();
        
        $input = $this->input->get_post('json');
        if(!($input == NULL)){
            $this->inputStream = "HTTP";
            $string_array = json_decode($input);
            $user_data = $string_array->user;
            $geoname_data = $string_array->data;
        }
        else if(!(($raw_input = $this->input->raw_input_stream) == NULL)){
            $this->inputStream = "RAW";
            $string_array = json_decode($raw_input);
            $user_data = $string_array->user;
            $geoname_data = $string_array->data;
        } 
        
//        var_dump($user_data);
//        var_dump($geoname_data);
        
        if($this->validateUser($user_data)) {
            if($this->insertGeonameData($geoname_data)) {
                //log_message("DEBUG", "exiting POST(), insert successfull");
                $this->output->set_header('HTTP/1.1 200 OK', TRUE);
                echo "Successful insert";
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
     * This function assists in updating a data. Currently it will 
     * not be available to users. This function will be introduced 
     * later when the user would be allowed to edit the data that 
     * they have 
     */
    public function update() {
        $this->session->sess_destroy();
        $this->output->set_header('HTTP/1.1 500 NOT IMPLEMENTED', TRUE);
        exit();
    }
    
    /**
     * This function does not need to be implemented beacuse, 
     * for now, our target is only to insert data and provide
     * information to users.
     * 
     * This function will be implemented later when admin functionalities
     * would be included.
     * 
     * @return null Return Nothing
     */
    public function delete() {
        $this->session->sess_destroy();
        $this->output->set_header('HTTP/1.1 500 NOT IMPLEMENTED', TRUE);
        exit();
    }
    
    
    public function search() {
        $this->output->set_header('HTTP/1.1 500 NOT IMPLEMENTED', TRUE);
        exit();
    }
   

    /**
     * Function to validate user info prior submission into the database.
     * 
     * @param type $userdata JSON array containing user info from user
     * @return boolean Returns <b>TRUE</b> on successfull validation; <b>FLASE</b> otherwise.
     */
    private function validateUser($userdata) {
            $this->load->model('User_class');
            $user = new User_class();
            
        if(!($userdata->token == NULL or $userdata->email == NULL)) {
            $user->token = $userdata->token;
            $user->email = $userdata->email;
            
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

    /**
     * Function to validate and insert sent by users for submission
     * 
     * @param type $geoname_data JSON array containing data from user
     * @return boolean Returns TRUE on successfull insertion; FLASE otherwise.
     */
    private function insertGeonameData($geoname_data) {
        $this->load->model('geoname_data_dump_class');
        $geoname = new Geoname_data_dump_class();
        $geoname->geonameid = $geoname->getNextID();
        //var_dump($geoname->geonameid);
        $geoname->moddate = date("y-m-d");
        
        $geoname->name = $geoname_data->name;
        $geoname->asciiname = $geoname_data->asciiname;
        $geoname->alternatenames = $geoname_data->alternatenames;
        $geoname->latitude = $geoname_data->latitude;
        $geoname->longitude = $geoname_data->longitude;
        $geoname->fclass = $geoname_data->feature_class;
        $geoname->fcode = $geoname_data->feature_code;
        $geoname->country = $geoname_data->country_code;
        $geoname->cc2 = $geoname_data->cc2;
        $geoname->admin1 = $geoname_data->admin1_code;
        $geoname->admin2 = $geoname_data->admin2_code;
        $geoname->admin3 = $geoname_data->admin3_code;
        $geoname->admin4 = $geoname_data->admin4_code;
        $geoname->population = $geoname_data->population;
        $geoname->elevation = $geoname_data->elevation;
        $geoname->gtopo30 = $geoname_data->gtopo30;
        $geoname->timezone = $geoname_data->timezone;
        
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

/**
	TEST JSON 
	Content-type: application/json; charset=utf-8
  
 {
  "user": {
    "token": "7c92a2150b9d24b297b39f89b348179b8fd0bffe",
   "email": "farhanarrafi@gmail.com "
  },
  "data": {
    "name": "10001",
    "asciiname": "10001",
    "alternatenames": "10001",
    "latitude": "10001",
    "longitude": "10001",
    "feature_class": "10001",
    "feature_code": "10001",
    "country_code": "10001",
    "cc2": "10001",
    "admin1_code": "10001",
    "admin2_code": "10001",
    "admin3_code": "10001",
    "admin4_code": "10001",
    "population": "10001",
    "elevation": "10001",
    "gtopo30": "10001",
    "timezone": "10001"
  }
}
 * 
 {"user":{"token":"abcdef","email":"abcdef"},"data":{"name":"abcdef","asciiname":"abcdef","alternatenames":"abcdef","latitude":"abcdef","longitude":"abcdef","feature_class":"abcdef","feature_code":"abcdef","country_code":"abcdef","cc2":"abcdef","admin1_code":"abcdef","admin2_code":"abcdef","admin3_code":"abcdef","admin4_code":"abcdef","population":"abcdef","elevation":"abcdef","gtopo30":"abcdef","timezone":"abcdef"}}

 
 *  */
