<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Shape\Drawing;
use PhpOffice\PhpPresentation\Shape\Drawing\Base64;
use Storage;
use App\FlowHasUidata;
use App\Flow;

class ExportController extends Controller
{
    //
    public function generateppt($id){
        $flow = Flow::where('id',$id)->first();
        $flow_name = $flow->name;
        $uidatas = FlowHasUidata::where('flow_id',$id)->first();
        $content = $uidatas->written_content_data;
        $decoded = json_decode($content);

        $objPHPPresentation = new PhpPresentation();

        // $layout = $objPHPPresentation->getLayout();
        // $layout->setCX(8.5, $layout::UNIT_INCH);
        // $layout->setCY(14, $layout::UNIT_INCH);
        
        //create first table
        $currentSlide = $objPHPPresentation->getActiveSlide();

        $offY = 0;

        for ($i=0; $i < count($decoded); $i++) { 
            if ($decoded[$i] != null) {
                $offY = $offY+50;
                $shape = $currentSlide->createRichTextShape()
                                ->setHeight(50)
                                ->setWidth(700)
                                ->setOffsetX(20)
                                ->setOffsetY($offY);
            //$shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $textRun = $shape->createTextRun($decoded[$i]);
                $textRun->getFont()->setSize(12)
                                ->setName("Pyidaungsu");
            }
        }
        
        
        $oWriterPPTX = IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');
        $savepath = Storage::path("public");
        $oWriterPPTX->save($savepath. "/{$flow_name}.ppt");

        $myFile = storage_path("app/public/{$flow_name}.ppt");

    	return response()->download($myFile, "{$flow_name}.ppt")->deleteFileAfterSend(true);
    }
}
