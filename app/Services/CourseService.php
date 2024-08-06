<?php

namespace App\Services;

use App\Bases\ServiceBase;
use App\Helpers\UploadFile;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Repositories\CourseRepository;

/**
 * Class UserService
 *
 * This service handles user-related operations, acting as an intermediary between the controllers
 * and the user repository. It provides methods for user management such as creating, updating,
 * deleting users, and more.
 */
class CourseService extends ServiceBase
{
    use UploadFile;

    /**
     * @var CourseRepository The user repository instance.
     */
    public $repository;

    /**
     * UserService constructor.
     *
     * @param  CourseRepository  $repository  The user repository.
     */
    public function __construct(CourseRepository $repository)
    {
        parent::__construct($repository);

    }

    /**
     * Stores a new user.
     *
     * @param  array  $data  User data.
     */
    public function store(StoreCourseRequest $data)
    {
        try {
            $response = $this->repository->store($this->dataHandler($data));
            $model = $response['data'];
            $this->uploadFile($model, 'file', 'course_thumbnail');

            return $response;
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    /**
     * Updates an existing user.
     */
    public function update(UpdateCourseRequest $data, Course $model)
    {
        try {
            $response = $this->repository->update($this->dataHandler($data), $model);
            $model = $response['data'];
            if ($data->file != null) {
                $this->uploadFile($model, 'file', 'course_thumbnail');
            }

            return $this->repository->update($this->dataHandler($data), $model);
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    public function dataHandler($request)
    {
        return [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'is_published' => $request->is_published == 'on' ? 1 : 0,
        ];
    }
}
