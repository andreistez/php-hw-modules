<?php

namespace System\Contracts;

interface IController{
	public function setEnvironment(array $urlParams) : void;
	public function render() : string;
}