<?php

namespace Igorw\Fab;

use Fab\Fab;
use Fab\SuperFab;
use Symfony\Component\Console\Formatter\OutputFormatterStyleInterface;

class FabOutputFormatterStyle implements OutputFormatterStyleInterface
{
    public function __construct(Fab $fab = null)
    {
        $this->fab = $fab ?: new SuperFab();
    }

    public function setForeground($color = null)
    {
    }

    public function setBackground($color = null)
    {
    }

    public function setOption($option)
    {
    }

    public function unsetOption($option)
    {
    }

    public function setOptions(array $options)
    {
    }

    public function apply($text)
    {
        return $this->fab->paint($text);
    }
}
