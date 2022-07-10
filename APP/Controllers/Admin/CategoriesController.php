<?php

namespace App\Controllers\admin;

use App\Models\Categories;
use App\Models\Post;
use App\Services\FileUploaderService;
use App\Validators\Posts\PostValidator;
use Core\View;

class CategoriesController extends BaseController
{
    public function index()
    {
        $categories = Categories::all();

        View::render('admin/categories/index' , ['categories' => $categories]);
    }

    public function create()
    {
        View::render('admin/categories/create');
    }

    public function store()
    {
        $validator = new PostValidator();
        $imagePath =  FileUploaderService::upload($_FILES['image'],CATEGORIES_DIR);

        if($validator->titleValidator($_POST['name']) && $validator->imageValidator($_FILES['image']['name'])) {
            Categories::create([
                'name' => htmlspecialchars($_POST['name']),
                'description' => htmlspecialchars($_POST['description']),
                'image' => $imagePath
            ]);
            redirect('admin/categories');
        }

        $data['name'] = $_POST['name'];
        $data['description'] = $_POST['description'];
        $data['errors'] = $validator->errors;

        View::render('admin/categories/create', ['data' => $data]);
    }

    public function edit(int $id)
    {
        $category = Categories::find($id);
        View::render('admin/categories/edit', ['category' => $category]);
    }

    public function update(int $id)
    {
        $validator = new PostValidator();

        if($validator->titleValidator($_POST['name'])) {
            $category = Categories::find($id);
            $categoryData = $_POST;
            if (!empty($_FILES) && $_FILES['image']['size'] > 0) {
                FileUploaderService::remove(CATEGORIES_DIR . '/' . $category->image);
                $imagePath = FileUploaderService::upload($_FILES['image'], CATEGORIES_DIR);
                $categoryData['image'] = $imagePath;
            }

            $category->update($categoryData);

            redirect('admin/categories');
        }
        $category = Categories::find($id);
        $data['name'] = $_POST['name'];
        $data['description'] = $_POST['description'];
        $data['errors'] = $validator->errors;

        View::render('admin/categories/edit', ['data' => $data, 'category' => $category]);
    }

    public function destroy(int $id)
    {
        Categories::delete($id);
        redirect('admin/categories');
    }

}
