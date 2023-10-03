<?php

namespace App\Exports;

use App\Models\Evaluacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\WithEvents;

class EvaluacionExport implements FromCollection, WithMapping, ShouldAutoSize, WithTitle, WithEvents, WithCustomStartCell
{
    private $evaluaciones;
    private $item;

    public function __construct()
    {
        $this->evaluaciones = Evaluacion::select('evaluaciones.calificacion','preguntas.descripcion','evaluaciones.updated_at','users.name')
        ->join('preguntas', 'preguntas.id', '=', 'evaluaciones.pregunta_id')
            ->join('users', 'users.id', '=', 'evaluaciones.user_id')
            ->where('preguntas.activo', '=', '1')->get();
    }

    public function collection()
    {
        $evaluacion = $this->evaluaciones;
        return $evaluacion;
    }

    public function map($evaluacion): array
    {
        return [
            ++$this->item,
            $evaluacion->calificacion,
            $evaluacion->descripcion,
            $evaluacion->updated_at,
            $evaluacion->name
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function (BeforeExport $event) {
                $event->writer->getProperties()->setCreator('Oficina General de Admision');
            },
            AfterSheet::class => function (AfterSheet $event) {

                $negrita = [
                    'font' => [
                        'bold' => true,
                    ],
                ];
                $header = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ];
                $centrar = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
                ];
                $italic = [
                    'font' => [
                        'italic' => true,
                    ]
                ];
                $tamanio = [
                    'font' => [
                        'size' => 16,
                    ]
                ];
                $subtitulo = [
                    'font' => [
                        'size' => 14,
                    ]
                ];
                $border = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];

                $event->sheet->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

                $event->sheet->getDelegate()->getPageSetup()->setPrintArea('A1:E26');

                $event->sheet->getDelegate()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(0, 2);

                $event->sheet->setCellValue('A1', '2023-II');

                $event->sheet->getDelegate()->getStyle('A1:E1')->applyFromArray($tamanio);
                $event->sheet->getDelegate()->getStyle('A1:E1')->applyFromArray($negrita);
                $event->sheet->getDelegate()->mergeCells('A1:E1');
                $event->sheet->getDelegate()->getStyle('A1:E1')->applyFromArray($centrar);
                $columnas = ['N°', 'CALIFICACION', 'PREGUNTA', 'FECHA Y HORA', 'USUARIO'];
                $event->sheet->getDelegate()->fromArray($columnas, NULL, 'A2');

                $event->sheet->getDelegate()->getStyle('A2:E2')->applyFromArray($header);
                $event->sheet->getDelegate()->getStyle('A2:E2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('99a3a4');
                for ($i = 0; $i <= $this->item; $i++) {
                    $event->sheet->getDelegate()->getStyle('A' . ($i + 2))->applyFromArray($negrita);
                    $event->sheet->getDelegate()->getStyle('A' . ($i + 2) . ':E' . ($i + 2))->applyFromArray($border);
                    $event->sheet->getDelegate()->getStyle('A' . ($i + 2))->applyFromArray($centrar);
                    $event->sheet->getDelegate()->getStyle('B' . ($i + 2))->applyFromArray($centrar);
                    $event->sheet->getDelegate()->getStyle('C' . ($i + 2))->applyFromArray($centrar);
                    $event->sheet->getDelegate()->getStyle('E' . ($i + 2))->applyFromArray($centrar);
                }
                $event->sheet->setCellValue('A' . ($this->item + 3), 'Fuente: Oficina General de Admisión');
                $event->sheet->getDelegate()->mergeCells('A' . ($this->item + 3) . ':E' . ($this->item + 3));
                $event->sheet->getDelegate()->getStyle('A' . ($this->item + 3) . ':E' . ($this->item + 3))->applyFromArray($italic);
            },
        ];
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function title(): string
    {
        $nomHoja = substr(preg_replace('([^A-Za-z0-9])', '', 'Reporte'), 0, 31);
        return $nomHoja;
    }
}
