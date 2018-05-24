<?php
namespace App\Exports;
use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InvoicesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $export_data;
    protected $export_header;
    public function __construct($data,$header)
    {
        $this->export_data=$data;
        $this->export_header=$header;
    }
    public function headings(): array
    {
        return $this->export_header;
    }
    public function collection()
    {
        return $this->export_data;
    }
}