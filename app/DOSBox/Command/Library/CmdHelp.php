<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\File;
use DOSBox\Command\BaseCommand as Command;

class CmdHelp extends Command {
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
            $outputter->printLine("CD \tDisplays the name of or changes the current directory");
            $outputter->printLine("DIR \tDisplays list of files and subdirectories in a directory");
            $outputter->printLine("EXIT \tQuit the CMD.exe program (comment interpreter)");
            $outputter->printLine("FORMAT \tFormat a disk for use with Windows");
            $outputter->printLine("HELP \tProvides help information for Windows commands");
            $outputter->printLine("LABEL \tCreate, changes, or deletes the volume label of a disk");
            $outputter->printLine("MKDIR \tCreate a directory");
            $outputter->printLine("MKFILE \tCreate a file");
            $outputter->printLine("MOVE \tMove one or more files from one directory to another directory");
        } else {
            $key = $this->params[0];
            if ($key=="cd") {
                 $outputter->printLine("CD \tDisplays the name of or changes the current directory");
            } else if ($key=="dir") {
                $outputter->printLine("DIR \tDisplays list of files and subdirectories in a directory");
            } else if ($key=="exit") {
                $outputter->printLine("EXIT \tQuit the CMD.exe program (comment interpreter)");
            } else if ($key=="format") {
                $outputter->printLine("FORMAT \tFormat a disk for use with Windows");
            } else if ($key=="help") {
                $outputter->printLine("HELP \tProvides help information for Windows commands");
            } else if ($key=="label") {
                $outputter->printLine("LABEL \tCreate, changes, or deletes the volume label of a disk");
            } else if ($key=="mkdir") {
                $outputter->printLine("MKDIR \tCreate a directory");
            } else if ($key=="mkfile") {
                $outputter->printLine("MKFILE \tCreate a file");
            } else if ($key=="move") {
                $outputter->printLine("MOVE \tMove one or more files from one directory to another directory");  
            } else {
                $outputter->printLine("ERROR \tThis command is not supported by the help utility");
            }
            
        }
        
        //$fileContent = $this->params[1];
        //$newFile = new File($fileName, $fileContent);
        //$this->getDrive()->getCurrentDirectory()->add($newFile);
    }

}