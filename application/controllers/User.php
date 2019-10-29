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
define('SESSION_SALT', '2e3a50377b69c865c0b3ebffc051785c544b7742');

/**
* User class facilitates the registration process for
* accessing the API. After registration, an API KEY is generated
* and provided to the user.
*
* @author Farhanarrafi <farhanarrafi@gmail.com>
* @version 1.0.0
*/
class User extends CI_Controller {

    /**
    * The array contains all data used by the controller.
    * It acts as an interface, where all data can be put
    * and used using the associative name.
    * $data['error']['xxxxxx'] - contains all error message.
    *
    * @var array Mixed data type associative array
    *
    * @author Farhanarrafi <farhanarrafi@gmail.com>
    */
    private $data = array();
    
    public function index() {
        
    }

    /**
    * This fuction handles all the registration for both developers and
    * users. The user can select the type of key needed.
    * This function does the following:
    * <b>1.</b> It sets the rules for validation.
    * <b>2.</b> On successful validation and registration, the user
    *           is redirected to the User Dashboard.
    *    < /br> On failure, the user is sent back to the registration page,
    *           along with an error message.
    *
    * @return null Returns nothing.
    *
    * @author Farhanarrafi <farhanarrafi@gmail.com>
    */
    public function registration() {
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->initialize();
        
        $this->form_validation->set_rules('username', 'Username', array('required', 'trim', 'callback_userNameIsUnique'));
        $this->form_validation->set_rules('email', 'Email', array('required', 'trim', 'callback_userEmailIsUnique', 'valid_email'));
        $this->form_validation->set_rules('password', 'Password', array('required', 'trim', 'callback_passwordOk', 'min_length[8]'));
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', array('required', 'trim', 'callback_passwordConfirmOk', 'matches[password]'));
        
        $validation_OK = ($this->form_validation->run() == FALSE) ? FALSE : TRUE;
        if ($validation_OK == TRUE) {
            if ($this->do_registration()) {
                if (!headers_sent())
                redirect('user/home', 'refresh');
                else
                die();
            }
        } else {
            $this->load->view('usercontrol/registration_page', $this->data);
        }
    }

    public function resetpassword() {
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->view('usercontrol/reset_password_page', $this->data);
        
        $this->form_validation->set_rules('email', 'Email', array('required', 'trim', 'callback_userEmailNotUnique', 'valid_email'));
        $validation_OK = ($this->form_validation->run() == FALSE) ? FALSE : TRUE;
        if ($validation_OK == TRUE) {
            //            if ($this->do_registration()) {
                //                if (!headers_sent())
                //                    redirect('user/home', 'refresh');
                //                else
                //                    die();
                //            }
                redirect('user/login', 'refresh');
            } else {
                $this->load->view('usercontrol/registration_page', $this->data);
            }
        }
        
        /**
        * This function handles the login to the user panel where the
        * user can generate new key. Later more options can be introduced.
        {
            "user": {
                "username": "xxxxxxxxx",
                "password": "yyyyyyyy"
            }
        }
        *
        *
        *
        * @return none
        *
        * @author Farhanarrafi <farhanarrafi@gmail.com>
        */
        public function login($channel = "", $format = "") {
            $this->load->library('form_validation');
            
            if ($channel == "api" and $format == "json") {
                $input = $this->input->post("json");
                var_dump($this->input->raw_input_stream);
                var_dump($input);
                if (!($input == NULL)) {
                    $this->inputStream = "HTTP";
                    $json_array = json_decode($input);
                    $username = $json_array->username;
                    $password = $json_array->password;
                    $json = $this->authenticate_login($username, $password);
                    if ($json != NULL) {
                        header('Content-type: application/json');
                        echo $json;
                        return;
                    }
                }
            } elseif ($channel == 'api' and $format == 'xml') {
                //
                // TO be implemented later.
                //
            } else {
                $this->load->helper('url');
                $username = $this->input->post('username');
                $this->form_validation->set_rules('username', 'Username', array('required', 'trim', 'callback_userNameOK'));
                $this->form_validation->set_rules('password', 'Password', array('required', 'trim', 'callback_userPasswordOk[' . $username . ']', 'min_length[8]'));
                $validation_OK = ($this->form_validation->run() == FALSE) ? FALSE : TRUE;
                if ($validation_OK == TRUE and  !headers_sent()) {
                    redirect('user/home', 'refresh');
                } else {
                    $this->load->view('usercontrol/login_page');
                }
            }
        }
        
        public function logout() {
            $this->load->helper('url');
            $this->session->sess_destroy();
            redirect('', 'refresh');
        }
        
        public function home() {
            $this->load->helper('url');
            if ($this->session->username != null) {
                $this->data['user']['username'] = $this->session->username;
                $this->data['user']['email'] = $this->session->email;
                $this->data['user']['token'] = $this->session->token;
                $this->load->model('record_class');
                $record = new Record_class();
                $this->data['data']['raw'] = $record->getRecords($this->data['user']['token']);
                $this->load->view('usercontrol/userhome_page', $this->data);
            } else {
                //            $this->data['user']['username'] = 'Your Name';
                //            $this->data['user']['email'] = 'you@xxxyyyzzz.com';
                //            $this->data['user']['token'] = '0000000000000000000000000000000000000000';
                redirect('user/login', 'refresh');
            }
        }
        
