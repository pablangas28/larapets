<?php

namespace App\Exports;

use App\Models\Adoption;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AdoptionsExport implements FromView, WithColumnWidths, WithStyles
{
    public function view(): View
    {
        return view('adoptions.excel', [
            'adopts' => Adoption::with(['user', 'pet'])->get()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,   // ID
            'B' => 25,  // Adopter
            'C' => 15,  // Document
            'D' => 30,  // Email
            'E' => 15,  // Phone
            'F' => 20,  // Pet Name
            'G' => 10,  // Kind
            'H' => 20,  // Breed
            'I' => 8,   // Pet Age
            'J' => 10,  // Pet Weight
            'K' => 20,  // Location
            'L' => 12,  // Adopted At
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 16]],
        ];
    }
}