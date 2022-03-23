<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{

    public function ActiveYearZvit(Request $req)
    {
        $ActiveYear = DB::table('zvit_year')
                        ->where('actives', '=', '1')
                        ->first();
        session(['activeyear' => $ActiveYear->id]);
        $SessionYearActiveZvit = $req->session()
                                     ->get('activeyear');

        return $SessionYearActiveZvit;
    }

    /* row 1a */

    function p1($ActiveZvit)
    {
        $p1_{$ActiveZvit} = DB::table('zvit_tablica1')
                              ->where('zvit_year_id', '=', $ActiveZvit)
                              ->sum('kilkist');

        return $p1_{$ActiveZvit};
    }

    function p10($ActiveZvit)
    {
        $p10_{$ActiveZvit} = DB::table('zvit_tablica2')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->sum('doctor');

        return $p10_{$ActiveZvit};
    }

    function result_1a($ActiveZvit)
    {

        if ( ! $this->p1($ActiveZvit) == 0) {
            $result_1a = $this->p1($ActiveZvit) / $this->p10($ActiveZvit);
        }
        else {
            $result_1a = 0;
        }

        return round($result_1a, 3);
    }

    /* row 1b */

    function p9($ActiveZvit)
    {
        $p9_{$ActiveZvit} = DB::table('zvit_tablica2')
                              ->where('zvit_year_id', '=', $ActiveZvit)
                              ->sum('stupeni');

        return $p9_{$ActiveZvit};
    }

    function result_1b($ActiveZvit)
    {

        if ( ! $this->p9($ActiveZvit) == 0) {
            $result_1b = $this->p1($ActiveZvit) / $this->p9($ActiveZvit);
        }
        else {
            $result_1b = 0;
        }

        return round($result_1b, 3);
    }

    /* row 3 */

    function p2($ActiveZvit)
    {

        $p2_{$ActiveZvit} = DB::table('zvit_tablica1')
                              ->where('zvit_year_id', '=', $ActiveZvit)
                              ->sum('proxodj');

        return $p2_{$ActiveZvit};
    }

    function result_3($ActiveZvit)
    {
        if ( ! $this->p2($ActiveZvit) * 100 == 0) {
            $result_3 = $this->p2($ActiveZvit) * 100 / $this->p1($ActiveZvit);
        }
        else {
            $result_3 = 0;
        }

        return round($result_3, 3);
    }

    /* row 4 */

    function p6($ActiveZvit)
    {

        $p6_{$ActiveZvit} = DB::table('zvit_tablica2')
                              ->where('zvit_year_id', '=', $ActiveZvit)
                              ->sum('how_much');

        return $p6_{$ActiveZvit};
    }

    function p7($ActiveZvit)
    {

        $p7_{$ActiveZvit} = DB::table('zvit_tablica2')
                              ->where('zvit_year_id', '=', $ActiveZvit)
                              ->sum('staj');

        return $p7_{$ActiveZvit};
    }

    function result_4($ActiveZvit)
    {
        if ( ! $this->p7($ActiveZvit) * 100 == 0) {
            $result_4 = $this->p7($ActiveZvit) * 100 / $this->p6($ActiveZvit);
        }
        else {
            $result_4 = 0;
        }

        return round($result_4, 3);
    }

    /* row 5 */

    function p3($ActiveZvit)
    {

        $p3_{$ActiveZvit} = DB::table('zvit_tablica1')
                              ->where('zvit_year_id', '=', $ActiveZvit)
                              ->sum('zdobul_winner');

        return $p3_{$ActiveZvit};
    }

    function p31($ActiveZvit)
    {

        $p31_{$ActiveZvit} = DB::table('zvit_tablica1')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->sum('zdobul_winner1');

        return $p31_{$ActiveZvit};
    }

    function p32($ActiveZvit)
    {

        $p32_{$ActiveZvit} = DB::table('zvit_tablica1')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->sum('zdobul_winner2');

        return $p32_{$ActiveZvit};
    }

    function p33($ActiveZvit)
    {

        $p33_{$ActiveZvit} = DB::table('zvit_tablica1')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->sum('zdobul_winner3');

        return $p33_{$ActiveZvit};
    }

    function sum3($ActiveZvit)
    {
        $sum3 = $this->p3($ActiveZvit) + $this->p31($ActiveZvit) + $this->p32($ActiveZvit) + $this->p33($ActiveZvit);

        return $sum3;
    }

    function result_5($ActiveZvit)
    {
        $p3sum = $this->p3($ActiveZvit) + $this->p31($ActiveZvit) + $this->p32($ActiveZvit) + $this->p33($ActiveZvit);
        if ( ! $this->p1($ActiveZvit) == 0) {
            $result_5 = $p3sum * 100 / $this->p1($ActiveZvit);
        }
        else {
            $result_5 = 0;
        }

        return round($result_5, 3);
    }

    /* row 6 */

    function p4($ActiveZvit)
    {

        $p4_{$ActiveZvit} = DB::table('zvit_tablica1')
                              ->where('zvit_year_id', '=', $ActiveZvit)
                              ->sum('inozemec');

        return $p4_{$ActiveZvit};
    }

    function result_6($ActiveZvit)
    {
        $result_6 = $this->p4($ActiveZvit);

        return $result_6;
    }

    /* row 7 */

    function p5($ActiveZvit)
    {

        $p5_{$ActiveZvit} = DB::table('zvit_tablica1')
                              ->where('zvit_year_id', '=', $ActiveZvit)
                              ->sum('grom');

        return $p5_{$ActiveZvit};
    }

    function result_7($ActiveZvit)
    {
        $result_7 = $this->p5($ActiveZvit);

        return $result_7;
    }

    /* row 8 */

    function p11($ActiveZvit)
    {

        $p11_{$ActiveZvit} = DB::table('zvit_tablica3')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->count('pib');

        return $p11_{$ActiveZvit};
    }

    function p12($ActiveZvit)
    {

        $p12_{$ActiveZvit} = DB::table('zvit_tablica3')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->sum('index_griw_scopus');

        return $p12_{$ActiveZvit};
    }

    function p13($ActiveZvit)
    {

        $p13_{$ActiveZvit} = DB::table('zvit_tablica3')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->sum('idex_gri_web_scop');

        return $p13_{$ActiveZvit};
    }

    function result_8($ActiveZvit)
    {
        if ( ! $this->p6($ActiveZvit) == 0) {
            $result_8 = ($this->p12($ActiveZvit) + $this->p13($ActiveZvit)) / $this->p6($ActiveZvit);
        }
        else {
            $result_8 = 0;
        }

        return round($result_8, 3);
    }

    /* row 9 */

    function p14($ActiveZvit)
    {

        $p14_{$ActiveZvit} = DB::table('zvit_tablica4')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->count('pib');

        return $p14_{$ActiveZvit};
    }

    function p15($ActiveZvit)
    {

        $p15_{$ActiveZvit} = DB::table('zvit_tablica4')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->sum('stat_news');

        return $p15_{$ActiveZvit};
    }

    function p16($ActiveZvit)
    {

        $p16_{$ActiveZvit} = DB::table('zvit_tablica4')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->sum('sum_publish');

        return $p16_{$ActiveZvit};
    }

    function result_9($ActiveZvit)
    {
        if ( ! $this->p6($ActiveZvit) == 0) {
            $result_9 = $this->p14($ActiveZvit) * 100 / $this->p6($ActiveZvit);
        }
        else {
            $result_9 = 0;
        }

        return round($result_9, 3);
    }

    /* row 10 */

    function p17($ActiveZvit)
    {

        $p17_{$ActiveZvit} = DB::table('zvit_tablica5')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->count('row17');

        return $p17_{$ActiveZvit};
    }

    function p18($ActiveZvit)
    {

        $p18_{$ActiveZvit} = DB::table('zvit_tablica5')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->count('row18');

        return $p18_{$ActiveZvit};
    }

    function result_10($ActiveZvit)
    {
        if ( ! $this->p18($ActiveZvit) == 0) {
            $result_10 = $this->p17($ActiveZvit) / $this->p18($ActiveZvit);
        }
        else {
            $result_10 = 0;
        }

        return round($result_10, 3);
    }

    /* row 11 */

    function p8($ActiveZvit)
    {

        $p8_{$ActiveZvit} = DB::table('zvit_tablica2')
                              ->where('zvit_year_id', '=', $ActiveZvit)
                              ->sum('nayk_shef');

        return $p8_{$ActiveZvit};
    }

    function result_11($ActiveZvit)
    {
        if ( ! $this->p6($ActiveZvit) == 0) {
            $result_11 = $this->p8($ActiveZvit) * 100 / $this->p6($ActiveZvit);
        }
        else {
            $result_11 = 0;
        }

        return round($result_11, 3);
    }

//////////////////////////////////////////////////////////////////////////////////////////////
    /* row 12 */
    function p19($ActiveZvit)
    {

        $p19_{$ActiveZvit} = DB::table('zvit_tablica5')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->count('row19');

        return $p19_{$ActiveZvit};
    }

    function result_12($ActiveZvit)
    {
        if ( ! $this->p6($ActiveZvit) == 0) {
            $result_12 = $this->p19($ActiveZvit) * 100 / $this->p6($ActiveZvit);
        }
        else {
            $result_12 = 0;
        }

        return round($result_12, 3);
    }

    /* row 13 */

    function p20($ActiveZvit)
    {

        $p20_{$ActiveZvit} = DB::table('zvit_tablica5')
                               ->where('zvit_year_id', '=', $ActiveZvit)
                               ->count('row20');

        return $p20_{$ActiveZvit};
    }

    function result_13($ActiveZvit)
    {
        if ( ! $this->p6($ActiveZvit) == 0) {
            $result_13 = $this->p20($ActiveZvit) * 100 / $this->p6($ActiveZvit);
        }
        else {
            $result_13 = 0;
        }

        return round($result_13, 3);
    }

}
