Codeigniter On Fire  
=======

Automatically-generated database like django, Automatic json API from models, Automatic Node.js calls from Controllers to support high performance and complex processing.

----------
Database:
Just set your model attributes using standard values. The database will be updated at the first load or at attributes changes detections. Example:

    MODEL

        class Blogmodel extends CI_Model {
		//id autoincremental key
            var $title   = ''; //  type  TEXT 
            var $content = ''; //  type  TEXT
            var $date    = "2012-09-09"; //  type  DATETIME
            var votes = 0; //  type  DOUBLE

        // ...
        }


 ----------
 JSON API

 On your MODEL just use the api_  prefix on a  method, this will enable the method in the controller using Reflexion and Closure. The output will be a JSON encoded return value of the model method.

    MODEL

      function api_simplearray()
        {
            return Array(1,2,4,5,6,7);
        } 

    CONTROLLER

    public function __construct()
       {
            parent::__construct();
            // Add your models here
            $this->load->model('Mymodel');

       }

        URL: /index.php/CONTROLLER/api_simplearray/


    *Important: The model must be loaded in the constructor.


----------
Shell script for high performance calls.
In your CONTROLLER just use "sh_file" to name a method. The node file can be called using the following url:

        URL: /index.php/CONTROLLER/sh_file/

This url will execute a FILE in the CONTROLLER folder at the "sh" folder.


The script std output will be passed as the first argument of the "sh_file" method in the CONTROLLER:




