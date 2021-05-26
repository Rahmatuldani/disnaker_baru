<?php

namespace App\Exports;

use App\Models\IPK1;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IPK1Export implements FromCollection, WithHeadings, ShouldAutoSize
{

    protected $month, $bkk;

    public function __construct($month, $bkk)
    {
        $this->month = $month;
        $this->bkk = $bkk;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IPK1::join('ipk1_names', 'ipk1_names.ipk1_name_id', '=', 'ipk1s.ipk1_name_id')
                    ->where('bkk_id', $this->bkk)
                    ->where('ipk1_month', $this->month)
                    ->get([
                        'ipk1_name',
                        '15-19l',
                        '15-19p',
                        '20-29l',
                        '20-29p',
                        '30-44l',
                        '30-44p',
                        '45-54l',
                        '45-54p',
                        '55l',
                        '55p',
                        'jmll',
                        'jmlp',
                        'jml',
                    ]);
    }

    public function Headings() : array
    {
        return [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
            '13',
            '14',
        ];
    }
}
