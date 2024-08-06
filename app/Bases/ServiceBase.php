<?php

namespace App\Bases;

use App\Helpers\ResponseHelper;

class ServiceBase
{
    use ResponseHelper;

    public $repository;

    /**
     * service constructor.
     *
     * @param  $service
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * Retrieves paginated user rows.
     *
     * @param  int  $count  Number of users per page.
     * @param  string  $search  Optional search term.
     */
    public function getPaginatedRows(int $count, string $search = '')
    {
        try {
            $response = $this->repository->getPaginatedRows($count, $search);

            return response()->json($response);
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    /**
     * Retrieves a user by ID.
     *
     * @param  int  $id  User ID.
     */
    public function getRowById(int $id)
    {
        try {
            $response = $this->repository->getRowById($id);

            return response()->json($response);
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    /**
     * Retrieves all user rows.
     */
    public function getAllRows()
    {
        try {
            $response = $this->repository->getAllRows();

            return response()->json($response);
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    /**
     * Deletes a record from database.
     */
    public function delete($model)
    {
        try {
            $response = $this->repository->delete($model);

            return response()->json($response);
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    /**
     * Deletes a group of users.
     *
     * @param  array  $IDs  Array of user IDs to delete.
     */
    public function deleteGroup(array $IDs)
    {
        try {
            $response = $this->repository->deleteGroup($IDs);

            return response()->json($response);
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    public function getClassNameFromService()
    {
        return class_basename($this->repository->getClassNameFromModel().' '.' Service ');
    }
}
