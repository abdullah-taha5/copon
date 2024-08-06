<?php

namespace App\Repositories;

use App\Bases\RepositoryBase;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CourseRepository extends RepositoryBase
{
    /**
     * @var User The User model instance.
     */

    /**
     * Constructor to initialize the User model.
     */
    public function __construct(Course $model)
    {
        parent::__construct($model);
    }

    /**
     * Store a new row in the User model.
     *
     * @param  array  $data  The data to store.
     */
    public function store(array $data)
    {
        DB::beginTransaction();
        try {
            $row = $this->createRow($data);
            DB::commit();

            return $this->responseHelper(201, true, __('app.created_successfully'), $row, $this->getClassNameFromModel());
        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromModel());
        }
    }

    /**
     * Update an existing row in the User model.
     *
     * @param  array  $data  The data to update.
     * @param  User  $model  The existing row.
     */
    public function update(array $data, Course $model)
    {

        DB::beginTransaction();
        try {
            $updatedRow = $this->updateRow($data, $model);
            DB::commit();

            return $this->responseHelper(202, true, __('app.updated_successfully'), $model, $this->getClassNameFromModel());
        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromModel());
        }
    }

    /**
     * Sync roles for the given row.
     *
     * @param  array  $roles  The roles to sync.
     */
    protected function syncRoles($row, array $roles): void
    {
        $row->roles()->sync($roles);
    }
}
