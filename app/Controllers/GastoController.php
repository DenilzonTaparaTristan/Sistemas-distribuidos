<?php

namespace App\Controllers;

use App\Models\GastoModel; // Asegúrate de tener el modelo importado
use CodeIgniter\RESTful\ResourceController;

class GastoController extends ResourceController
{
    protected $gastoModel;

    public function __construct()
    {
        // Inicializamos el modelo de Gasto
        $this->gastoModel = new GastoModel();
    }

    // Método para obtener todos los gastos de un usuario
    public function index()
    {
        $usuario_id = $this->request->getVar('usuario_id'); // Obtenemos el ID del usuario desde los parámetros de la URL o los datos de la petición
        if ($usuario_id) {
            $gastos = $this->gastoModel->getGastosByUsuario($usuario_id); // Recuperamos los gastos por usuario
            return $this->respond($gastos); // Respondemos con los gastos en formato JSON
        } else {
            return $this->failValidationError('El ID del usuario es requerido.');
        }
    }

    // Método para obtener un gasto específico por su ID
    public function show($id = null)
    {
        $gasto = $this->gastoModel->find($id); // Busca el gasto por ID
        if ($gasto) {
            return $this->respond($gasto); // Devuelve el gasto si se encuentra
        } else {
            return $this->failNotFound('Gasto no encontrado'); // Si no lo encuentra, muestra error
        }
    }

    // Método para crear un nuevo gasto
    public function create()
    {
        $data = $this->request->getPost(); // Obtiene los datos de la petición

        // Validación de los datos, puedes agregar más reglas si es necesario
        if (!$data['usuario_id'] || !$data['monto'] || !$data['categoria'] || !$data['descripcion'] || !$data['fecha']) {
            return $this->failValidationError('Faltan datos obligatorios');
        }

        // Intentamos agregar el gasto
        $this->gastoModel->addGasto($data);
        return $this->respondCreated('Gasto creado con éxito');
    }

    // Método para actualizar un gasto
    public function update($id = null)
    {
        $data = $this->request->getRawInput(); // Obtiene los datos de la solicitud

        if (!$this->gastoModel->find($id)) {
            return $this->failNotFound('Gasto no encontrado');
        }

        // Actualizamos el gasto
        $this->gastoModel->updateGasto($id, $data);
        return $this->respondUpdated('Gasto actualizado con éxito');
    }

    // Método para eliminar un gasto
    public function delete($id = null)
    {
        if (!$this->gastoModel->find($id)) {
            return $this->failNotFound('Gasto no encontrado');
        }

        // Eliminamos el gasto
        $this->gastoModel->deleteGasto($id);
        return $this->respondDeleted('Gasto eliminado con éxito');
    }
}
