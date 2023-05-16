<?php

namespace App\Http\Controllers;

use App\Models\PageViewLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageViewLogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the view log stats.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewLogStats()
    {
        $model = new PageViewLog();
        $table = $model->getTable();

        $sql = 'SELECT
                    YEAR(created_at) AS year,
                    MONTH(created_at) AS month,
                    COUNT(*) AS total_count,
                    SUM(IF(ISNULL(user_id), 1, 0)) AS guest_count,
                    SUM(IF(NOT ISNULL(user_id), 1, 0)) AS authorized_count
                FROM
                    ' . $table . '
                GROUP BY
                    year, month
                ORDER BY
                    year ASC,
                    month ASC';

        $monthlyLogViewCount = DB::select($sql);


        $sql = 'SELECT
                    YEAR(created_at) AS year,
                    MONTH(created_at) AS month,
                    DAY(created_at) AS day,
                    COUNT(*) AS total_count,
                    SUM(IF(ISNULL(user_id), 1, 0)) AS guest_count,
                    SUM(IF(NOT ISNULL(user_id), 1, 0)) AS authorized_count
                FROM
                    ' . $table . '
                GROUP BY
                    year, month, day
                ORDER BY
                    year ASC,
                    month ASC,
                    day ASC';

        $dailyLogViewCount = DB::select($sql);


        return view('view_log_stats', compact('monthlyLogViewCount', 'dailyLogViewCount'));
    }
}
