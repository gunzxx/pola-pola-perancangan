<?php
interface Notifier
{
    public function send(string $message): string;
}

class EmailNotifier implements Notifier
{
    public function send(string $message): string
    {
        return "Sending Email: " . $message;
    }
}

class SMSNotifier implements Notifier
{
    public function send(string $message): string
    {
        return "Sending SMS: " . $message;
    }
}

class DesktopNotifier implements Notifier
{
    public function send(string $message): string
    {
        return "Sending Desktop notification: " . $message;
    }
}

abstract class NotifierFactory
{
    abstract protected function getNotifier(): Notifier;

    public function sendNotification(string $message): string
    {
        $notifier = $this->getNotifier();
        return $notifier->send($message);
    }
}

class EmailNotifierFactory extends NotifierFactory
{
    protected function getNotifier(): Notifier
    {
        return new EmailNotifier();
    }
}

class SMSNotifierFactory extends NotifierFactory
{
    protected function getNotifier(): Notifier
    {
        return new SMSNotifier();
    }
}

class DesktopNotifierFactory extends NotifierFactory
{
    protected function getNotifier(): Notifier
    {
        return new DesktopNotifier();
    }
}

function sendAlert(NotifierFactory $factory, $message)
{
    echo $factory->sendNotification($message) . PHP_EOL;
}

sendAlert(new EmailNotifierFactory(), "Hello, this is a test email!");
sendAlert(new SMSNotifierFactory(), "Hello, this is a test SMS!");
sendAlert(new DesktopNotifierFactory(), "Hello, this is a desktop notification!");
