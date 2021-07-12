<?php
namespace App\Controllers;
use App\Repositories\UserRepository;
class App
{
    public function Call($connect)
    {
        $userRepository = new UserRepository();
        while (true) {
            echo "de thuc hien chuong trinh bam n \n";
            echo "de exit chuong trinh bam q \n";
            $put = fgetc(fopen('php://stdin', 'r'));
            if ($put == 'n') {
                echo "Nhap 1 de xem tat ca \n";
                echo "Nhap 2 de tim kiem \n";
                echo "Nhap 3 de them moi \n";
                echo "Nhap 4 de sua \n";
                echo "Nhap 5 de xoa \n";
                $input = fgetc(fopen('php://stdin', 'r'));
                if ($input == '1')
                {
                    $userRepository->gets($connect);
                }
                if ($input == '2') {
                    echo "Nhap code \n";
                    $param=trim(fgets(fopen('php://stdin', 'r')));
                    $userRepository->search($param,$connect);
                }
                if ($input == '3') {
                    echo "Nhap name\n";
                    $param['name']=trim(fgets(fopen('php://stdin', 'r')));
                    echo "Nhap code \n";
                    $param['code']=trim(fgets(fopen('php://stdin', 'r')));
                    echo "Nhap birthday \n";
                    $param['birthday']=trim(fgets(fopen('php://stdin', 'r')));
                    echo "Nhap age \n";
                    $param['age']=intval(trim(fgets(fopen('php://stdin', 'r'))));
                    echo "Nhap password \n";
                    $param['password']=trim(fgets(fopen('php://stdin', 'r')));
                    $name = $userRepository->insert($param,$connect);
                    echo " Da them thanh cong:$name \n";
                }
                if ($input == '4') {
                    echo "Nhan E de update:\n";
                    $enter = fgetc(fopen('php://stdin', 'r'));
                    if ($enter == 'e') {
                        echo "Nhap code muon update \n";
                        $param['code'] = trim(fgets(fopen('php://stdin', 'r')));
                        echo "Nhap name\n";
                        $param['name'] = trim(fgets(fopen('php://stdin', 'r')));
                        echo "Nhap birthday \n";
                        $param['birthday'] = trim(fgets(fopen('php://stdin', 'r')));
                        echo "Nhap age \n";
                        $param['age'] = intval(trim(fgets(fopen('php://stdin', 'r'))));
                        echo "Nhap password \n";
                        $param['password'] = trim(fgets(fopen('php://stdin', 'r')));
                    }
                    else{
                        die();
                    }
                    $userRepository->update($param,$connect);
                }

                if ($input == '5') {
                    echo "Nhap code muon xoa:\n";
                    $param=trim(fgets(fopen('php://stdin', 'r')));
                    $name = $userRepository->delete($param,$connect);
                    echo " Da Xoa Thanh Cong:$name \n";
                }
            }
            if ($put == 'q') {
                echo "ket thuc \n";
                break;
            }
        }
    }
}
?>