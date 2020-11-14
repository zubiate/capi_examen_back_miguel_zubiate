<?php

namespace App\Http\Controllers;

use League\Fractal\Manager;
use League\Fractal\Serializer\DataArraySerializer;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use League\Fractal\Resource\Collection;

class UserController extends Controller
{
    protected $userRepository;

    protected $fractal;

    public function __construct(UserRepository $userRepository, Manager $fractal)
    {
        $this->userRepository = $userRepository;
        $this->fractal = $fractal;
    }

    public function index(Request $request)
    {
        $this->fractal->setSerializer(new DataArraySerializer);

        if (isset($request->include)) {
            $this->fractal->parseIncludes($request->include);
        }

        $users = $this->userRepository->getAllUsers();
        $resource = new Collection($users, new UserTransformer, 'data');

        $data = [
            'message' => 'Success'
        ] + $this->fractal->createData($resource)->toArray();

        return response()->json($data);
    }
}
