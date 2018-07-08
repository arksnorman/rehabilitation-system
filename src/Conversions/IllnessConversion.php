<?php

namespace App\Conversions;


class IllnessConversion implements IConversion
{
    public function getTableName(): string
    {
        return 'illness';
    }

    public function getIdField(): string
    {
        return 'id';
    }

    public function getApiColumns(): array
    {
        return [
            ['db' => 'id', 'dt' => 0],
            ['db' => 'name', 'dt' => 1],
            ['db' => 'description', 'dt' => 2],
            ['db' => 'id', 'dt' => 3,
                'formatter' => function($id)
                {
                    return "
                        <a class='btn btn-info' href='/illness/$id'><i class='fa fa-eye-slash'></i> Show</a>
                        <a class='btn btn-info' href='/illness/$id/edit/'><i class='fa fa-edit'></i> Edit</a>
                    ";
                }
            ]
        ];
    }
}