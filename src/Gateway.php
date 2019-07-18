<?php

namespace PHPAccounting\MyobAccountRight;

use Omnipay\Common\AbstractGateway;

/**
 * Created by IntelliJ IDEA.
 * User: Dylan
 * Date: 13/05/2019
 * Time: 3:11 PM
 * @method \PhpAccounting\Common\Message\NotificationInterface acceptNotification(array $options = array())
 * @method \PhpAccounting\Common\Message\RequestInterface authorize(array $options = array())
 * @method \PhpAccounting\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \PhpAccounting\Common\Message\RequestInterface capture(array $options = array())
 * @method \PhpAccounting\Common\Message\RequestInterface purchase(array $options = array())
 * @method \PhpAccounting\Common\Message\RequestInterface completePurchase(array $options = array())
 * @method \PhpAccounting\Common\Message\RequestInterface refund(array $options = array())
 * @method \PhpAccounting\Common\Message\RequestInterface fetchTransaction(array $options = [])
 * @method \PhpAccounting\Common\Message\RequestInterface void(array $options = array())
 * @method \PhpAccounting\Common\Message\RequestInterface createCard(array $options = array())
 * @method \PhpAccounting\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \PhpAccounting\Common\Message\RequestInterface deleteCard(array $options = array())
 */

class Gateway extends AbstractGateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'Myob';
    }

    /**
     * Access Token getters and setters
     * @return mixed
     */

    public function getAccessToken()
    {
        return $this->getParameter('accessToken');
    }

    public function setAccessToken($value)
    {
        return $this->setParameter('accessToken', $value);
    }

    /**
     * API Key getters and setters
     * @return mixed
     */

    public function getAPIKey()
    {
        return $this->getParameter('APIKey');
    }

    public function setAPIKey($value)
    {
        return $this->setParameter('APIKey', $value);
    }


    public function setCompanyFile($value)
    {
        return $this->setParameter('companyFile', $value);
    }

    public function getCompanyFile() {
        return $this->getParameter('companyFile');
    }

    public function setCompanyEndpoint($value)
    {
        return $this->setParameter('companyEndpoint', $value);
    }

    public function getCompanyEndpoint() {
        return $this->getParameter('companyEndpoint');
    }


    /**
     * Customer Requests
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */

    public function createContact(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Contacts\Requests\CreateContactRequest', $parameters);
    }

    public function updateContact(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Contacts\Requests\UpdateContactRequest', $parameters);
    }

    /**
     * Get One or Multiple Contacts
     * @param array $parameters
     * @bodyParam array $parameters
     * @bodyParam parameters.page int optional Page Index for Pagination
     * @bodyParam parameters.accountingIDs array optional Array of GUIDs for Contact Retrieval / Filtration
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function getContact(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Contacts\Requests\GetContactRequest', $parameters);
    }

    public function deleteContact(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Contacts\Requests\DeleteContactRequest', $parameters);
    }


    /**
     * Invoice Requests
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */

    public function createInvoice(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Invoices\Requests\CreateInvoiceRequest', $parameters);
    }

    public function updateInvoice(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Invoices\Requests\UpdateInvoiceRequest', $parameters);
    }

    public function getInvoice(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Invoices\Requests\GetInvoiceRequest', $parameters);
    }

    public function deleteInvoice(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Invoices\Requests\DeleteInvoiceRequest', $parameters);
    }

    /**
     * Account Requests
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */

    public function createAccount(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Accounts\Requests\CreateAccountRequest', $parameters);
    }

    public function updateAccount(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Accounts\Requests\UpdateAccountRequest', $parameters);
    }

    public function getAccount(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Accounts\Requests\GetAccountRequest', $parameters);
    }

    public function deleteAccount(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Accounts\Requests\DeleteAccountRequest', $parameters);
    }

    /**
     * Payment Requests
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */

    public function createPayment(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Payments\Requests\CreatePaymentRequest', $parameters);
    }

    public function updatePayment(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Payments\Requests\UpdatePaymentRequest', $parameters);
    }

    public function getPayment(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Payments\Requests\GetPaymentRequest', $parameters);
    }

    public function deletePayment(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Payments\Requests\DeletePaymentRequest', $parameters);
    }

    /**
     * Organisation Requests
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */

    public function getOrganisation(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\Organisations\Requests\GetOrganisationRequest', $parameters);
    }

    /**
     * CurrentUser Requests
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */

    public function getCurrentUser(array $parameters = []){
        return $this->createRequest('\PHPAccounting\MyobAccountRight\Message\CurrentUser\Requests\GetCurrentUserRequest', $parameters);
    }
}