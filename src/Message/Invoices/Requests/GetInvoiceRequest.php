<?php

namespace PHPAccounting\MyobAccountRight\Message\Invoices\Requests;
use PHPAccounting\MyobAccountRight\Helpers\BuildEndpointHelper;
use PHPAccounting\MyobAccountRight\Message\AbstractRequest;
use PHPAccounting\MyobAccountRight\Message\Invoices\Responses\GetInvoiceResponse;

/**
 * Get Invoice(s)
 * @package PHPAccounting\MyobAccountRight\Message\Invoices\Requests
 */
class GetInvoiceRequest extends AbstractRequest
{

    /**
     * Set Invoice Type from Parameter Bag
     * @param $value
     * @return GetInvoiceRequest
     */
    public function setInvoiceType($value) {
        return $this->setParameter('invoice_type', $value);
    }

    /**
     * Get Invoice Type from Parameter Bag
     */
    public function getInvoiceType() {
        return $this->getParameter('invoice_type');
    }

    /**
     * Set AccountingID from Parameter Bag (UID generic interface)
     * @param $value
     * @return GetInvoiceRequest
     */
    public function setAccountingID($value) {
        return $this->setParameter('accounting_id', $value);
    }

    /**
     * Set Page Value for Pagination from Parameter Bag
     * @param $value
     * @return GetInvoiceRequest
     */
    public function setPage($value) {
        return $this->setParameter('page', $value);
    }

    /**
     * Return Accounting ID (UID)
     * @return mixed comma-delimited-string
     */
    public function getAccountingID() {
        if ($this->getParameter('accounting_id')) {
            return $this->getParameter('accounting_id');
        }
        return null;
    }

    /**
     * Return Page Value for Pagination
     * @return integer
     */
    public function getPage() {
        if ($this->getParameter('page')) {
            return $this->getParameter('page');
        }

        return 1;
    }

    public function getEndpoint()
    {

        $endpoint = 'Sale/Invoice/'.$this->getInvoiceType().'/';

        if ($this->getAccountingID()) {
            if ($this->getAccountingID() !== "") {
                $endpoint = BuildEndpointHelper::loadByGUID($endpoint, $this->getAccountingID());
            }
        } else {
            if ($this->getPage()) {
                if ($this->getPage() !== "") {
                    $endpoint = BuildEndpointHelper::paginate($endpoint, $this->getPage());
                }
            }
        }
        return $endpoint;
    }

    public function getHttpMethod()
    {
        return 'GET';
    }

    protected function createResponse($data, $headers = [])
    {
        return $this->response = new GetInvoiceResponse($this, $data);
    }
}