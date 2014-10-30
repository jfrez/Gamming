<?php
class Course extends CI_Model {

    var $title   = '';
    var $desc = '';
    var $path    = 0;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

}
