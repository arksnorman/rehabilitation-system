<?php

namespace App\Controller;


use App\Conversions\IllnessConversion;
use App\Conversions\PatientConversion;
use App\Conversions\TherapyConversion;
use App\Conversions\UserConversion;
use App\DataTable\DataTableInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController
{
    public function therapies(DataTableInterface $dataTable) :Response
    {
        $conversion = new TherapyConversion;
        $dataTable->setTable($conversion->getTableName());
        $dataTable->setColumns($conversion->getApiColumns());
        $dataTable->setPrimaryKey($conversion->getIdField());
        return new JsonResponse($dataTable->getData());
    }

    public function patients(DataTableInterface $dataTable) :Response
    {
        $conversion = new PatientConversion;
        $dataTable->setTable($conversion->getTableName());
        $dataTable->setColumns($conversion->getApiColumns());
        $dataTable->setPrimaryKey($conversion->getIdField());
        return new JsonResponse($dataTable->getData());
    }

    public function users(DataTableInterface $dataTable) :Response
    {
        $conversion = new UserConversion;
        $dataTable->setTable($conversion->getTableName());
        $dataTable->setColumns($conversion->getApiColumns());
        $dataTable->setPrimaryKey($conversion->getIdField());
        return new JsonResponse($dataTable->getData());
    }

    public function illnesses(DataTableInterface $dataTable) :Response
    {
        $conversion = new IllnessConversion;
        $dataTable->setTable($conversion->getTableName());
        $dataTable->setColumns($conversion->getApiColumns());
        $dataTable->setPrimaryKey($conversion->getIdField());
        return new JsonResponse($dataTable->getData());
    }
}
