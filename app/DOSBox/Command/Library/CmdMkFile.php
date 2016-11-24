<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\File;
use DOSBox\Command\BaseCommand as Command;

class CmdMkFile extends Command {
    private $directoryToPrint;
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
        $fileName = $this->params[0];
        if (count($this->params)==1) {
            $fileContent="";
        } else {
            $fileContent = $this->params[1];

        }
        $this->directoryToPrint = $this->getDrive()->getCurrentDirectory()->getContent();
        $duplicate = false; 
        foreach ($this->directoryToPrint as $item) {
            $isi = $item->getName();
            if ($isi==$fileName) {
                $duplicate = true;              
            } 
        }

        if ($duplicate==false){
            $newFile = new File($fileName, $fileContent);
            $this->getDrive()->getCurrentDirectory()->add($newFile);
        } else {
            $outputter->printNoLine("duplicate file/folder exist, no file created!");
            $outputter->newLine();
        }
    }

}
