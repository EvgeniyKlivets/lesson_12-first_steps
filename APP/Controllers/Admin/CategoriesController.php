<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Services\FileUploaderService;
use Core\View;

class CategoriesController extends  BaseController
{
    public function index()
    {
        $categories = Category::all();
        View::render('admin/categories/index',['categories'=>$categories]);
    }

    public function create()
    {
        View:: render('admin/categories/create');
    }
    public function store()
    {
        if (empty($_FILES['image'])) {
            throw new \Exception('Image is empty');
        }

        $imagePath = FileUploaderService::upload($_FILES['image'], CATEGORIES_IMG_DIR);
        Category::create([
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'image' => $imagePath,
        ]);

        redirect('admin/categories');
    }

    public function edit(int $id)
    {
        $category = Category::find($id);
        View::render('admin/categories/edit', ['category' => $category]);
    }

    public function update(int $id)
    {
        $category = Category::find($id);
        $categoryData = $_POST;

        if (!empty($_FILES['image']) && $_FILES['image']['size'] > 0) {
            FileUploaderService::remove(CATEGORIES_IMG_DIR . '/' . $category->image);
            $imagePath = FileUploaderService::upload($_FILES['image'], CATEGORIES_IMG_DIR);
            $categoryData['image'] = $imagePath;
        }

        $category->update($categoryData);

        redirect('admin/categories');
    }

    public function destroy(int $id)
    {
        Category::delete($id);

        redirect('admin/categories');
    }
}