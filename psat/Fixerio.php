<?php namespace Psat;

class Fixerio {
    protected $apiClient;

    public function __construct()
    {
        $this->apiClient = new \GuzzleHttp\Client();
    }

    public function getCurrencies()
    {
        //[krok 0] sprawdzić czy mamy dane w cache, jeżeli tak zwrócić dane z
        //cache
        // date('Y-m-d') . 'currencies'

        //czy usuwać cache

        //pobieranie z fixer io
        //http://api.fixer.io/latest
        $result = $this->apiClient->request(
            'GET', 'http://api.fixer.io/latest');
        $response = json_decode($result->getBody());

        //[krok 1] - wyciągnać potrzebne informacje z odpowiedzi API
        $currencies = $this->formatResponse($response);

        //[krok 0] - dodać informacje z krok 1 do caches z indeksem:
        // $date - data zwrócona z fixer.io
        // $date . 'currencies'
    }

    private function formatResponse($response)
    {
        //piszę logikę formatatowania danych
    }
}
