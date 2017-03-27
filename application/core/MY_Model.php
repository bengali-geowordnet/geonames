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
 * @subpackage  Core
 * @author	Farhan Ar Rafi
 * @copyright	Copyright (c) 2014 - 2015, farhanarrafi@gmail.com
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://www.farhanarrafi.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Description of MY_Model
 *
 * @author Farhan
 */
class MY_Model extends CI_Model {
    
    const TABLE_NAME = 'undefined';
    const TABLE_PK = 'undefined';
    
    public function __construct()
    {
            parent::__construct();
    }
    
    /**
     * Determines the next id to be put into an specific table.
     * This fucntion does the following things.
     * <b>1.</b> Selects maximum id no from the table.
     * <b>2.</b> Returns the next id to be inserted.
     * 
     * @return type int
     */
    function getNextID() {
        $this->db->select_max($this::TABLE_PK);
        $query = $this->db->get($this::TABLE_NAME);
        $nextID = $query->result()[0]->{$this::TABLE_PK} + 1;
        return $nextID;
    }    
    
    /**
     * This function checks if a row exists in the database, by matching provided data as array.
     * This fucntion 
     * @param array $array Takes array of key value pairs, containing table attribute names
     * as key and values as values.  
     * @return boolean
     */
    function checkIfExists($array = array()) {
        $this->db->where($array);
        $this->db->limit(1);
        $this->db->from($this::TABLE_NAME);
        $row_num = $this->db->count_all_results();
        if($row_num> 0) {
            return true;
        }
        return false;
    }
    
    
    public function select() {
        return $this->db->get($this::TABLE_NAME);
    }


    public function insert() {
        return $this->db->insert($this::TABLE_NAME, $this);
    }
    
    public function update() {
        return $this->db->update($this::TABLE_NAME, $this);

    }
    public function delete() {
        //$this->db->update($this::TABLE_PK, $this);
        return $this->db->update($this::TABLE_NAME, $this);
    }
    
}
