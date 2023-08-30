<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToAdministratorNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $code;
    public $email;

    public function __construct($codeTosend, $sendToemail )
    {
        $this->code = $codeTosend;
        $this->email = $sendToemail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Création de l\'e-mail')
                    ->line('The introduction to the notification.')
                    ->line('Saisissez le code '.$this->code. 'et renseigner le dans le formulaire')
                    ->line('cliquez sur le bouton ci-dessous pour
                    valider votre compte en saisissant le code de validation'.$this->code. 'et renseigner le dans le formulaire')
                    ->action('Notification Action', url('/validation-account'. '/' . $this->email))
                    ->line('Merci d\'utiliser nos services!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
