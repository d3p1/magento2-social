<?php
/**
 * @description Social widget block
 * @author      C. M. de Picciotto <d3p1@d3p1.dev> (https://d3p1.dev/)
 */
namespace Bina\Social\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;
use Bina\Social\Api\SystemConfigInterface;

class Social extends Template implements BlockInterface
{
    /**
     * @var SystemConfigInterface
     */
    protected $_config;

    /**
     * @var string
     */
    protected $_template = 'Bina_Social::widget/social.phtml';

    /**
     * Constructor
     *
     * @param SystemConfigInterface $config
     * @param Context               $context
     * @param array                 $data
     */
    public function __construct(
        SystemConfigInterface $config,
        Context               $context,
        array                 $data = []
    ) {
        $this->_config = $config;

        parent::__construct($context, $data);
    }

    /**
     * Get Facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->_config->getFacebook($this->_getStoreId());
    }

    /**
     * Get Instagram
     *
     * @return string
     */
    public function getInstagram()
    {
        return $this->_config->getInstagram($this->_getStoreId());
    }

    /**
     * Get Twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->_config->getTwitter($this->_getStoreId());
    }

    /**
     * Get Discord
     *
     * @return string
     */
    public function getDiscord()
    {
        return $this->_config->getDiscord($this->_getStoreId());
    }

    /**
     * Get store ID
     *
     * @return int
     */
    private function _getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }
}
