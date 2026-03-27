<?php
/**
 * @description System config model
 * @author      C. M. de Picciotto <d3p1@d3p1.dev> (https://d3p1.dev/)
 */
namespace Bina\Social\Model\System;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Bina\Social\Api\SystemConfigInterface;

class Config implements SystemConfigInterface
{
    /**
     * @var ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * Constructor
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->_scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritDoc}
     */
    public function getFacebook($storeId)
    {
        return $this->_getConfigData(self::FACEBOOK, $storeId);
    }

    /**
     * {@inheritDoc}
     */
    public function getInstagram($storeId)
    {
        return $this->_getConfigData(self::INSTAGRAM, $storeId);
    }

    /**
     * {@inheritDoc}
     */
    public function getTwitter($storeId)
    {
        return $this->_getConfigData(self::TWITTER, $storeId);
    }

    /**
     * {@inheritDoc}
     */
    public function getDiscord($storeId)
    {
        return $this->_getConfigData(self::DISCORD, $storeId);
    }

    /**
     * Retrieve information from service configuration
     *
     * @param  string     $field
     * @param  string|int $storeId
     * @return mixed
     */
    protected function _getConfigData($field, $storeId)
    {
        return $this->_scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}