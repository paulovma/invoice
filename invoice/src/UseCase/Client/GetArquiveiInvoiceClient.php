<?php


namespace App\UseCase\Client;


use App\UseCase\Exception\CouldNotFetchInvoices;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class GetArquiveiInvoiceClient
{

    private const SUCCESS = 200;

    private $arquiveiUrl;

    private const INVOICE_ENDPOINT = 'v1/nfe/received';
    /**
     * @var Client
     */
    private $client;
    /**
     * @var string
     */
    private $arquiveiXApiKey;
    /**
     * @var string
     */
    private $arquiveiXApiId;

    /**
     * GetArquiveiInvoiceClient constructor.
     * @param string $arquiveiUrl
     * @param string $arquiveiXApiKey
     * @param string $arquiveiXApiId
     */
    public function __construct(string $arquiveiUrl, string $arquiveiXApiKey, string $arquiveiXApiId)
    {
        $this->client = new Client();
        $this->arquiveiUrl = $arquiveiUrl;
        $this->arquiveiXApiKey = $arquiveiXApiKey;
        $this->arquiveiXApiId = $arquiveiXApiId;
    }

    /**
     * @return \stdClass
     * @throws CouldNotFetchInvoices
     */
    public function get(): \stdClass
    {
        /** @var ResponseInterface $response */
        $response = $this->client->request("GET", $this->arquiveiUrl . self::INVOICE_ENDPOINT, [
            'headers' => [
                'Content-Type' => 'application/json',
                'x-api-id' => $this->arquiveiXApiId,
                'x-api-key' => $this->arquiveiXApiKey
            ]
        ]);


        if ($response->getStatusCode() !== self::SUCCESS) {
            throw new CouldNotFetchInvoices();
        }

        return json_decode($response->getBody()->getContents());
    }

}