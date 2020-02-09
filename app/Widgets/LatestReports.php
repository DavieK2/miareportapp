<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Report;

class LatestReports extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $reports = Report::paginate(6);

        return view('widgets.latest_reports', [
            'config' => $this->config,
            'reports' => $reports
        ]);
    }
}

