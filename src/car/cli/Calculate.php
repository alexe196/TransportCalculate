<?php

namespace car\cli;

use car\cli\Logic;

class Calculate
{
    /** @var array */
    private $params;
    private Logic $logic;

    public function __construct(array $params)
    {
        $this->logic = new Logic();
        if(empty($params)) {
            return $this->logic->getInformation();
        }
        $this->params = $params;
        $this->checkParams();
    }

    public function execute()
    {
        $this->logic->setParametr($this->getParam('num'), $this->getParam('countPassenger'), $this->getParam('maximumDistance'));
        $this->logic->calculate();

    }

    private function checkParams()
    {
        $this->ensureParamExists('num');
        $this->ensureParamExists('countPassenger');
        $this->ensureParamExists('maximumDistance');
    }

    private function getParam(string $paramName) : mixed
    {
        return $this->params[$paramName] ?? null;
    }

    private function ensureParamExists(string $paramName)
    {
        if (!isset($this->params[$paramName])) {
            throw new CliException('Param with name "' . $paramName . '" is not set!');
        }
    }
}