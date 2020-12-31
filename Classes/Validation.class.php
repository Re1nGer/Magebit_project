<?php 
    class Validation {
        private $data; 
        private $errors = []; 
        private $prohibitedProviders = array("Columbia" => "co"); 

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
            $provider = substr($input_value, strlen($input_value)-2, 2); 
            if(empty($input_value)) {
                $this->addError('email-input', 'email cannot be empty'); 
            }  
            if(!filter_var($input_value, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email-input', "Email must be valid"); 
                }
            $this->validateProvider($provider); 
         }

        private function validateCheckbox() {
            $checkbox = $this->data['termsOfService'] ?? ''; 
            if(empty($checkbox) || $checkbox == '') {
                $this->addError('termsOfService', 'Checkbox must be checked'); 
            }
        }

        private function validateProvider($provider) {
            foreach($this->prohibitedProviders as $country => $prohibitedProvider) {
                if($provider == $prohibitedProvider) {
                    $this->addError('email-input', 'We are not accepting subscriptions from ' . $country . ' emails');
                }
            }
        }

        private function addError($key, $val) {
            $this->errors[$key] = $val; 
        }
    }
?>