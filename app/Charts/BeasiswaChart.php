<?php

namespace App\Charts;

use App\Models\mahasiswa;
use App\Models\Pendaftaran;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BeasiswaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $beasiswa = Pendaftaran::get();
        $data = [
            $beasiswa->where('jenisBeasiswa', 'Beasiswa Akademik')->count(),
            $beasiswa->where('jenisBeasiswa', 'Beasiswa Non-Akademik')->count(),
            $beasiswa->where('jenisBeasiswa', 'Beasiswa Bidikmisi')->count(),
        ];
        $label = [
            'Beasiswa Akademik',
            'Beasiswa Non-Akademik',
            'Beasiswa Bidikmisi',
        ];
        return $this->chart->pieChart()
            ->setTitle('Data Beasiswa Yang Didaftar')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setLabels($label);
    }
}
