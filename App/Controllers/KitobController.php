<?php

namespace App\Controllers;

use App\Models\Kitob;

class KitobController
{
    public function index()
    {
        $models = Kitob::all();
        return view('Kitob/index', 'Kitob', $models);
    }
    public function createK()
    {
        if (isset($_POST['ok'])) {
            $data = [
                'name' => $_POST['name'],
                'text' => $_POST['text'],
                'muallif_id' => $_POST['muallif_id'],
                'janr_id' => $_POST['janr_id']
            ];
            Kitob::create($data);
            header('location: /kitob');
        }
    }
    public function deleteK()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            Kitob::delete($id);
            header('location: /kitob');
        }
    }
    public function showK()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Kitob::show($id);
            // dd($models);
            return view('Kitob/show', 'Show', $models);
        }
    }
    public function editK()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Kitob::show($id);
            return view('Kitob/edit', 'Edit', $models);
        }
    }
    public function updateK()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $text = $_POST['text'];
            $muallif_id = $_POST['muallif_id'];
            $janr_id = $_POST['janr_id'];
            // echo $id;
            Kitob::updateKitob($id, $name, $text, $muallif_id, $janr_id);
        }
        header('location: /kitob');
    }
}