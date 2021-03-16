<?php

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><catalogo></catalogo>');

$element = $xml->addChild("llibre", "El principito");

$xml->saveXML("./catalogo.xml");

$element->addAttribute('type', 'stars');