<?php
/**
 * Anowave Magento 2 Google Tag Manager Enhanced Ecommerce (UA) Tracking
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Anowave license that is
 * available through the world-wide-web at this URL:
 * http://www.anowave.com/license-agreement/
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category 	Anowave
 * @package 	Anowave_Ec
 * @copyright 	Copyright (c) 2020 Anowave (http://www.anowave.com/)
 * @license  	http://www.anowave.com/license-agreement/
 */

namespace Anowave\Ec\Observer\Contact;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class Post implements ObserverInterface
{
	/**
	 * @var \Magento\Customer\Model\Session
	 */
	protected $session;
	
	/**
	 * @var \Anowave\Ec\Helper\Json
	 */
	protected $jsonHelper;
	
	/**
	 * Constructor 
	 * 
	 * @param \Magento\Customer\Model\Session $session
	 * @param \Anowave\Ec\Helper\Json $jsonHelper
	 */
	public function __construct
	(
		\Magento\Customer\Model\Session $session,
		\Anowave\Ec\Helper\Json $jsonHelper
	)
	{
		/**
		 * Set session 
		 * 
		 * @var \Magento\Customer\Model\Session $session
		 */
		$this->session = $session;	
		
		/**
		 * Set JSON helper 
		 * 
		 * @var \Anowave\Ec\Helper\Json $jsonHelper
		 */
		$this->jsonHelper = $jsonHelper;
	}
	
	/**
	 * Execute (non-PHPdoc)
	 * 
	 * @see \Magento\Framework\Event\ObserverInterface::execute()
	 */
	public function execute(EventObserver $observer)
	{
		if ($_POST)
		{
			$this->session->setContactEvent($this->jsonHelper->encode(
			[
				'event' 			=> 'contactSubmit',
				'eventCategory' 	=> __('Contact'),
				'eventAction' 		=> __('Submit'),
				'eventLabel' 		=> __('Submit form'),
				'eventValue' 		=> 1
			]));
		}
	}
}