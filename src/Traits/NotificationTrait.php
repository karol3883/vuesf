<?php

namespace App\Traits;

trait NotificationTrait
{

    private array $availableVariants = [
        'primary',
        'secondary',
        'danger',
        'warning',
        'success',
        'info',
    ];

    private function addNotificationToResponse(array &$response, string $message, string $title, string $variant = 'danger'): void
    {
        $response['toast_details'] = [
            'message' => $message,
            'title' => $title,
            'variant' => in_array($variant, $this->availableVariants) ? $variant : 'danger',
        ];
    }
}