<?php

namespace Interspark\YawavePublications\Service;

use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\Messaging\FlashMessageRendererResolver;
use TYPO3\CMS\Core\Utility\GeneralUtility;


class ErrorMessage
{
	public function showError($header,$body){


		$message = GeneralUtility::makeInstance(FlashMessage::class,
			$body,
			$header,
			FlashMessage::WARNING,
			true
		);
		$flashMessageService = GeneralUtility::makeInstance(FlashMessageService::class);
		$messageQueue = $flashMessageService->getMessageQueueByIdentifier();
		$messageQueue->addMessage($message);

		/** @var $defaultFlashMessageQueue \TYPO3\CMS\Core\Messaging\FlashMessageQueue */
		$defaultFlashMessageQueue = $flashMessageService->getMessageQueueByIdentifier();
	   $defaultFlashMessageQueue->renderFlashMessages();

	}
}