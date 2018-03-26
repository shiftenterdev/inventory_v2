<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 3/27/2018
 * Time: 12:17 AM
 */

namespace App\Http\Controllers;


class ReportController extends Controller
{
    public function index()
    {
        return view('admin.report.index');
    }
}