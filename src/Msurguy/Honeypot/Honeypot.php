<?php namespace Msurguy\Honeypot;

use Crypt;

class Honeypot {

    /**
     * Generate a new honeypot and return the form HTML
     * @param  string $honey_name
     * @param  string $honey_time
     * @return string
     */
    public function generate($honey_name, $honey_time)
    {
        // Encrypt the current time
        $honey_time_encrypted = $this->getEncryptedTime();

        $html = '<div style="display:none;">' . "\r\n" .	
                    '<input name="' . $honey_name . '" class="no-validate" type="text" value="" id="' . $honey_name . '"/>' . "\r\n" .
                    '<input name="' . $honey_time . '" class="no-validate" type="text" value="' . $honey_time_encrypted . '"/>' . "\r\n" .
                '</div>';

        return $html;
    }

    /**
     * Get encrypted time
     * @return string
     */
    public function getEncryptedTime()
    {
        return Crypt::encrypt(time());
    }

}