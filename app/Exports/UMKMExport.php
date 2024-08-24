<?php

namespace App\Exports;

use App\Models\Umkm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UMKMExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
     
        return Umkm::with(['user:id,name,email', 'provinsi:id,nama_provinsi']) 
            ->get([
                'id',
                'user_id',
                'nik',
                'nama',
                'is_garut',
                'domisili',
                'referensi',
                'provinsi_id',   
                'kota_id',
                'kecamatan_id',
                'kelurahan_id',
                'nama_usaha',
                'alamat_usaha',
                'disabilitas',
                'nohp',
            ]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID', 
            'NIK', 
            'Nama', 
               'User Email',
            'Is Garut', 
            'Domisili', 
            'Referensi', 
            'Provinsi Name', 
            'Kota', 
            'Kecamatan', 
            'Kelurahan', 
            'Nama Usaha', 
            'Alamat Usaha', 
            'Disabilitas', 
            'No HP', 
           
         
        ];
    }

    /**
     * @var UMKM $umkm
     * @return array
     */
    public function map($umkm): array
    {
        $referensi = [
            0 => 'Dinas Koperasi dan UKM Kab. Garut',
            1 => 'Website',
            2 => 'Social Media',
            3 => 'Lainnya',
            ];
        return [
            $umkm->id,
            $umkm->nik,
            $umkm->nama,
            $umkm->user->email,
            $umkm->is_garut,
            $umkm->domisili,
            $referensi[$umkm->referensi],
            $umkm->provinsi->nama_provinsi,
            $umkm->kota->nama_kota,
            $umkm->kecamatan->nama_kecamatan,
            $umkm->kelurahan->nama_kelurahan,
            $umkm->nama_usaha,
            $umkm->alamat_usaha,
            $umkm->disabilitas ? 'Ya' : 'Tidak',
            $umkm->nohp,
        
            
        ];
    }
    public function styles(Worksheet $sheet)
    {
        // Auto-size all columns
        foreach (range('A', $sheet->getHighestColumn()) as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}
