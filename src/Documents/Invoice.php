<?php

namespace LinconsDev\GS1XML\Documents;

use LinconsDev\GS1XML\Documents\Document;

class Invoice extends Document {

    public $invoice = null;

    public function __construct(array $parsed_xml = null) {
        parent::__construct();

        $this->invoice = include('Components/Invoice.php');

        if ($parsed_xml) {
            $this->skipInvalidKeys();
            $this->setStandardBuisnessDocumentHeader($parsed_xml['invoiceMessage']['sh:StandardBusinessDocumentHeader'], true);
            $this->setInvoice($parsed_xml['invoiceMessage']['invoice'], true);
        }
    }


    public function setInvoice(array $data, bool $from_parsed_xml = false) {
        if ($from_parsed_xml) {
            $read_data = array();
            foreach ($data as $key => $content) {
                $this->readParsedXmlDataRecrusive(
                    $read_data,
                    $key,
                    $content
                );
            }
            foreach($read_data as $key => $content) {
                $this->setContent(
                    $this->invoice,
                    explode('.', $key),
                    $content
                );
            }
        }
    }

    public function positionsCount() {
        return count($this->invoice['invoiceLineItem']['content']);
    }
}