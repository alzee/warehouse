<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Item2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Item::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name')->onlyOnIndex(),
            TextField::new('unit')->onlyOnIndex(),
            IntegerField::new('count'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        $exportAction = Action::new('export', '导出盘点单')
            ->linkToCrudAction('exportXlsx')
            ->addCssClass('btn btn-primary')
            // ->setIcon('fa fa-user-check')
            ->createAsGlobalAction();

        return $actions
            ->add(Crud::PAGE_INDEX, $exportAction)
            ->remove(Crud::PAGE_INDEX, 'new')
            ->remove(Crud::PAGE_INDEX, 'delete')
        ;
    }

    public function exportXlsx()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $items = $entityManager->getRepository(Item::class)->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Title
        $sheet->setCellValue('A1', '盘点单');
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:D1')->getFont()->setBold(true);
        
        // Headers
        $sheet->setCellValue('A2', '编号');
        $sheet->setCellValue('B2', '名称');
        $sheet->setCellValue('C2', '单位');
        $sheet->setCellValue('D2', '盘点数量');

        // Data
        $row = 3;
        foreach ($items as $item) {
            $sheet->setCellValue('A' . $row, $item->getId());
            $sheet->setCellValue('B' . $row, $item->getName());
            $sheet->setCellValue('C' . $row, $item->getUnit());
            $sheet->setCellValue('D' . $row, null);
            $row++;
        }

        // Auto size columns
        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Add borders to cells
        $styleArray =[
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000000'],
                ]
            ]
        ];

        $sheet->getStyle('A2:D' . ($row - 1))->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);

        $file = '/tmp/盘点单' . date('YmdHis') . '.xlsx';
        $writer->save($file);

        return $this->file($file);

        // $response = new StreamedResponse(
        //     function () use ($writer) {
        //         $writer->save('php://output');
        //     }
        // );

        // // Setting the filename with a UTF-8 encoded name and an ASCII fallback
        // $utf8Filename = '盘点单.xlsx';
        // $asciiFallbackFilename = 'pan_dian_dan.xlsx';
        // $disposition = $response->headers->makeDisposition(
        //     ResponseHeaderBag::DISPOSITION_ATTACHMENT,
        //     $asciiFallbackFilename,
        //     // $utf8Filename
        // );

        // $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // $response->headers->set('Content-Disposition', $disposition);

        // return $response;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/index', 'count.html.twig')
            ->setPageTitle('index', '盘点录入')
            ;
    }

}
