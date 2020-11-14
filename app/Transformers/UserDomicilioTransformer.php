<?php

namespace App\Transformers;

use App\Models\UserDomicilio;
use League\Fractal\TransformerAbstract;

class UserDomicilioTransformer extends TransformerAbstract
{
    public function transform(UserDomicilio $userDomicilio)
	{
	    return [
			'domicilio' => $userDomicilio->domicilio,
			'numero_exterior' => $userDomicilio->numero_exterior,
			'colonia' => $userDomicilio->colonia,
			'codigo_postal' => $userDomicilio->cp,
			'ciudad' => $userDomicilio->ciudad
		];
	}
}