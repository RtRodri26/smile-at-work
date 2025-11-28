<?php

namespace App\Services;

use GuzzleHttp\Client;
use Exception;

class ApiPeruService
{
    protected $client;
    protected $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->token = env('APIPERU_TOKEN');
    }

    public function consultarDNI($dni)
    {
        try {
            $response = $this->client->request('POST', 'https://apiperu.dev/api/dni', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode(['dni' => $dni]),
                'verify' => false, // Solo para desarrollo, en producción quitar
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['success']) && $data['success'] && isset($data['data'])) {
                return [
                    'success' => true,
                    'data' => [
                        'dni' => $data['data']['numero'],
                        'nombres' => $data['data']['nombres'],
                        'apellido_paterno' => $data['data']['apellido_paterno'],
                        'apellido_materno' => $data['data']['apellido_materno'],
                    ]
                ];
            }

            return ['success' => false, 'message' => 'DNI no encontrado en los registros'];

        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error al consultar el DNI: ' . $e->getMessage()];
        }
    }
}