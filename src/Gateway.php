<?php
/**
 * iPay Gateway
 *              $gateway->setUsername('68a19ca1-7c45-471f-a896-2342b219c4b9');
                                        ^ Same on test & live
 *	            $gateway->setPassword('3xzpLSUPqg');
                                        ^ test password
 */

namespace Omnipay\iPayout;

use Omnipay\Common\AbstractGateway;
use Guzzle\Http\Client as HttpClient;


class Gateway extends AbstractGateway
{
    /**
     * Get the global default HTTP client.
     *
     * @return HttpClient
     */
    protected function getDefaultHttpClient()
    {
        return new HttpClient(
            '',
            array(
                'curl.options' => array(
                    CURLOPT_CONNECTTIMEOUT => 60,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false,
                ),
            )
        );
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'iPayout';
    }

   /**
     * Get the gateway default parameters
     *
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'MerchantGUID' => '',
            'MerchantPassword' => ''
        );
    }
    
    /**
     * Get the gateway username
     *
     * @return string
     */
    public function getMerchantID()
    {
        return $this->getParameter('MerchantGUID');
    }

    /**
     * Set the gateway username
     *
     * @param string username
     * @return interface.
     */
    public function setMerchantID($value)
    {
        return $this->setParameter('MerchantGUID', $value);
    }

    /**
     * Set the getway password
     *
     * @param string password
     * @return interface
     */
    public function setAPIPassword($value)
    {
        return $this->setParameter('MerchantPassword', $value);
    }

    /**
     * Get the gateway password
     *
     * @return string
     */
    public function getAPIPassword()
    {
        return $this->getParameter('MerchantPassword');
    }

}
