<?php namespace App\Models;
	use CodeIgniter\Model;

	class Usuarios extends Model {
		public function obtenerUsuario($data) {
			$usuario = $this->db->table('t_usuarios');
			$usuario->where($data);
			$query = $usuario->get();
		
			if ($query === false) {
				// Registrar un mensaje de error para depurar
				log_message('error', 'La consulta a la base de datos falló en obtenerUsuario.');
				return false;
			}
		
			return $query->getResultArray();
		}
		
	}