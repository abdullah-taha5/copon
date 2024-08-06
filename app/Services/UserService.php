<?php

namespace App\Services;

use App\Bases\ServiceBase;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 *
 * This service handles user-related operations, acting as an intermediary between the controllers
 * and the user repository. It provides methods for user management such as creating, updating,
 * deleting users, and more.
 */
class UserService extends ServiceBase
{
    /**
     * @var UserRepository The user repository instance.
     */
    public $repository;

    /**
     * UserService constructor.
     *
     * @param  UserRepository  $repository  The user repository.
     */
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);

    }

    /**
     * Stores a new user.
     *
     * @param  array  $data  User data.
     */
    public function store(array $data)
    {
        try {
            $processedData = $this->processDataWithPassword($data);

            return $this->repository->store($processedData);
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    /**
     * Updates an existing user.
     *
     * @param  array  $data  Updated user data.
     */
    public function update(array $data, $model)
    {
        try {
            $processedData = $this->processDataWithPassword($data);

            return $this->repository->update($processedData, $model);
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    /**
     * Registers a new user and generates an authentication token.
     *
     * @param  array  $data  User data.
     */
    public function register(array $data)
    {
        try {
            $processedData = $this->processDataWithPassword($data);
            $response = $this->repository->store($processedData);
            if ($response['success']) {
                $user = $this->repository->getRowById($response['data']['id'])['data'];
                $response['token'] = $this->createUserToken($user);
            }

            return $response;
        } catch (\Throwable $th) {
            return $this->responseHelper(500, false, $th->getMessage().' in line '.$th->getLine(), [], $this->getClassNameFromService());
        }
    }

    /**
     * Processes user data, hashing the password if present.
     *
     * @param  array  $data  User data.
     * @return array Processed user data.
     */
    protected function processDataWithPassword(array $data): array
    {
        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        return $data;
    }

    /**
     * Creates a new authentication token for a user.
     *.
     *
     * @return string The generated token.
     */
    protected function createUserToken($user): string
    {
        return $user->createToken('user-token')->plainTextToken;
    }
}
