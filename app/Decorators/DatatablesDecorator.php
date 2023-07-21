<?php

namespace App\Decorators;

use CodeIgniter\View\ViewDecoratorInterface;

class DatatablesDecorator implements ViewDecoratorInterface
{
    public static function decorate(string $html): string
    {
        // Modify the output here
        $someExtraHtml = '';
        if (mb_strpos($html, 'initDatatable')) {
            $someExtraHtml .= '<link href="/assets/libraries/Datatables/datatables.min.css" rel="stylesheet">';
            // if (str_contains($html, 'pdfmake')) {
            //     $html .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>';
            //     $html .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>';
            //     // $html .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>';
            //     // $html .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>';
            // }
            $someExtraHtml .= '<script src="/assets/libraries/Datatables/datatables.min.js"></script>';
        }
        $html = $html.$someExtraHtml;
        return $html;
    }
}
