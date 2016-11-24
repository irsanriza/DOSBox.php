<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;

use DOSBox\Command\BaseCommand as Command;

class CmdTime extends Command {
    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return true;
    }

    public function checkParameterValues(IOutputter $outputter) {
        return true;
    }

    public function execute(IOutputter $outputter){
        if($this->getParameterCount()==0){
            //$outputter->printNoLine($this->getParameterCount()); 
            $outputter->printNoLine(date("H:i:s"));  
        }
        else if($this->getParameterCount()==1){
            $format=$this->params[0];
            if(preg_match("/(2[0-4]|[01][1-9]|10):([0-5][0-9]):([0-5][0-9])/", $format)) $outputter->printNoLine(""); 
            else {
                $outputter->printNoLine("Format anda salah");
            }
        }
    }

}