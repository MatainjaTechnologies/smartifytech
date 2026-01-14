<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class RecaptchaService
{
    protected $client;
    protected $secretKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->secretKey = config('services.recaptcha.secret_key');
    }

    /**
     * Verify reCAPTCHA response
     *
     * @param string $response
     * @return bool
     */
    public function verify($response)
    {
        try {
            $res = $this->client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => $this->secretKey,
                    'response' => $response,
                    'remoteip' => request()->ip(),
                ]
            ]);

            $body = json_decode($res->getBody(), true);

            return $body['success'] ?? false;
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification failed: ' . $e->getMessage());
            return false;
        }
    }
}
