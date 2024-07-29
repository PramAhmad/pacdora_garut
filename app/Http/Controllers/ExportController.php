<?php

namespace App\Http\Controllers;

use App\Traits\HttpTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function PHPSTORM_META\type;

class ExportController extends Controller
{

  public function index($id)
  {
    //    $export = $this->post('https://api.pacdora.com/open/v1/user/projects/export/pdf​', [
    //         'projectId' => $id
    //     ]);
    $url = 'https://api.pacdora.com/open/v1/user/projects/export/pdf​';
    $headers = [
      'appId: 71ee73045e3480fe',
      'appKey: a3e831ccfa3ffd84',
      'Content-Type: application/json',
    ];

    $data = [
      'projectIds' => [$id],
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('projectIds' => [$id])));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  $response = curl_exec($ch);

  if (curl_errno($ch)) {
      $error_msg = curl_error($ch);
      curl_close($ch);
      throw new \Exception("cURL error: " . $error_msg);
  }

  curl_close($ch);

  $responseData = json_decode($response, true);

  return $responseData;

  }
}
