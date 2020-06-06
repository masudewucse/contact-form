<?php 

class InputValidation{
    private $data;
    private $error = [];
    static $fields = ['fullname','email','subject','message'];

    public function __construct($post_data){
        $this->data = $post_data;
    }
    public function validateForm(){
            foreach(self::$fields as $field){
                if(!array_key_exists($field,$this->data)){
                    trigger_error("$field is not present in data");
                    return;
                }
            $this->validateFullName();
            $this->validateEmail(); 
            $this->validateSubject();
            $this->validateMessage();
            
            return $this->error;   
            }
    }

    private function validateFullName(){
        $val = trim($this->data['fullname']);
        if(empty($val)){
            $this->addError("fullname","user name can not be empty!");
        }else{
            if(!preg_match('/^[a-zA-Z0-9\s]{3,100}$/',$val)){
               $this->addError('fullname','User name must be 3-100 chars and alphanumaric!');     
            }
        }

    }

    private function validateEmail(){
        $val = trim($this->data['email']);
        if(empty($val)){
            $this->addError("email","email can not be empty!");
        }else{
            if(!filter_var($val,FILTER_VALIDATE_EMAIL)){
               $this->addError('email','Email must be a valid email!');     
            }
        }
    }

    private function validateSubject(){
        $val = trim($this->data['subject']);
        if(empty($val)){
            $this->addError("subject","Subject can not be empty!");
        }  
    }

    private function validateMessage(){
        $val = trim($this->data['message']);
        if(empty($val)){
            $this->addError("message","Message can not be empty!");
        }else{
            if(preg_match('/([%\$#\*]+)/',$val)){
               $this->addError('message','Message text must be valid and readable!');     
            }
        }  
    }

    private function addError($key,$value){
        $this->error[$key] = $value;
    }
}