<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoriesController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        CategoryResource::wrap('data');
        return CategoryResource::collection(Category::all());
    }
}
