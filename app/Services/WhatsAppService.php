<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected string $token;
    protected string $phoneId;
    protected string $apiUrl;

    public function __construct()
    {
        $this->token = env('WA_TOKEN', '');
        $this->phoneId = env('WA_PHONE_ID', '');
        $this->apiUrl = rtrim(env('WA_API_URL', 'https://graph.facebook.com'), '/');

        Log::info('=== WhatsApp Service Initialized ===', [
            'token_exists' => !empty($this->token),
            'phone_id_exists' => !empty($this->phoneId),
            'api_url' => $this->apiUrl,
            'available' => $this->available()
        ]);
    }

    public function available(): bool
    {
        return !empty($this->token) && !empty($this->phoneId);
    }

    /**
     * Send a simple text message via WhatsApp Cloud API
     * @param string $to in international format (e.g. 62812...)
     * @param string $message
     * @return array response
     */
    public function sendText(string $to, string $message): array
    {
        if (!$this->available()) {
            throw new \RuntimeException('WhatsApp credentials not configured');
        }

        $url = "{$this->apiUrl}/v15.0/{$this->phoneId}/messages";

        $payload = [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'text',
            'text' => ['body' => $message]
        ];

        $resp = Http::withToken($this->token)
            ->acceptJson()
            ->post($url, $payload);

        $result = [
            'status' => $resp->status(),
            'body' => $resp->json(),
        ];

        if ($resp->failed()) {
            Log::error('WhatsApp send failed', ['resp' => $result]);
        } else {
            Log::info('WhatsApp sent', ['resp' => $result]);
        }

        return $result;
    }
}
