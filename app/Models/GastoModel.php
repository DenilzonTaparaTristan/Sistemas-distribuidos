<?php

namespace App\Models;

use CodeIgniter\Model;

class GastoModel extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'gastos';
    
    // Clave primaria de la tabla
    protected $primaryKey = 'id';
    
    // Campos permitidos para ser manipulados por el modelo
    protected $allowedFields = ['usuario_id', 'monto', 'categoria', 'descripcion', 'fecha'];

    // Indica si debe usar los timestamps
    protected $useTimestamps = true;
    
    // Los campos que representan los timestamps de creación y actualización
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Método para obtener los gastos por usuario
    public function getGastosByUsuario($usuario_id)
    {
        return $this->where('usuario_id', $usuario_id)->findAll();
    }

    // Método para agregar un nuevo gasto
    public function addGasto($data)
    {
        // Asegura que se inserten los datos de manera correcta
        if ($this->insert($data)) {
            return true; // Si el gasto se inserta correctamente
        }
        return false; // Si hubo un error al insertar
    }

    // Método para actualizar un gasto
    public function updateGasto($id, $data)
    {
        // Verifica si el gasto existe
        if ($this->find($id)) {
            return $this->update($id, $data); // Actualiza el gasto
        }
        return false; // Si no se encuentra el gasto, retorna false
    }

    // Método para eliminar un gasto
    public function deleteGasto($id)
    {
        // Verifica si el gasto existe
        if ($this->find($id)) {
            return $this->delete($id); // Elimina el gasto
        }
        return false; // Si no se encuentra el gasto, retorna false
    }

    // Método para obtener todos los gastos, se puede personalizar según las necesidades
    public function getAllGastos()
    {
        return $this->findAll(); // Devuelve todos los gastos
    }

    // Método para obtener el total de gastos por usuario
    public function getTotalGastos($usuario_id)
    {
        return $this->where('usuario_id', $usuario_id)
                    ->selectSum('monto') // Suma de la columna 'monto'
                    ->first(); // Retorna el primer (y único) resultado
    }
}
