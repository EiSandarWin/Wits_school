<?php

namespace App\Exports;

use App\T_checklist_header;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use \Maatwebsite\Excel\Sheet;
class StudentlistExport implements FromView,ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $report;

    public function __construct(array $report,$search,$searchselect)
    {
        $this->report = $report;
        $this->search = $search;
        $this->searchselect = $searchselect;
    }

    public function array(): array
    {
        return $this->report;
    }



    public function view(): View
    {
        return view('report.export', [
            'data' => $this->report,
            'search' => $this->search,
            'searchselect' => $this->searchselect,
        ]);
    }

    public function registerEvents(): array
    {
        Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
            $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
        });
        return [
           AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:I1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
                $event->sheet->styleCells(
                    'A2:I2',
                    [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                    ],
                ]
                );
                $totalrow=$this->totalRow + 3;
                // dd($this->totalRow);
                $rowRange = 'A1:I'.$totalrow;
                $event->sheet->styleCells(
                    $rowRange,
                    [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'       => ['argb' => '00000000'],
                        ],
                    ]
                ]
                );
            },
        ];
    }
}
