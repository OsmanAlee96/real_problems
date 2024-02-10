

<?php

class LogEntry {
    private $log = null;
    private $time = null;


    public function __construct($msg)
    {
        $this->log = $msg ;
        $this->time = date('Y/m/d::H:i:sa');
        $file = fopen( 'logs.txt' , 'a');
        $line = $this->log . "-> " . $this->time . PHP_EOL;
        fwrite( $file, $line);
        fclose($file);
    }

    // public function __destruct() {
    //     fclose($file);
    // }
}