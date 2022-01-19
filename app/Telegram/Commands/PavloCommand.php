<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\Entities;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Message;
use Longman\TelegramBot\Request;

class PavloCommand extends UserCommand
{
    protected $name = 'pavlo';                      // Your command's name
    protected $description = 'A command for pavlo`s test'; // Your command description
    protected $usage = '/pavlo';                    // Usage of your command
    protected $version = '1.0.0';                  // Version of your command

    public function execute()
    {
        /** @var Message $message */
        $message = $this->getMessage();            // Get Message object

        $chat_id = $message->getChat()->getId();   // Get the current Chat ID
        $randomSeed = uniqid();
        $link = sprintf("https://picsum.photos/seed/%s/200/300", $randomSeed);
        $text = $message->getText(true);
        $data = [                                  // Set up the new message data
            'chat_id' => $chat_id,                 // Set Chat ID to send the message to
            'photo'    => $link, // Set message to send
        ];

        return Request::sendPhoto($data);        // Send message!
    }
}
