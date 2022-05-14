<?php

namespace LinconsDev\GS1XML\Documents;

use Support\Arr;

class Document {
    protected   $skipInvalidKeys = false;
    public      $standardBuisnessDocumentHeader = null;
    
    public function __construct() {
        $this->standardBuisnessDocumentHeader = include('Components/StandardBuisnessDocumentHeader.php');
    }

    public function setStandardBuisnessDocumentHeader(array $data, bool $from_parsed_xml = false) {
        if ($from_parsed_xml) {
            $read_data = array();
            foreach ($data as $key => $content) {
                $this->readParsedXmlDataRecrusive(
                    $read_data,
                    $key,
                    $content
                );
            }
            foreach ($read_data as $key => $content) {
                $key = str_replace('sh:','', $key);
                $this->setContent(
                    $this->standardBuisnessDocumentHeader,
                    explode('.', $key),
                    $content
                );
            }

            return $this;
        }
    }

    public function skipInvalidKeys(bool $bool = true) { 
        $this->skipInvalidKeys = $bool; 
    }

    protected function setContent(array &$object, array $keys, array $content) {
        if (count($keys) == 1) {
            if (isset($object[$keys[0]])) {
                if ($object[$keys[0]]['type'] == 'value') {
                    $object[$keys[0]]['content']    = $content['content'];
                    $object[$keys[0]]['attributes'] = $content['attributes'];
                } else {
                    $object[$keys[0]]['attributes'] = $content['attributes'];;
                }
            } else {
                if (!$this->skipInvalidKeys)
                    throw new \Exception('Key "' . $keys[0] . '" is not present in XML schema. Key does not exists.');
            }
        } else if (count($keys) > 1) {
            if (isset($object[$keys[0]])) {
                $shifted_key = array_shift($keys);
                if ($object[$shifted_key]['type'] == 'array') {
                    if (count($keys) != 0) {
                        $shifted_index = array_shift($keys);
                        
                        if (count($keys) == 0) {
                            $object[$shifted_key]['attributes'] = array_merge(
                                $object[$shifted_key]['attributes'], 
                                [$shifted_index => $content['attributes']]
                            );
                        } else if (isset($object[$shifted_key]['content'][$shifted_index])) {
                            $this->setContent(
                                $object[$shifted_key]['content'][$shifted_index],
                                $keys,
                                $content
                            );
                        } else {
                            $object[$shifted_key]['content'][$shifted_index] = $object[$shifted_key]['template'];
                            $this->setContent(
                                $object[$shifted_key]['content'][$shifted_index],
                                $keys,
                                $content
                            );
                        }
                    } else {
                        throw new \Exception('Key "' . $shifted_key . '" is an empty array. XML does not accept empty arrays.');
                    }
                } else if ($object[$shifted_key]['type'] == 'object') {
                    $this->setContent(
                        $object[$shifted_key]['content'],
                        $keys,
                        $content
                    ); 
                }             
            } else {
                if (!$this->skipInvalidKeys)
                    throw new \Exception('Key "' . $keys[0] . '" is not present in XML schema. Key does not exists.');
            }
        } else {
            throw new \Exception('Key in XML schema object not provided.');
        }
    }
    
    public function getContent(array &$object, array $keys) {
        $shifted_key = array_shift($keys);
        if (isset($object[$shifted_key])) {
            if (count($keys) == 0) {
                if ($object[$shifted_key]['type'] == 'value')
                    return [
                        'attributes' => $object[$shifted_key]['attributes'],
                        'content' => $object[$shifted_key]['content']
                    ];
                else if ($object[$shifted_key]['type'] == 'object')
                    return [
                        'attributes' => $object[$shifted_key]['attributes'],
                    ];
                else 
                    throw new \Exception('Key "' . $shifted_key . '" is not a value. Canot extract content and attributes.');
            } else {
                if ($object[$shifted_key]['type'] == 'object') {
                    if (count($keys) == 0) {
                        return [
                            'attributes' => $object[$shifted_key]['attributes'],
                        ];
                    } else {
                        return $this->getContent(
                            $object[$shifted_key]['content'],
                            $keys
                        );
                    }
                } else if ($object[$shifted_key]['type'] == 'array') {
                    $shifted_index = array_shift($keys);
                    if (isset($object[$shifted_key]['content'][$shifted_index])) {
                        if (count($keys) == 0) {
                            return [
                                'attributes' => $object[$shifted_key]['attributes'][$shifted_index],
                            ];
                        } else {
                            return $this->getContent(
                                $object[$shifted_key]['content'][$shifted_index],
                                $keys
                            );
                        }
                    } else {
                        throw new \Exception('Invalid offset ' . $shifted_index . ' for key "' . $shifted_key .'"');
                    }
                } 
            }
        } else {
            throw new \Exception('Key "' . $shifted_key . '" is not present in XML schema. Key does not exists.');
        }
    }

    protected function readParsedXmlDataRecrusive(&$array, $key, $content) {
        if (is_array($content)) {
            //if array is an xml value
            if (array_key_exists('$', $content)) {
                $key_value = $content['$'];
                $attributes = [];
                foreach ($content as $content_key => $content_val) {
                    if (str_starts_with($content_key, '@')) {
                        $attributes = array_merge($attributes, [str_replace('@', '', $content_key) => $content_val]);
                    }
                }
                $array = array_merge($array, [$key => [ 'content' => $key_value, 'attributes' => $attributes,  'type' => 'value']]);
            }
            //if array is an xml object
            else {            
                $attributes = [];
                $type = 'value';      
                foreach ($content as $content_key => $content_val) {
                    if (str_starts_with($content_key, '@')) {
                        $attributes = array_merge($attributes, [str_replace('@', '', $content_key) => $content_val]);
                    } else {
                        $type = 'object';
                        $this->readParsedXmlDataRecrusive($array, $key . '.' . $content_key, $content_val);
                    }
                }
                $array = array_merge($array, [$key => [ 'content' => null, 'attributes' => $attributes,  'type' => $type]]);
            }
        } else {
            $array = array_merge($array, [$key => [ 'content' => $content, 'attributes' => [], 'type' => 'value']]);
        }
    }
}