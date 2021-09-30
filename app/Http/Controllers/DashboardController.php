<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\School_Year;
use App\Period; 
use App\Sem;
use App\Speriod;
class DashboardController extends Controller
{
    public function __construct()
    {
    		$this->middleware('web');
    }
    public function dashboard()
    {
        $schoolyears=DB::select('SELECT Year from school__years where status=1');
        $sems=DB::select('SELECT sem from sems where status=1');
        $junior_periods=DB::select('SELECT period from periods where status=1');
        $senior_periods=DB::select('SELECT speriod from speriods where status=1');
        $clums=DB::select('SELECT curriculumname from clums where status=1');
        
        $sections= DB::select('SELECT DISTINCT yearlevels.grade , 
        COUNT(registrations.section_id) As student ,section__names.name 
        FROM registrations 
        LEFT JOIN sections on registrations.section_id=sections.id 
        LEFT JOIN section__names on sections.sectionname_id=section__names.id 
        LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id 
        LEFT JOIN school__years on sections.school_year_id=school__years.id 
        WHERE school__years.status=1 GROUP by yearlevels.grade,section__names.name  ');
        $students=DB::select('SELECT COUNT(registrations.id) as student
         FROM registrations 
         LEFT JOIN sections ON registrations.section_id=sections.id 
         LEFT JOIN school__years on sections.school_year_id=school__years.id 
         WHERE school__years.status=1 ');
         $seniorstudents=DB::select('SELECT COUNT(sregistrations.id) as senior FROM  sregistrations
         LEFT JOIN sections on sregistrations.section_id=sections.id
         left JOIN school__years on sections.school_year_id=school__years.id
         WHERE school__years.status=1');
          $totalstudents=DB::select('SELECT COUNT(id) as tstudent FROM students');
          $totalteachers=DB::select('SELECT COUNT(id) as teachers FROM teachers');
          $totalsections=DB::select('SELECT DISTiNCT sections.id ,section__names.name
          FROM registrations
          left JOIN sections on registrations.section_id=sections.id
          LEFT JOIN section__names on sections.sectionname_id=section__names.id
          LEFT JOIN school__years on sections.school_year_id=school__years.id
          WHERE school__years.status=1');
           $totalssections=DB::select('SELECT DISTiNCT sections.id,  section__names.name
           FROM sregistrations
           left JOIN sections on sregistrations.section_id=sections.id
           LEFT JOIN section__names on sections.sectionname_id=section__names.id
           LEFT JOIN school__years on sections.school_year_id=school__years.id
           left join sems on sections.semid=sems.id
           WHERE sems.status=1 and school__years.status=1');
        return view('layouts.dashbord')->with('sections',$sections)
        ->with('students',$students)
        ->with('schoolyears',$schoolyears)
        ->with('sems',$sems) 
        ->with('junior_periods',$junior_periods)
        ->with('senior_periods',$senior_periods)
        ->with('clums',$clums)
        ->with('seniorstudents',$seniorstudents)->with('totalstudents',$totalstudents)
        ->with('totalteachers',$totalteachers)
        ->with('totalsections',$totalsections)
        ->with('totalssections',$totalssections);
    	return view('layouts.master')->with('students',$students); 
    }
    public function dash() 
    {   
        //return view('layouts.dashbord')->with('sections',$sections);
       // $sections= DB::select('SELECT DISTINCT yearlevels.grade FROM registrations LEFT JOIN sections ON registrations.section_id=sections.id LEFT JOIN yearlevels on sections.yearlevelid=yearlevels.id LEFT JOIN school__years ON sections.school_year_id=school__years.id WHERE school__years.status=1
        //'); 
    }

}
