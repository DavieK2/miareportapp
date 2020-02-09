<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Upload;

class LatestUploads extends AbstractWidget
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
        $uploads = Upload::paginate(6);

        return view('widgets.latest_uploads', [
            'config' => $this->config,
            'uploads' => $uploads
        ]);
    }
}

