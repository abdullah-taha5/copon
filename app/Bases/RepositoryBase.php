<?php

namespace App\Bases;

use App\Helpers\ResponseHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RepositoryBase
{
    use ResponseHelper;

    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Filter the rows based on the search query.
     *
     * @param  $rows.
     * @param  string  $search  The search query.
     */
    public function filter($rows, string $search)
    {
        return $rows->where('name', 'LIKE', "%$search%");
    }

    /**
     * Get paginated rows based on the count and search query.
     *
     * @param  int  $count  The number of rows per page.
     * @param  string  $search  The search query.
     */
    public function getPaginatedRows(int $count = 30, string $search = '')
    {
        try {
            $rows = $this->model;
            $rows = $this->filter($rows, $search);
            $paginatedRows = $this->paginateRows($rows, $count);

            return $this->responseHelper(200, true, __('app.data_retrieved'), $paginatedRows, $this->getClassNameFromModel());
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromModel());
        }
    }

    /**
     * Paginate the given rows.
     *
     * @param  int  $count  The number of rows per page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The paginated rows.
     */
    protected function paginateRows($rows, int $count): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $rows->paginate($count);
    }

    /**
     * Get a row by its ID.
     *
     * @param  int  $id  The ID of the row.
     */
    public function getRowById(int $id)
    {
        try {
            $row = $this->findRowById($id);
            if ($row != null) {
                return $this->responseHelper(200, true, __('app.data_retrieved'), $row, $this->getClassNameFromModel());
            } else {
                return $this->responseHelper(404, false, __('app.not_found'), [], $this->getClassNameFromModel());
            }
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromModel());
        }
    }

    /**
     * Find a row by its ID.
     *
     * @param  int  $id  The ID of the row.
     * @return Model|null The found row or null.
     */
    protected function findRowById(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * Get all rows from the User model.
     */
    public function getAllRows()
    {
        try {
            $rows = $this->model->get();

            return $this->responseHelper(200, true, __('app.data_retrieved'), $rows, $this->getClassNameFromModel());
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromModel());
        }
    }

    /**
     * Create a new row in the User model.
     *
     * @param  array  $data  The data to create.
     * @return Model The created row.
     */
    protected function createRow(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Update the given row in the User model.
     *
     * @param  array  $data  The data to update.
     * @param  Model  $model  The existing row.
     * @return bool Whether the update was successful.
     */
    protected function updateRow(array $data, Model $model): bool
    {
        return $model->update($data);
    }

    /**
     * Delete an existing row in the User model.
     *
     * @param  Model  $model  The existing row.
     */
    public function delete(Model $model)
    {
        DB::beginTransaction();
        try {
            $deletedRow = $this->deleteRow($model);
            DB::commit();

            return $this->responseHelper(200, true, __('app.deleted_successfully'), $deletedRow, $this->getClassNameFromModel());
        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromModel());
        }
    }

    /**
     * Delete the given row in the User model.
     *
     * @param  Model  $model  The existing row.
     * @return bool|null Whether the deletion was successful.
     */
    protected function deleteRow(Model $model): ?bool
    {
        return $model->delete();
    }

    /**
     * Delete a group of rows by their IDs.
     *
     * @param  array  $IDs  The IDs of the rows to delete.
     */
    public function deleteGroup(array $IDs)
    {
        DB::beginTransaction();
        try {
            $deletedRows = $this->deleteRowsByIds($IDs);
            DB::commit();

            return $this->responseHelper(200, true, __('app.deleted_successfully'), $deletedRows, $this->getClassNameFromModel());
        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromModel());
        }
    }

    /**
     * Delete rows by their IDs.
     *
     * @param  array  $IDs  The IDs of the rows to delete.
     * @return int The number of rows deleted.
     */
    protected function deleteRowsByIds(array $IDs): int
    {
        return $this->model->whereIn('id', $IDs)->delete();
    }

    public function getClassNameFromModel()
    {
        return class_basename($this->model);
    }
}
