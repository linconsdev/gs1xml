<?php 

namespace LinconsDev\GS1XML;

use LinconsDev\GS1XML\Converter;
use LinconsDev\GS1XML\Documents\Invoice;

use Storage;

class GS1XML {
    //This is gs1 xml object that can be initiated as order, order response, invoice, despatch advice
    
    public static $type = null;
    public static $document = null;

    //XML related data
    private $xml_data = null;
    private $xml_string = null;

    private $documents_types = [
        'invoice',
        'despatchAdvice',
        'order',
        'orderResponse',
    ];

    public static function document(array $type = null): GS1XML {
        if ($type != null) {
            self::$type = $type;
        }

        return new self;
    }

    public function xml($xml = null): GS1XML {
        if (gettype($xml) == "string") {
            $this->xml_string = $xml;
            $this->xml_data = Converter::XMLtoPHP($this->xml_string);

            if (count($this->xml_data) != 1) throw new \Exception('GS1 XML can not have more than one root element!');
            
            if (array_key_exists('invoiceMessage', $this->xml_data)) {
                self::$type = 'invoice';
                self::$document = new Invoice($this->xml_data);
            }
        } else {

        }
        return $this;
    }

    public function getKeyValue(string $property, string $path, $default_value = null) {
        if ($this->__checkDocumentPropertyIsValid($property)) {
            $key = $this->getKeyContent($property, $path, $default_value);
            if (isset($key['content'])) {
                return $key['content'];
            } else {
                return $default_value;
            }
        }      
    }

    public function getKeyAttributes(string $property, string $path, $default_value = []) {
        if ($this->__checkDocumentPropertyIsValid($property)) {
            return $this->getKeyContent($property, $path, $default_value)['attributes'];
        }
    }

    public function getKeyAttributeValue(string $property, string $path, string $attribute, $default_value = null) {
        if ($this->__checkDocumentPropertyIsValid($property)) {
            foreach($this->getKeyContent($property, $path, $default_value)['attributes'] as $attribute_key => $value) {
                if ($attribute_key == $attribute) return $value;
            }
            return $default_value;
        }
    }

    private function getKeyContent(string $property, string $path, $default_value = null) {
        if (self::$document != null) {
            return $this->document->getContent(
                $this->document->{$property},
                explode('.', $path)
            );
        } else {
            return [
                'attributes' => [],
                'content' => $default_value
            ];
        }
    }

    private function __checkDocumentPropertyIsValid($property) {
        if (in_array($property, $this->documents_types)) {
            if ($property == $this->type) return true;
            else throw new \Exception('Property "'.$property.'" is not part of this document. This document is of type "'.$this->type.'"');
        } else if ($property == 'standardBuisnessDocumentHeader') {
            return true;
        } else throw new \Exception('Property "'.$property.'" is not part of this document.');
    }

    public function __get($property) {
        switch ($property) {
            case 'document':        return self::$document;
            case 'type':            return self::$type;
            case 'xml_parsed_data': return $this->xml_data;
            case 'xml_string':      return $this->xml_string;
            case 'positions_count': return self::$document->positionsCount();
        }
    }    
}