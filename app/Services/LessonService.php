<?php

namespace App\Services;

use App\Bases\ServiceBase;
use App\Helpers\UploadFile;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Lesson;
use App\Repositories\LessonRepository;

/**
 * Class UserService
 *
 * This service handles user-related operations, acting as an intermediary between the controllers
 * and the user repository. It provides methods for user management such as creating, updating,
 * deleting users, and more.
 */
class LessonService extends ServiceBase
{
    use UploadFile;

    /**
     * @var LessonRepository The user repository instance.
     */
    public $repository;

    /**
     * UserService constructor.
     *
     * @param  LessonRepository  $repository  The user repository.
     */
    public function __construct(LessonRepository $repository)
    {
        parent::__construct($repository);

    }

    /**
     * Stores a new user.
     *
     * @param  array  $data  User data.
     */
    public function store(StoreLessonRequest $data)
    {
        try {
            $response = $this->repository->store($this->dataHandler($data));
            $model = $response['data'];
            $this->uploadFile($model, 'thumbnail', 'lesson_thumbnail');
            if ($data->video != null) {
                $this->uploadFile($model, 'video', 'lesson_video');
            }

            return $response;
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    /**
     * Updates an existing user.
     */
    public function update(UpdateLessonRequest $data, Lesson $model)
    {
        try {
            $response = $this->repository->update($this->dataHandler($data), $model);
            $model = $response['data'];
            if ($data->thumbnail != null) {
                $this->uploadFile($model, 'thumbnail', 'lesson_thumbnail');
            }
            if ($data->video != null) {
                $this->uploadFile($model, 'video', 'lesson_video');
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
            'long_text' => $request->long_text,
            'short_text' => $request->short_text,
            'iframe'    => $request->iframe,
            'position'  => $request->position,
            'course_id'  => $request->course_id,
            'is_published' => $request->is_published == 'on' ? 1 : 0,
        ];
    }
}
