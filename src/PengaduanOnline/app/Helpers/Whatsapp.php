<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Whatsapp
{
    public static function kirim($nomor, $pesan)
    {
        $deviceId = config('services.wablas.device_id');
        $authorization = config('services.wablas.authorization');

        // Format nomor ke 62xxxxxxxxxxx
        if (str_starts_with($nomor, '08')) {
            $nomor = '62'.substr($nomor, 1);
        }

        // Kirim request ke Wablas
        $response = Http::withHeaders([
            'Authorization' => $authorization,
        ])->post('https://sby.wablas.com/api/v2/send-message', [
            'data' => [
                [
                    'phone' => $nomor,
                    'message' => $pesan,
                    'device_id' => $deviceId,
                    'priority' => true,
                ],
            ],
        ]);

        logger('Wablas response:', $response->json());

        return $response->json();
    }
}
