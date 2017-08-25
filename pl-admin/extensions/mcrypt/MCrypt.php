
<?php

class MCrypt {
   
    public function __set($name, $value){
        switch($name){
            case 'key':
            case 'ivs':
            case 'iv':
            $this->$name = $value;
            break;

            default:
            throw new Exception("$name cannot be set");
        }
    }

    public function __get($name){
        switch($name){
            case 'key':
            return 'keee';

            case 'ivs':
            return mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);

            case 'iv':
            return mcrypt_create_iv($this->ivs);

            default:
            throw new Exception("$name cannot be called");
        }
    }

    public function encrypt($text){
        // add end of text delimiter
        $data = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key, $text, MCRYPT_MODE_ECB, $this->iv);
        return base64_encode($data);
    }

    public function decrypt($text){
        $text = base64_decode($text);
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key, $text, MCRYPT_MODE_ECB, $this->iv);
    }
}
