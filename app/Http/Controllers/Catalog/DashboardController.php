<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Component\CRUDController;
use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\Catalog\CategoryRequest;
use App\Models\Catalog\Category;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view("admin.catalog.dashboard.index");
    }
}
