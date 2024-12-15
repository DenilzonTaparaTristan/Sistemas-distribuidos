<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuario extends Seeder
{
    public function run()
    {
        // Datos para el rol admin
        $adminUsuario = "admin2";
        $adminPassword = password_hash("1234", PASSWORD_DEFAULT);
        $adminType = "admin";

        $dataAdmin = [
            'usuario'  => $adminUsuario,
            'password' => $adminPassword,
            'type'     => $adminType
        ];

        // Datos para el rol editor
        $editorUsuario = "editor1";
        $editorPassword = password_hash("1234", PASSWORD_DEFAULT);
        $editorType = "editor";

        $dataEditor = [
            'usuario'  => $editorUsuario,
            'password' => $editorPassword,
            'type'     => $editorType
        ];

        // Datos para el rol viewer
        $viewerUsuario = "viewer1";
        $viewerPassword = password_hash("1234", PASSWORD_DEFAULT);
        $viewerType = "viewer";

        $dataViewer = [
            'usuario'  => $viewerUsuario,
            'password' => $viewerPassword,
            'type'     => $viewerType
        ];

        // Insertar los datos uno por uno en la tabla t_usuario
        $this->db->table('t_usuarios')->insert($dataAdmin);
        $this->db->table('t_usuarios')->insert($dataEditor);
        $this->db->table('t_usuarios')->insert($dataViewer);
    }
}
