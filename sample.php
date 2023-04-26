<?php

declare(strict_types=1);

$customers = [
    ['name' => '顧客名1', 'code' => '0001'],
    ['name' => '顧客名2', 'code' => '0002']
];

if (count($customers) > 0) {
    $fp = new \SplFileObject('./test.csv', 'w');
    $fp->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY | \SplFileObject::READ_AHEAD);
    $fp->setCsvControl(','); //区切り文字を指定

    $columns = array_keys($customers[0]);
    $fp->fputcsv($columns);

    foreach ($customers as $line) {
        $record = [];
        foreach ($line as $key => $value) {
            $record[$key] = $value;
        }
        $fp->fputcsv($record);
    }
}
