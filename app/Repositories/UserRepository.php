<?php

namespace App\Repositories;
use App\View\View;

class UserRepository
{
    public function gets($connect)
    {
        $searchResults = $connect->find(
            [],
          ['projection' =>array('_id'=>FALSE)]
        );
       $array=json_encode( $searchResults->toArray(),JSON_PRETTY_PRINT);
        $view= new View();
        $view->get($array);
    }

    public function search($param,$connect)
    {
        $searchResults = $connect->find(
            [
                'code' => $param,
            ],
            ['projection' =>array('_id'=>FALSE)]
        );
        $format=json_encode( $searchResults->toArray(),JSON_PRETTY_PRINT);
        $view= new View();
        $view->get($format);
    }

    public function insert($param,$connect)
    {
        $insertResults = $connect->insertOne([
            'name' => $param['name'],
            'code' => $param['code'],
            'birthday' => $param['birthday'],
            'age' => $param['age'],
            'password' => $param['password'],
        ]);
        return $insertResults->getInsertedCount();
    }

    public function update($param,$connect)
    {
        $connect->updateMany(
            [
                'code' => $param['code'],
            ],
            ['$set' => [
                'name' => $param['name'],
                'birthday' => $param['birthday'],
                'age' => $param['age'],
                'password' => $param['password'],
            ],
            ]
        );
    }

    public function delete($param,$connect)
    {
        echo "Ban co chac chan muon xoa khong?? \n";
        echo "(Y Or N) ??";
        $input = fgetc(fopen('php://stdin', 'r'));
        if ($input == 'y') {
            $results = $connect->deleteMany(
                [
                    'code' => $param,
                ]);
            return $results->getDeletedCount();
        }
        if ($input == 'y') {
            echo "ket thuc \n";
            die();
        }
    }
}

?>