<?php

namespace App\Conversions;

class TherapyConversion implements IConversion
{
    public function getTableName(): string
    {
        return 'therapy';
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
            ['db' => 'id', 'dt' => 2,
                'formatter' => function($id)
                {
                    return "
                        <a class='btn btn-info' href='/therapies/show/$id/'><i class='fa fa-eye-slash'></i> Show</a>
                        <a class='btn btn-info' href='/therapies/edit/$id/'><i class='fa fa-edit'></i> Edit</a>
                    ";
                }
            ]
        ];
    }
}