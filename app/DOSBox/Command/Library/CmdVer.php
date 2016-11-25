<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\File;
use DOSBox\Command\BaseCommand as Command;

class CmdVer extends Command {
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
        if (count($this->params)==0) {
            $outputter->printLine("MIcrosoft Windows XP [version 5.1.2600]");
        } else {
            $key = $this->params[0];
            if ($key=="/w") {
                $outputter->printLine("MIcrosoft Windows XP [version 5.1.2600]");
                $outputter->printLine("irsan \tirsan.r@gmail.com");
                $outputter->printLine("rico \tricomarten@gmail.com");
                $outputter->printLine("vira \tvirantina@gmail.com");
                $outputter->printLine("tenie \ttenieluv@gmail.com");
            } else {
                $outputter->printLine("ERROR");
            }
            
        }
        
        //$fileContent = $this->params[1];
        //$newFile = new File($fileName, $fileContent);
        //$this->getDrive()->getCurrentDirectory()->add($newFile);
    }

}