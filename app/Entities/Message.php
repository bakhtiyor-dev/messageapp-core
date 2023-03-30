<?php

namespace App\Models;

use App\Contracts\Sendable;
use App\Enums\MessageType;
use App\Exceptions\InvalidMessageException;
use App\Exceptions\InvalidSenderException;
use Core\Model;

abstract class Message extends Model
{
    protected Sendable $sender;

    protected User $receiver;

    protected string $message;

    protected int $creationTime;

    protected MessageType $messageType;

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function save()
    {
        if (!in_array(get_class($this->receiver), $this->sender->allowedReceiverTypes())) {
            throw new InvalidSenderException('Cannot send for this type of user!');
        }

        if (!in_array($this->messageType, $this->sender->allowedMessageTypes())) {
            throw new InvalidMessageException('Cannot send this kind of message!');
        }
    }

    /**
     * @param Sendable $sender
     */
    public function setSender(Sendable $sender): void
    {
        $this->sender = $sender;
    }

    /**
     * @param User $receiver
     */
    public function setReceiver(User $receiver): void
    {
        $this->receiver = $receiver;
    }
}
