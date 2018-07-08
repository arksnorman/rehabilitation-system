<?php

namespace App\Conversions;


class UserConversion implements IConversion
{
    public function getTableName(): string
    {
        return 'user';
    }

    public function getIdField(): string
    {
        return 'id';
    }

    public function getApiColumns(): array
    {
        return [
            ['db' => 'id', 'dt' => 0],
            ['db' => 'username', 'dt' => 1],
            ['db' => 'email', 'dt' => 2],
            ['db' => 'phone_number', 'dt' => 3],
            ['db' => 'last_login', 'dt' => 4,
                'formatter' => function($d) { return date('jS M y', strtotime($d)); }
            ],
            ['db' => 'id', 'dt' => 5,
                'formatter' => function($id)
                {
                    return "
                        <a class='btn btn-info' href='/user/$id'><i class='fa fa-eye-slash'></i> Show</a>
                        <a class='btn btn-info' href='/user/$id/edit'><i class='fa fa-edit'></i> Edit</a>
                    ";
                }
            ]
        ];
    }
}