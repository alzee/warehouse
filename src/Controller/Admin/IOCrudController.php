<?php

namespace App\Controller\Admin;

use App\Entity\Out;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class IOCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Out::class;
    }

    public function configureFields(string $pageName): iterable
    {
        if ($pageName === 'edit') {
            return [
                IdField::new('id')->onlyOnIndex(),
                AssociationField::new('item')->setFormTypeOption('disabled', true),
                IntegerField::new('quantity')->setFormTypeOption('disabled', true),
                TextField::new('who', 'Taker')->setFormTypeOption('disabled', true),
                TextareaField::new('note'),
                DateTimeField::new('createdAt', 'Out At')->setFormTypeOption('disabled', true),
                DateTimeField::new('backAt'),
            ];
        }

        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('item'),
            IntegerField::new('quantity'),
            TextField::new('who', 'Taker'),
            TextareaField::new('note'),
            DateTimeField::new('createdAt', 'Out At')->onlyOnIndex(),
            DateTimeField::new('createdAt', 'Out At')->onlyWhenCreating(),
            DateTimeField::new('backAt')->onlyOnIndex(),
            DateTimeField::new('backAt')->onlyWhenUpdating(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        $exportAction = Action::new('export', '导出记录')
            ->linkToCrudAction('exportXlsx')
            ->addCssClass('btn btn-primary')
            // ->setIcon('fa fa-user-check')
            ->createAsGlobalAction();

        return $actions
            ->add(Crud::PAGE_INDEX, $exportAction)
            ->disable(Action::DELETE)
            // ->update(Crud::PAGE_INDEX, Action::EDIT, fn (Action $action) => $action->displayIf(fn ($entity) => (null === $entity->getBackAt())))
        ;
    }

    public function exportXlsx()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $outs = $entityManager->getRepository(Out::class)->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Headers
        $sheet->setCellValue('A1', '编号');
        $sheet->setCellValue('B1', '名称');
        $sheet->setCellValue('C1', '数量');
        $sheet->setCellValue('D1', '单位');
        $sheet->setCellValue('E1', '领用人');
        $sheet->setCellValue('F1', '备注');
        $sheet->setCellValue('G1', '出库时间');
        $sheet->setCellValue('H1', '入库时间');

        // Data
        $row = 2;
        foreach ($outs as $o) {
            $sheet->setCellValue('A' . $row, $o->getId());
            $sheet->setCellValue('B' . $row, $o->getItem()->getName());
            $sheet->setCellValue('C' . $row, $o->getQuantity());
            $sheet->setCellValue('D' . $row, $o->getItem()->getUnit());
            $sheet->setCellValue('E' . $row, $o->getWho());
            $sheet->setCellValue('F' . $row, $o->getNote());
            $sheet->setCellValue('G' . $row, $o->getCreatedAt());
            $sheet->setCellValue('H' . $row, $o->getBackAt());
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        $file = '/tmp/出入库记录' . date('YmdHis') . '.xlsx';
        $writer->save($file);

        return $this->file($file);

        // $response = new StreamedResponse(
        //     function () use ($writer) {
        //         $writer->save('php://output');
        //     }
        // );

        // $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // $response->headers->set('Content-Disposition', $response->headers->makeDisposition(
        //     ResponseHeaderBag::DISPOSITION_ATTACHMENT,
        //     'chu_ru_ku.xlsx'
        // ));

        // return $response;
    }

    // public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    // {

    //     // $entityInstance->setBackAt(new \DateTimeImmutable());

    //     parent::updateEntity($entityManager, $entityInstance);
    // }
}
