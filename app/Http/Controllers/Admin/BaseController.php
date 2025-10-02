<?php

namespace Pterodactyl\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\View\Factory as ViewFactory;
use Pterodactyl\Http\Controllers\Controller;
use Pterodactyl\Services\Helpers\SoftwareVersionService;

class BaseController extends Controller
{
    /**
     * BaseController constructor.
     */
    public function __construct(
        private SoftwareVersionService $version,
        private ViewFactory $view
    ) {
    }

    /**
     * Return the admin index view.
     */
    public function index(): View
    {
        // Count stats
        $totalUsers = DB::table('users')->count();
        $totalServers = DB::table('servers')->count();
        $totalAllocations = DB::table('allocations')->count();

        $totalRamMb = (int) DB::table('servers')->sum('memory');
        $totalDiskMb = (int) DB::table('servers')->sum('disk');

        return $this->view->make('admin.index', [
            'version' => $this->version,
            'totalUsers' => $totalUsers,
            'totalServers' => $totalServers,
            'totalAllocations' => $totalAllocations,
            'totalRamDisplay' => $this->formatMb($totalRamMb),
            'totalDiskDisplay' => $this->formatMb($totalDiskMb),
        ]);
    }

    /**
     * MB -> GB/TB for displaying
     */
    private function formatMb(int $mb): string
    {
        if ($mb >= 1024 * 1024) {
            return round($mb / (1024 * 1024), 2) . ' TB';
        }
        if ($mb >= 1024) {
            return round($mb / 1024, 2) . ' GB';
        }
        return $mb . ' MB';
    }
}