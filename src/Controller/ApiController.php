<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Item;
use App\Entity\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/clear_count", name="clear_count")
     */
    public function clear_count(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $items = $em->getRepository(Item::class)->findAll();

        foreach ($items as $v) {
            $v->setCount(0);
        }
        $em->flush();

        return $this->redirect('/admin?crudAction=index&crudControllerFqcn=App%5CController%5CAdmin%5CItem2CrudController&entityFqcn=App%5CEntity%5CItem&menuIndex=6&signature=_1YMBtKZQvfeCkkyuhVTUIIHrGXjl9TRvOtd4G47wek&submenuIndex=-1');
    }

    /**
     * @Route("/log/export", name="export_log")
     */
    function exportLog()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $th = [
            'A1' => '时间',
            'B1' => '编号',
            'C1' => '进出',
            'D1' => '器材列表',
            'E1' => '备注',
        ];
        foreach($th as $k => $v){
            $sheet->setCellValue($k, $v);
        }
        $logs = $this->getDoctrine()->getRepository(Log::class)->findAll();
        foreach($logs as $k => $v){
            $sheet->setCellValue('A' . ($k + 2), $v->getDate());
            $sheet->setCellValue('B' . ($k + 2), $v->getBox());
            $sheet->setCellValue('C' . ($k + 2), $v->getDirection());
            $sheet->setCellValue('E' . ($k + 2), $v->getNote());
        }
        date_default_timezone_set('Asia/Shanghai');
        $file = 'xlsx/进出记录' . date('YmdHis') . '.xlsx';
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save($file);

        return $this->file($file);
    }

    /**
     * @Route("/items/export", name="export_items")
     */
    function exportItems()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $th = [
            'A1' => '编号',
            'B1' => '名称',
            'C1' => '单位',
            'D1' => '当前库存',
            'E1' => '总库存',
        ];
        foreach($th as $k => $v){
            $sheet->setCellValue($k, $v);
        }
        $logs = $this->getDoctrine()->getRepository(Log::class)->findAll();
        foreach($logs as $k => $v){
            $sheet->setCellValue('A' . ($k + 2), $v->getDate());
            $sheet->setCellValue('B' . ($k + 2), $v->getBox());
            $sheet->setCellValue('C' . ($k + 2), $v->getDirection());
            $sheet->setCellValue('E' . ($k + 2), $v->getNote());
        }
        date_default_timezone_set('Asia/Shanghai');
        $file = 'xlsx/器材列表' . date('YmdHis') . '.xlsx';
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save($file);

        return $this->file($file);
    }
}
