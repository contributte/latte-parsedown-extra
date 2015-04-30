<?php

namespace Minetro\Parsedown;

use Nette\Object;
use ParsedownExtra;

/**
 * ParsedownExtra Adapter
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @method onProcess(string $text, ParsedownExtraAdapter $adapter);
 */
class ParsedownExtraAdapter extends Object
{

    /** @var ParsedownExtra */
    private $parsedown;

    /** @var array */
    public $onProcess = [];

    public function __construct()
    {
        $this->parsedown = new ParsedownExtra();
    }

    /**
     * @param mixed $text
     * @param string
     */
    public function process($text)
    {
        $this->onProcess($text, $this);
        return $this->parsedown->parse($text);
    }

    /**
     * @param mixed $line
     * @param string
     */
    public function processLine($line)
    {
        $this->onProcess($line, $this);
        return $this->parsedown->line($line);
    }
}