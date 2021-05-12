<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSchoolRelatedInfo;
use App\ClassSchedules;
use App\ClassSchedulesSubjects;
use App\GradeAndSubjects;
use App\Enrolled;
use App\StudentGrades;
use App\Payments;
use PDF;

class PdfController extends Controller
{
    public function schedulePdf($id)
    {
        $classSched = ClassSchedules::find($id);

        $mondaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Monday')->orderBy('timeFrom')->get();
        $teusdaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Teusday')->orderBy('timeFrom')->get();
        $wednesdaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Wednesday')->orderBy('timeFrom')->get();
        $thursdaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Thursday')->orderBy('timeFrom')->get();
        $fridaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Friday')->orderBy('timeFrom')->get();
    
        $pdf = PDF::loadView('Pdf.schedule', compact('classSched','mondaySched','teusdaySched','wednesdaySched','thursdaySched','fridaySched'))
        ->setPaper('Letter', 'landscape')
        ->setOption('margin-top','5mm')
        ->setOption('margin-bottom','0mm')
        ->setOption('margin-left','5mm')
        ->setOption('margin-right','5mm');
        return $pdf->inline('schedule.pdf');

    }
    public function gradePdf($id)
    {
        $enrolled = Enrolled::find($id);

        $studentGrades = StudentGrades::where('enrolledId',$id)->get();
        
        $pdf = PDF::loadView('Pdf.grade', compact('enrolled','studentGrades'))
        ->setPaper('Letter', 'landscape')
        ->setOption('margin-top','5mm')
        ->setOption('margin-bottom','5mm')
        ->setOption('margin-left','5mm')
        ->setOption('margin-right','5mm');
        return $pdf->inline('grade.pdf');

    }
    public function accountingPdf($id)
    {
        $enrolled = Enrolled::find($id);

        $payments = Payments::where('enrolledId',$id)->get();
    
        $pdf = PDF::loadView('Pdf.accounting', compact('enrolled','payments'))
        ->setPaper('Letter', 'landscape')
        ->setOption('margin-top','5mm')
        ->setOption('margin-bottom','5mm')
        ->setOption('margin-left','5mm')
        ->setOption('margin-right','5mm');
        return $pdf->inline('accounting.pdf');

    }
}
