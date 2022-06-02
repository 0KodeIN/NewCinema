<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\UserFormRequest;
use App\Exports\InvoicesExport;

class Report extends Controller
{
    public function get_report() {

        if(DB::connection()) {
                $result = DB::select('select * from session, movie 
                where movie.id_film = session.id_film
                order by movie.id_film');
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('template.xlsx');
                $worksheet = $spreadsheet->getActiveSheet();
                $inp = 2;
                foreach ($result as $res) {
                    
                    echo $res->session_date;
                    $worksheet->getCell('A'.$inp)->setValue($res->id_film);
                    $worksheet->getCell('B'.$inp)->setValue($res->session_id);
                    $worksheet->getCell('C'.$inp)->setValue($res->hall_id);
                    $worksheet->getCell('D'.$inp)->setValue($res->session_date);
                    $worksheet->getCell('E'.$inp)->setValue($res->session_time);
                    $worksheet->getCell('F'.$inp)->setValue($res->film_name);
                    $worksheet->getCell('G'.$inp)->setValue($res->film_genre);
                    $worksheet->getCell('H'.$inp)->setValue($res->year_of_issue);
                    $worksheet->getCell('I'.$inp)->setValue($res->start_date);
                    $worksheet->getCell('J'.$inp)->setValue($res->end_date);
                    $worksheet->getCell('K'.$inp)->setValue($res->duration);
                    $worksheet->getCell('L'.$inp)->setValue($res->film_cost);
                    $worksheet->getCell('M'.$inp)->setValue($res->film_photo);
                    $inp++;
 
                }
                           
        }
        $worksheet->getCell('A1')->setValue('Код фильма');
        $worksheet->getCell('B1')->setValue('Код сеанса');
        $worksheet->getCell('C1')->setValue('Код зала');
        $worksheet->getCell('D1')->setValue('Дата сеанса');
        $worksheet->getCell('E1')->setValue('Время сеанса');
        $worksheet->getCell('F1')->setValue('Название фильма');
        $worksheet->getCell('G1')->setValue('Жанр');
        $worksheet->getCell('H1')->setValue('Год выпуска');
        $worksheet->getCell('I1')->setValue('Начало показа');
        $worksheet->getCell('J1')->setValue('Конец показа');
        $worksheet->getCell('K1')->setValue('Продолжительность');
        $worksheet->getCell('L1')->setValue('Цена');
        $worksheet->getCell('M1')->setValue('Название фото');
        
         //return (new InvoicesExport)->download('invoices.csv', Excel::CSV, ['Content-Type' => 'text/csv']);                                         // add some data to the writer
         $path = 'D:\OpenServer\domains\localhost\app\public\write.xls';

   

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('write.xls');
        echo "<p><a href='download.php?path=write.xls'>Скачать файл</a></p>" ;
        if (file_exists($path)) {
            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
            // если этого не сделать файл будет читаться в память полностью!
            if (ob_get_level()) {
              ob_end_clean();
            }
            // заставляем браузер показать окно сохранения файла
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($path));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($path));
            // читаем файл и отправляем его пользователю
            readfile($path);
            exit;
        }    


    }
}
// function file_force_download($file) {
//     if (file_exists($file)) {
//       // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
//       // если этого не сделать файл будет читаться в память полностью!
//       if (ob_get_level()) {
//         ob_end_clean();
//       }
//       // заставляем браузер показать окно сохранения файла
//       header('Content-Description: File Transfer');
//       header('Content-Type: application/octet-stream');
//       header('Content-Disposition: attachment; filename=' . basename($file));
//       header('Content-Transfer-Encoding: binary');
//       header('Expires: 0');
//       header('Cache-Control: must-revalidate');
//       header('Pragma: public');
//       header('Content-Length: ' . filesize($file));
//       // читаем файл и отправляем его пользователю
//       readfile($file);
//       exit;
//     }
//   }
