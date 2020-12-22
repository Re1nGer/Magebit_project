<?php 

    class emailValidation {
        protected $data; 
        protected $errors =[]; 
        

        public function __construct($post_data) {
            $this->data = $post_data; 
        }

        public function validateForm() {
            
            $this->validateEmail(); 
            $this->validateCheckbox();
            return $this->errors; 
        }

        private function validateEmail() {
            $input_value = $this->data['email-input']; 
            if(empty($input_value)) {
                $this->addError('email-input', 'email cannot be empty'); 
            }  
            if(!filter_var($input_value, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email-input', "email must be valid"); 
                }
            if(substr($input_value,strlen($input_value)-2, 2) == "co") {
                $this->addError('email-input', 'We are not accepting subscriptions from Columbia emails');
            }      
         }

        private function validateCheckbox() {
            $checkbox = $this->data['termsOfService'] ?? ''; 
            if(empty($checkbox) || $checkbox == '') {
                $this->addError('termsOfService', 'Checkbox must be checked'); 
            }
        }

        private function addError($key, $val) {
            $this->errors[$key] = $val; 
        }
    }
?>