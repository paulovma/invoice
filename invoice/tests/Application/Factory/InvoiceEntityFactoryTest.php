<?php


namespace App\Tests\Application\Factory;


use App\Application\FetchInvoice\Factory\InvoiceEntityFactory;
use App\Domain\Invoice\Entity\Invoice;
use PHPUnit\Framework\TestCase;

class InvoiceEntityFactoryTest extends TestCase
{

    public function test_make_expectingArrayOfInvoice()
    {
        $factory = new InvoiceEntityFactory();
        $mockedArquiveiResponse = file_get_contents(dirname(__DIR__) . '../../Resource/mock_arquivei_nfe_response.json');
        $response = $factory->make(json_decode($mockedArquiveiResponse));

        $this->assertEquals(2, count($response));
        foreach ($response as $item) {
            $this->assertTrue($item instanceof Invoice);
        }
    }

    public function test_make_assertingInvoiceValuesAreCorrect()
    {
        $factory = new InvoiceEntityFactory();
        $mockedArquiveiResponse = file_get_contents(dirname(__DIR__) . '../../Resource/mock_arquivei_nfe_response.json');
        $arrEncodedXml = json_decode($mockedArquiveiResponse);

        $invoice = $this->createInvoice($arrEncodedXml);
        $response = $factory->make($arrEncodedXml);

        $this->assertEquals($invoice->getTotal(), $response[0]->getTotal());
        $this->assertEquals($invoice->getAccessKey(), $response[0]->getAccessKey());

    }

    private function createInvoice(array $arrEncodedXml): Invoice
    {
        $data = $arrEncodedXml[0];
        $accessKey = $data->access_key;
        $rawXML = $data->xml;
        $xml = new \SimpleXMLElement(base64_decode($rawXML));
        return new Invoice($accessKey, doubleval((string) $xml->NFe->infNFe->total->ICMSTot->vNF));


    }

}