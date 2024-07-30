<?php
error_reporting(E_ALL);
class Paystack {

    private $secret_key = 'sk_test_16b3a70caa2f193ba359f7ce963d03a895955726';

    public function paystack_verify($reference) {
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->secret_key
        ];
        $url = "https://api.paystack.co/transaction/verify/$reference";

        $curlobj = curl_init($url);
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);
        $apiResponse = curl_exec($curlobj);

        if ($apiResponse) {
            curl_close($curlobj);
            return json_decode($apiResponse);
        } else {
            curl_close($curlobj);
            return false;
        }
    }

    public function paystack_initialize($email, $amt, $ref) {
        $postRequest = [
            'email' => $email,
            'amount' => $amt,
            'reference' => $ref
        ];
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->secret_key
        ];
        $url = "https://api.paystack.co/transaction/initialize";

        $curlobj = curl_init($url);
        curl_setopt($curlobj, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curlobj, CURLOPT_POSTFIELDS, json_encode($postRequest));
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);

        $apiResponse = curl_exec($curlobj);

        if ($apiResponse) {
            curl_close($curlobj);
            return json_decode($apiResponse);
        } else {
            curl_close($curlobj);
            return false;
        }
    }
}
?>
