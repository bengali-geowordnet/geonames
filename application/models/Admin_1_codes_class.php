<?php/** * GeoWordNet *  * A thesis project for three students at American international University Bangladesh.  * Supervised by Dr. Tabin Hasan, three undergraduate students - Farhan Ar Rafi, Sk. Golam Muhammad Hasnanin and  * Humayra designed this project.  *  * The thesis group also acknoledges the contribution of Shamim Ahmed, Dr. Abu Dayen and more to add.  *  * @package	GeoWordNet * @author	Farhan Ar Rafi * @copyright	Copyright (c) 2014 - 2015, farhanarrafi@gmail.com * @license	http://opensource.org/licenses/MIT	MIT License * @link	http://www.farhanarrafi.com * @since	Version 1.0.0 * @filesource *//** * Description of Admin2codes_class * * @author Farhan */class Admin_1_codes_class extends MY_Model {    const TABLE_NAME = 'admin1codes';    const TABLE_PK = 'undefined';        /**     * Stores the code     * @var char(6)      */    private $code = null;    /**     *     * @var text      */    private $name = "";    public function __construct()    {            parent::__construct();    }}