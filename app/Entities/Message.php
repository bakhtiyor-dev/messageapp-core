<?php

namespace App\Entities;

use App\Contracts\Receivable;
use App\Contracts\Sendable;
use App\Enums\MessageType;
use App\Exceptions\InvalidMessageException;
use App\Exceptions\InvalidReceiverException;
use App\Exceptions\InvalidSenderException;
use Core\Model;

abstract class Message extends Model
{
    protected Sendable $sender;

    protected Receivable $receiver;

    protected string $message;

    protected int $creationTime;

    protected MessageType $messageType;

    public function setSender(Sendable $sender): void
    {
        $this->sender = $sender;
    }

    public function setReceiver(Receivable $receiver): void
    {
        $this->receiver = $receiver;
    }

    public function getSenderFullName(): string
    {
        return $this->sender->getFullName();
    }

    public function getReceiverFullName(): string
    {
        return $this->receiver->getFullName();
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getMessageType(): MessageType
    {
        return $this->messageType;
    }

    public function getCreationTime(): string
    {
        return gmdate("Y-m-d\TH:i:s\Z", $this->creationTime);
    }

    /**
     * @throws InvalidMessageException
     * @throws InvalidSenderException
     * @throws InvalidReceiverException
     */
    public function save(): bool
    {
        if (!in_array(get_class($this->receiver), $this->sender->allowedReceiverTypes())) {
            throw new InvalidReceiverException('Cannot send for this type of user!');
        }

        if (!in_array($this->messageType, $this->sender->allowedSendMessageTypes())) {
            throw new InvalidMessageException('Cannot send this kind of message!');
        }

        if (!in_array($this->messageType, $this->receiver->allowedReceiveMessageTypes())) {
            throw new InvalidReceiverException('Cannot send this kind of message!');
        }

        return true;
    }
}
