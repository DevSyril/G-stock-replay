<?php

namespace App\Interfaces;

interface UserInterface
{
    public function index();
    public function show($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function login(array $data);
}
