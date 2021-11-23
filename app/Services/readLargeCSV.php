<?php

namespace App\Services;

class readLargeCSV {

    public function __construct($filename, $delimiter = "\t") {
        $this->file = fopen($filename, 'r');
        $this->delimiter = $delimiter;
        $this->iterator = 0;
        $this->header = null;
    }

    public function csvToArray() {
        $data = array();
        while (($row = fgetcsv($this->file, 1000, $this->delimiter)) !== false) {
            $is_mul_1000 = false;
            if (!$this->header) {
                $this->header = $row;
            } else {
                $this->iterator++;
                $data[] = $row;
                if ($this->iterator != 0 && $this->iterator % 10 == 0) {
                    $is_mul_1000 = true;
                    $chunk = array_map(function ($a) {
                        foreach ($a as $val) {
                            return utf8_encode($val);
                        }
                    }, $data);
                    $data = array();
                    yield $chunk;
                }
            }
        }
        fclose($this->file);
        if (!$is_mul_1000) {
            yield array_map('current', $data);
        }
        return;
    }

}
