<?php

namespace Controller;

use Model\Entity\User;
use Model\Utils\Form;
use Model\Services\SecurityManager;
use Model\Services\SessionManager;
use Model\Services\MessageManager;

class ChatBoardController extends AbstractController
{
    /**
     * @var SecurityManager
     */
    private $securityManager;

    /**
     * @var SessionManager
     */
    private $sessionManager;

    /**
     * @var MessageManager
     */
    private $messageManager;

    /**
     * @var Form
     */
    private $formUtils;

    public function __construct()
    {
        $container = $this->getContainer();
        $this->securityManager = $container->get(SecurityManager::class);
        $this->sessionManager = $container->get(SessionManager::class);
        $this->messageManager = $container->get(MessageManager::class);
        $this->formUtils = new Form();
    }

    public function showBoard()
    {
        $user = $this->securityManager->getAuthenticatedUser();

        if (!$user instanceof User) {
            $this->redirectTo('/login');
        }

        $connectedUsers = $this->sessionManager->getAllActiveSession();
        $receiverId = $this->getQueryField('receiver_id');
        $lastMessages = [];

        if ($receiverId) {
            $lastMessages = $this->messageManager->getMessageList($user->getId(), $receiverId);
        }

        $this->renderTemplate(
        	'chatBoard', 
        	[
        		'user' => $user,
        		'connectedUsers' => $connectedUsers,
        		'receiverId' => $receiverId,
        		'lastMessages' => $lastMessages,
        	]
    	);
    }

    public function postMessage()
    {
        $user = $this->securityManager->getAuthenticatedUser();

        if (!$user instanceof User) {
            $this->redirectTo('/login');
        }

        $content = $this->getRequestField('content');
        $receiverId = $this->getRequestField('receiver_id');
        $this->messageManager->createMessage($user->getId(), $receiverId, $content);
        $this->redirectTo('/chat_board?receiver_id=' . $receiverId);
    }
}

