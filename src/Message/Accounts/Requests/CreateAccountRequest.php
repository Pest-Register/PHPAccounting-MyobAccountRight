<?php

namespace PHPAccounting\MyobAccountRight\Message\Accounts\Requests;

use PHPAccounting\MyobAccountRight\Message\AbstractRequest;
use PHPAccounting\MyobAccountRight\Message\Accounts\Responses\CreateAccountResponse;


/**
 * Create Account(s)
 * @package PHPAccounting\MyobAccountRight\Message\Accounts\Requests
 */
class CreateAccountRequest extends AbstractRequest
{


    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Send Data to Xero Endpoint and Retrieve Response via Response Interface
     * @param mixed $data Parameter Bag Variables After Validation
     * @return \Omnipay\Common\Message\ResponseInterface|CreateAccountResponse
     */
    public function sendData($data)
    {
        $response = [];
        return $this->createResponse($response->getElements());
    }

    /**
     * Create Generic Response from Xero Endpoint
     * @param mixed $data Array Elements or Xero Collection from Response
     * @return CreateAccountResponse
     */
    public function createResponse($data)
    {
        return $this->response = new CreateAccountResponse($this, $data);
    }
}