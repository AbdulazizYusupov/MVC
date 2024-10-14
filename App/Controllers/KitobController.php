<?php

namespace App\Controllers;

use PDO;
use App\Models\Kitob;
use App\Helpers\Auth;

class KitobController
{
    public function __construct()
    {
        if (!Auth::check()){
            header('location: /login');
        }
    }
    public function index()
    {
        $models = Kitob::all();
        return view('Kitob/index', 'Kitob', $models);
    }
    public function janrlar()
    {
        $con = new PDO("mysql:host=localhost;dbname=mvc", 'root', 'root');
        $sql = "SELECT janr.id,janr.name,COUNT(kitob.janr_id) AS soni FROM janr LEFT JOIN kitob ON janr.id = kitob.janr_id GROUP BY janr.id";
        $st = $con->query($sql);
        $janrlar = $st->fetchAll(PDO::FETCH_ASSOC);
        return view('janrlar', 'janrlar', $janrlar);
    }
    public function mualliflar()
    {
        $con = new PDO("mysql:host=localhost;dbname=mvc", 'root', 'root');
        $sql = "SELECT muallif.id, muallif.name, COUNT(kitob.muallif_id) AS soni FROM muallif LEFT JOIN kitob ON muallif.id = kitob.muallif_id GROUP BY muallif.id";
        $st = $con->query($sql);
        $mualliflar = $st->fetchAll(PDO::FETCH_ASSOC);
        return view('mualliflar', 'Mualliflar', $mualliflar);
    }
    public function createK()
    {
        if (isset($_POST['ok']) && !empty($_POST['name']) && !empty($_POST['text']) && !empty($_POST['muallif_id']) && !empty($_POST['janr_id'])) {
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
        if (isset($_POST['ok']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            Kitob::delete($id);
            header('location: /kitob');
        }
    }
    public function showK()
    {
        if (isset($_POST['ok']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $models = Kitob::show($id);
            // dd($models);
            return view('Kitob/show', 'Show', $models);
        }
    }
    public function editK()
    {
        if (isset($_POST['ok']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $models = Kitob::show($id);
            return view('Kitob/edit', 'Edit', $models);
        }
    }
    public function updateK()
    {
        if (isset($_POST['ok']) && !empty($_POST['name']) && !empty($_POST['text']) && !empty($_POST['muallif_id']) && !empty($_POST['janr_id'])) {
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