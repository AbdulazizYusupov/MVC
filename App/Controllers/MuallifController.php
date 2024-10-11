<?php

namespace App\Controllers;

use App\Models\Muallif;

class MuallifController
{
    public function index()
    {
        $models = Muallif::all();
        return view('Muallif/index', 'Muallif', $models);
    }
    public function createM()
    {
        if (isset($_POST['ok'])) {
            $data = [
                'name' => $_POST['name']
            ];
            Muallif::create($data);
            header('location: /');
        }
    }
    public function deleteM()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            Muallif::delete($id);
            header('location: /');
        }
    }
    public function showM()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Muallif::show($id);
            // dd($models);
            return view('Muallif/show', 'Show', $models);
        }
    }
    public function editM()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Muallif::show($id);
            return view('Muallif/edit', 'Edit', $models);
        }
    }
    public function updateM()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            // echo $id;
            Muallif::update($id, $name);
        }
        header('location: /');
    }
}