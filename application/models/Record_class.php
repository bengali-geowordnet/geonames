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
 * @author	Farhan Ar Rafi
 * @copyright	Copyright (c) 2014 - 2015, farhanarrafi@gmail.com
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://www.farhanarrafi.com
 * @since	Version 1.0.0
 * @filesource
 */

/**
 * This class is used to acess user information in the database.
 * This user is not just a normal user but includes developers who 
 * use our API and device owners that use our APPLICATIONS.
 * 
 * @author Farhan
 */

class Record_class extends MY_Model {

    const TABLE_NAME = 'records';
    const TABLE_PK = 'recordid';

    /**
     *
     * @var int(11) NOT NULL
     */
    public $recordid = 0;
    /**
     * Foreign key of User_info(userid)
     * @var int(11) NOT NUL
     */
    public $userid = 0;
    /**
     * Foreign key of Geonames_data_dump(geonameid)
     * @var int(11) NOT NUL
     */
    public $geonameid = 0;
    
    public $time = null;
        
    public function __construct() {
        parent::__construct();
    }
    
    

    public function getRecords($token) {
/**
SELECT `r`.`recordid`,`g`.`name`, `g`.`longitude`, `g`.`latitude`, `r`.`time` 
FROM `geoname_data_dump` AS `g`, `records` AS `r`, `user_info` AS `u`
WHERE `g`.`geonameid` = `r`.`geonameid` AND `u`.`userid` = 1
ORDER BY `r`.`time` DESC
LIMIT 0,10;        
*/
        $this->db->select("`r`.`recordid`,`g`.`name`, `g`.`longitude`, `g`.`latitude`, `r`.`time` ");
        $this->db->limit(10);
        $this->db->from("`geoname_data_dump` AS `g`, `records` AS `r`, `user_info` AS `u` ");
        $this->db->where("`g`.`geonameid` = `r`.`geonameid` AND `u`.`token` = '".$token."' ");
        $this->db->order_by("`r`.`time` DESC");
        $query = $this->db->get();
        $rows = $query->result();
        //var_dump($rows);
        return $rows;
    }

}

/**
 SELECT * FROM `geoname_data_dump`
JOIN `records`
JOIN `user_info`
ON `records`.`userid` = `user_info`.`userid`
ORDER BY `records`.`time` DESC;
 * 
SELECT * FROM `geoname_data_dump` AS `g`, `records` AS `r`, `user_info` AS `u`
WHERE `g`.`geonameid` = `r`.`geonameid` AND `u`.`userid` = 1
ORDER BY `records`.`time` DESC;
 * 
SELECT `r`.`recordid`,`g`.`name`, `g`.`longitude`, `g`.`latitude`, `r`.`time` 
FROM `geoname_data_dump` AS `g`, `records` AS `r`, `user_info` AS `u`
WHERE `g`.`geonameid` = `r`.`geonameid` AND `u`.`userid` = 1
ORDER BY `r`.`time` DESC
LIMIT 0,10;
 */

