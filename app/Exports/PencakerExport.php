<?php

namespace App\Exports;

use App\Models\Pencaker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PencakerExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $awal, $akhir, $bkk, $jk;

    public function __construct($awal, $akhir, $bkk, $jk)
    {
        $this->awal = $awal;
        $this->akhir = $akhir;
        $this->bkk = $bkk;
        $this->jk = $jk;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if ($this->jk == 'all') {
            return Pencaker::join('bkks', 'bkks.bkk_id', '=', 'pencakers.bkk_id')
            ->whereBetween('pencakers.created_at', [$this->awal, $this->akhir])
            ->where('pencakers.bkk_id', $this->bkk)
            ->get([
                'nama',
                'nik',
                'tinggi_badan',
                'daerah',
                'bkk_nama',
                'tempat_lahir',
                'tanggal_lahir',
                'jk',
                'agama',
                'status_nikah',
                'pekerjaan'
            ]);
        }
        return Pencaker::join('bkks', 'bkks.bkk_id', '=', 'pencakers.bkk_id')
            ->whereBetween('pencakers.created_at', [$this->awal, $this->akhir])
            ->where('pencakers.bkk_id', $this->bkk)
            ->where('jk', $this->jk)
            ->get([
                'nama',
                'nik',
                'tinggi_badan',
                'daerah',
                'bkk_nama',
                'tempat_lahir',
                'tanggal_lahir',
                'jk',
                'agama',
                'status_nikah',
                'pekerjaan'
            ]);
        // return Pencaker::all();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIK',
            'Tinggi',
            'Kab/Kota',
            'Nama BKK',
            'Tempat Lahir',
            'Tgl Lahir',
            'Jenis Kelamin',
            'Agama',
            'Status Menikah',
            'Pekerjaan'
        ];
    }
}
