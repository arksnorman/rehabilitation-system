<?php

namespace App\Conversions;


class PatientConversion
{
    public function getTableName(): string
    {
        return 'patient';
    }

    public function getIdField(): string
    {
        return 'id';
    }

    public function getApiColumns(): array
    {
        return [
            ['db' => 'id', 'dt' => 0],
            ['db' => 'first_name', 'dt' => 1],
            ['db' => 'last_name', 'dt' => 2],
            ['db' => 'email', 'dt' => 3],
            ['db' => 'age', 'dt' => 4],
            ['db' => 'residence', 'dt' => 5],
            ['db' => 'sex', 'dt' => 6],
            ['db' => 'id', 'dt' => 7,
                'formatter' => function($id)
                {
                    return "
                        <a class='btn btn-info' href='/patients/show/$id/'><i class='fa fa-eye-slash'></i> Show</a>
                        <a class='btn btn-info' href='/patients/edit/$id/'><i class='fa fa-edit'></i> Edit</a>
                    ";
                }
            ]
        ];
    }
}