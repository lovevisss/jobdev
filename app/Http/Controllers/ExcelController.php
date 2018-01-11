<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function export(){
    	$cellData = [
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
    	];
    	\Excel::create('学生成绩',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }

    public function import(){
    	$filepath = 'public/excel/test.xls';
    	\Excel::load('thenew.csv', function($reader){
    		$data = $reader->all();
            dd($data);
    		 // foreach ($data as $item) {
       //          dd($item->newstitle) ;
       //      }
            
    	});

        // $filePath = 'public/excel/'.iconv('UTF-8', 'GBK', '学生成绩').'.xls';
        // \Excel::load($filePath, function($reader) {
        // $data = $reader->all();
        // dd($data);
        // });
    }
}
