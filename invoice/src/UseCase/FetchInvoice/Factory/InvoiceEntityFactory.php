<?php


namespace App\UseCase\FetchInvoice\Factory;

use App\Domain\Invoice\Entity\Invoice;
use App\Domain\Invoice\Factory\InvoiceFactory;
use SimpleXMLElement;

class InvoiceEntityFactory implements InvoiceFactory
{

    /**
     * @param array $data
     * the following structure is expected: 'access_key' and 'xml'
     *
     * @return Invoice[]
     */
    public function make(array $data): array
    {
        return array_map(function(\stdClass $data) {
            $accessKey = $data->access_key;
            $rawXML = $data->xml;
            $xml = new SimpleXMLElement(base64_decode($rawXML));
            if ($xml->NFe) {
                $total = (string) $xml->NFe->infNFe->total->ICMSTot->vNF;
            } else {
                $total = (string) $xml->infNFe->total->ICMSTot->vNF;
            }
            return new Invoice($accessKey, doubleval($total));
        }, $data);

    }

}