<?php


    /**
    * @author : Alireza Josheghani [ Josh ]
    * @package : JoshChmod
    * @version : 0.0.1
    */
    class Josh
    {
        var $red;
        var $no_color;
        var $green;
        var $yellow;
        public function __construct(){
            $this->red = "\033[31m";
            $this->green = "\033[32m";
            $this->no_color = "\033[0m";
            $this->yellow = "\033[33m";
        }
        public function handle_request(array $args)
        {
            if(!empty($args[1])){
                switch ($args[1]){
                    case '-l': # permission for localhost in linux 
                        if(!empty($args[2])){
                            exec('sudo find '.$args[2].' -type d -exec chmod 777 {} +');
                            exec('sudo find '.$args[2].' -type f -exec chmod 666 {} +');
                        } else {
                            return $this->red.">>> the directory name was empty ! \n".$this->no_color;
                        }
                        break;
                    case '-s': # permission for virtual hosts or servers 
                        if(!empty($args[2])){
                            exec('sudo find '.$args[2].' -type d -exec chmod 755 {} +');
                            exec('sudo find '.$args[2].' -type f -exec chmod 655 {} +');
                        } else {
                            return $this->red.">>> The directory name was empty ! \n".$this->no_color;
                        }
                        break;
                }
            } else {
                return $this->yellow."Josh Chmod V:0.0.1 \n".
                       $this->green."Available Commands : \n".
                       $this->no_color."    -l  [ Project directory path ]    ".$this->red."permission for localhost in linux \n".$this->no_color.
                       "    -s  [ Project directory path ]    ".$this->red."permission for virtual hosts or servers \n".$this->no_color;

            }
        }
    }

