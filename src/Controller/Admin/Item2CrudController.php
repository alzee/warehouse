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
        
        // Headers
        $sheet->setCellValue('A1', '编号');
        $sheet->setCellValue('B1', '名称');
        $sheet->setCellValue('C1', '单位');
        $sheet->setCellValue('D1', '盘点数量');

        // Data
        $row = 2;
        foreach ($items as $item) {
            $sheet->setCellValue('A' . $row, $item->getId());
            $sheet->setCellValue('B' . $row, $item->getName());
            $sheet->setCellValue('C' . $row, $item->getUnit());
            $sheet->setCellValue('D' . $row, null);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        $response = new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'pan_dian_dan.xlsx'
        ));

        return $response;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/index', 'count.html.twig')
            ->setPageTitle('index', '盘点录入')
            ;
    }

}
