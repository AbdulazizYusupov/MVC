<?php

namespace App\Controllers;

use App\Models\Janr;

class JanrController
{
    public function index()
    {
        $models = Janr::all();
        return view('Janr/index', 'Janrlar', $models);
    }
    public function create()
    {
        if (isset($_POST['ok'])) {
            $data = [
                'name' => $_POST['name'],
            ];
            Janr::create($data);
            header('location: /janr');
        }
    }
    public function delete()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            Janr::delete($id);
            header('location: /janr');
        }
    }
    public function show()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Janr::show($id);
            // dd($models);
            return view('Janr/show', 'Show', $models);
        }
    }
    public function edit()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Janr::show($id);
            return view('Janr/edit', 'Edit', $models);
        }
    }
    public function update()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            // echo $id;
            Janr::update($id, $name);
        }
        header('location: /janr');
    }
}