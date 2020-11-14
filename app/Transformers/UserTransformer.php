<?php

namespace App\Transformers;

use DateTime;
use App\Models\User;
use League\Fractal\TransformerAbstract;
use App\Transformers\UserDomicilioTransformer;

class UserTransformer extends TransformerAbstract
{
	/**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'domicilio'
	];
	
	/**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(User $user)
	{
		$birthdate = $this->getAge($user->fecha_nacimiento);

	    return [
			'name' => $user->name,
			'email' => $user->email,
			'edad' => (int) $birthdate,
			'fecha_nacimiento' => $user->fecha_nacimiento
		];
	}

	/**
     * Include Domicilio
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeDomicilio(User $user)
    {
        $domicilio = $user->domicilio;

        return $this->collection($domicilio, new UserDomicilioTransformer);
	}
	
	private function getAge($birthdate)
	{
		$nowBirthdate = new DateTime($birthdate);
    	$now = new DateTime(date("Y-m-d"));
    	$diff = $now->diff($nowBirthdate);
    	return $diff->format("%y");
	}
}