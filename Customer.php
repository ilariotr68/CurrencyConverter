<?php

class Customer
{
    public function getTransactions()
    {
		$file_to_read = fopen('../data.csv', 'r');
		if ($file_to_read !== FALSE) {
			while (!feof($file_to_read)) {
    			$data[] = fgetcsv($file_to_read, 0, ';');
    		}
    		fclose($file_to_read);
    		return $data;
		}
    }
}
