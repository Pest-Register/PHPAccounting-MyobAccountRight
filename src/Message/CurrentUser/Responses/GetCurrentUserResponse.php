<?php
namespace PHPAccounting\MyobAccountRight\Message\CurrentUser\Responses;

use Omnipay\Common\Message\AbstractResponse;
use PHPAccounting\MyobAccountRight\Helpers\IndexSanityCheckHelper;

/**
 * Get Contact(s) Response
 * @package PHPAccounting\MyobAccountRight\Message\Contacts\Responses
 */
class GetCurrentUserResponse extends AbstractResponse
{

    /**
     * Check Response for Error or Success
     * @return boolean
     */
    public function isSuccessful()
    {
        if(array_key_exists('Errors', $this->data)){
            return !$this->data['Errors'][0]['Severity'] == 'Error';
        }
        return true;
    }

    /**
     * Fetch Error Message from Response
     * @return string
     */
    public function getErrorMessage()
    {
        if (array_key_exists('Errors', $this->data)) {
            return $this->data['Errors'][0]['Message'];
        }
        return null;
    }


    /**
     * Return all Contacts with Generic Schema Variable Assignment
     * @return array
     */
    public function getCurrentUser(){
        return $this->data;
    }
}