        /**
        * This function does the following things.
        * <b>1.</b> Retrieves the data from $POST variable.
        * <b>2.</b> Checks if both passwords match.
        *           < /br>Sets error message and returns FALSE upon failure.
        * <b>3.</b> Loads the data in User Model.
        * <b>4.</b> Requests User Model to create user.
        *           < /br>Sets error message and returns FALSE upon failure.
        *
        *
        * @return boolean Returns TRUE upon successful registration. < /br>Returns
        * FALSE upon failure.
        * @author Farhanarrafi <farhanarrafi@gmail.com>
        */
        private function do_registration() {
            $this->load->model('user_class');
            $user = new User_class();
            $user->username = $this->input->post('username'); //echo $username;
            $user->email = $this->input->post('email'); //echo $email;
            $user->password = sha1($this->input->post('password')); //echo $password;
            
            if ($user->createNewUser()) {
                //echo "createNewUser SUCCESSFUL";
                $message = "Dear user " . $user->username . ".< /br> Your token for the application will be:" .
                "<p>" . $user->token . "</p>" .
                "<i>Please do not reply to this mail. This mail is a system generated message.</i>";
                $this->sendEmail($user->email, "Token for Application", $message);
                $session_data = array(
                    'username' => $user->username, 'email' => $user->email,
                    'token' => $user->token, 'sessionID' => sha1($user->email . SESSION_SALT)
                );
                $this->session->set_userData($session_data);
                return TRUE;
            } else {
                $this->data['error']['user_exists'] = "User exists.";
            }
            return FALSE;
        }
        
        /**
        * This function sends mail to users after registration.
        * This function is intended to do two things.
        * <b>1.</b> Send tokens by mail.
        * <b>2.</b> Verify mail address.
        *
        * @param string $email_address The email address of the person receiving the email
        * @param string $subject The subject of the mail.
        * @param string $message The body of the mail.
        *
        *  @return boolean Returns TRUE upon successful sending of mail.
        *          </br> Returns FALSE upon failure.
        * @author Farhanarrafi <farhanarrafi@gmail.com>
        */
        private function sendEmail($email_address, $subject, $message) {
            $this->load->library('email');
            $this->email->from('noreply@app.farhanarrafi.com', 'GeoWordNet Dev Team');
            $this->email->to($email_address);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send())
            return TRUE;
            else
            return FALSE;
        }
        
        private function initialize() {
            $this->data['error']['username'] = NULL;
            $this->data['error']['email'] = NULL;
            $this->data['error']['password'] = NULL;
            $this->data['error']['password_confirm'] = NULL;
            $this->data['error']['user_exists'] = NULL;
        }
        
        public function userNameIsUnique($username) {
            $this->load->model('user_class');
            $user = new User_class();
            if ($user->userNameIsUnique($username)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('userNameIsUnique', 'The Username already exists.');
                return FALSE;
            }
        }
        
        public function userEmailNotUnique($email) {
            return !userEmailIsUnique($email);
            
        }
        public function userEmailIsUnique($email) {
            $this->load->model('user_class');
            $user = new User_class();
            if ($user->userEmailIsUnique($email)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('userEmailIsUnique', 'The Email already exists.');
                return FALSE;
            }
        }
        
        public function passwordOk($password) {
            return TRUE;
        }
        
        public function passwordConfirmOk($password_confirm) {
            return TRUE;
        }
        
        public function userNameOK($username) {
            $this->load->model('user_class');
            $user = new User_class();
            if (!($user->userNameIsUnique($username))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('userNameOK', 'Username dnot match any user.');
                return FALSE;
            }
        }
        
        public function userPasswordOk($password, $username) {
            $this->load->model('user_class');
            $user = new User_class();
            $user->username = $username;
            $user->password = sha1($password);
            if ($user->validateLogin()) {
                $user = $user->get();
                $session_data = array(
                    'username' => $user->username,
                    'email' => $user->email,
                    'token' => $user->token,
                    'sessionID' => sha1($user->email . SESSION_SALT)
                );
                $this->session->set_userData($session_data);
                return TRUE;
            } else {
                $this->form_validation->set_message('userPasswordOk', 'Username Passwords do not match.');
                return FALSE;
            }
        }
        
        /**
        * This function authenticates login
        */
        private function authenticate_login($username, $password) {
            $this->load->model('user_class');
            $user = new User_class();
            $user->username = $username;
            $user->password = sha1($password);
            if ($user->validateLogin()) {
                $user = $user->get();
                $array = array(
                    'username' => $user->username,
                    'email' => $user->email,
                    'token' => $user->token,
                );
                return json_decode($array);
            }
            return NULL;
        }
        
    }
    