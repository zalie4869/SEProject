<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\IDCard;
use App\Education;
use App\Family;
use App\Guarantor;
use App\PersonNotify;
use App\WorkExperience;

class EmployeeController extends Controller
{
    public $limit = 6;

    public function Index(Request $request, $page){
      //dd($request);
      $start = 0;
      $limit = $this->limit;
      $Employees = new Employee;
      $sort = $request->input('sort');
      $d = $request->input('d');
      $lastPage = $Employees->count()/$limit;

      if($sort == null){
        $sort = 'IDEmployee';
      }
      if($d == null){
        $d = 'ASC';
      }

      if($request->search != null){
        $start = ($page-1)*$limit;
        $Employees = $Employees->where('IDEmployee', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('FirstName', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('LastName', 'LIKE', '%' . $request->search . '%');
        $lastPage = $Employees->count()/$limit;
      }
      else{

      }
      //dd($Employees->get());

      //convert float to int
      if(fmod($lastPage,1) > 0){
        $lastPage = intval($lastPage+1);
      }

      //if page input is not int then return
      if(!is_numeric($page)){
        return redirect('employee/1');
      }
      else if(fmod($page,1) != 0){
        return redirect('employee/1');
      }
      else if($page > 0 && $page <= $lastPage){
        $start = ($page-1)*$limit;
      }

      if($sort == 'IDEmployee'){
        if($d == 'ASC'){
          $Employees = $Employees->orderBy('IDEmployee','ASC')->offset($start)->limit($limit)->get();
        }
        else if($d == 'DESC'){
          $Employees = $Employees->orderBy('IDEmployee','DESC')->offset($start)->limit($limit)->get();
        }
        else{
          $Employees = $Employees->orderBy('IDEmployee','ASC')->offset($start)->limit($limit)->get();
        }
      }
      else if($sort == 'FirstName'){
        if($d == 'ASC'){
          $Employees = $Employees->orderBy('FirstName','ASC')->offset($start)->limit($limit)->get();
        }
        else if($d == 'DESC'){
          $Employees = $Employees->orderBy('FirstName','DESC')->offset($start)->limit($limit)->get();
        }
        else{
          $Employees = $Employees->orderBy('FirstName','ASC')->offset($start)->limit($limit)->get();
        }
      }
      else if($sort == 'LastName'){
        if($d == 'ASC'){
          $Employees = $Employees->orderBy('LastName','ASC')->offset($start)->limit($limit)->get();
        }
        else if($d == 'DESC'){
          $Employees = $Employees->orderBy('LastName','DESC')->offset($start)->limit($limit)->get();
        }
        else{
          $Employees = $Employees->orderBy('LastName','ASC')->offset($start)->limit($limit)->get();
        }
      }
      else if($sort == 'Position'){
        if($d == 'ASC'){
          $Employees = $Employees->orderBy('Position','ASC')->offset($start)->limit($limit)->get();
        }
        else if($d == 'DESC'){
          $Employees = $Employees->orderBy('Position','DESC')->offset($start)->limit($limit)->get();
        }
        else{
          $Employees = $Employees->orderBy('Position','ASC')->offset($start)->limit($limit)->get();
        }
      }
      else if($sort == 'WorkingStatus'){
        if($d == 'ASC'){
          $Employees = $Employees->orderByRaw("FIELD(WorkingStatus,'Working','Suspended','NotWorking','InviteOut') ASC")->offset($start)->limit($limit)->get();
        }
        else if($d == 'DESC'){
          $Employees = $Employees->orderByRaw("FIELD(WorkingStatus,'Working','Suspended','NotWorking','InviteOut') DESC")->offset($start)->limit($limit)->get();
        }
        else{
          $Employees = $Employees->orderByRaw("FIELD(WorkingStatus,'Working','Suspended','NotWorking','InviteOut') ASC")->offset($start)->limit($limit)->get();
        }
      }
      else{
        $Employees = $Employees->orderBy('IDEmployee')->offset($start)->limit($limit)->get();
      }
      //dd($request->search);
      //dd($Employees);;
    	return view('Employee.index')->with('Employees',$Employees)->with('lastPage',$lastPage)->with('page',$page)->with('sort',$sort)->with('search',$request->search);
    }

    public function GetData(Request $request){
    //dd($request->all() );

      $Employee = Employee::join('IDCard','IDCard.CardID','=','Employee.CardID')
                  ->join('Education','Education.EducationID','=','Employee.EducationID')
                  ->join('Family','Family.FamilyID','=','Employee.FamilyID')
                  ->join('WorkExperience','WorkExperience.WorkingExID','=','Employee.WorkingExID')
                  ->join('Guarantor','Guarantor.GuarantorID','=','Employee.GuarantorID')
                  ->join('PersonNotify','PersonNotify.PersonID','=','Employee.PersonID')
                  ->where('IDEmployee','=',$request->ID)
                  ->get();

      return response()->json(['success' => 'Get record successfully!',
                              'Employee' => $Employee]);
    }

    public function Edit(Request $request){
		  //dd($request->all());
      
      $Employee = Employee::where('IDEmployee','=',$request->ID)->first();
      $IDCard = IDCard::where('CardID','=',$Employee->CardID)->first();
      $Education = Education::where('EducationID','=',$Employee->EducationID)->first();
      $Family = Family::where('FamilyID','=',$Employee->FamilyID)->first();
      $Guarantor = Guarantor::where('GuarantorID','=',$Employee->GuarantorID)->first();
      $PersonNotify = PersonNotify::where('PersonID','=',$Employee->PersonID)->first();
      $WorkExperience = WorkExperience::where('WorkingExID','=',$Employee->WorkingExID)->first();

      if($request->data['IDEmployee'] != $Employee->IDEmployee){
        $nEmployee = Employee::where('IDEmployee','=',$request->data['IDEmployee'])->get()->count();
        if($nEmployee){
          return response()->json(['error' => 'IDEmployee']);
        }
      }

      if($request->data['IDCardNo'] != $IDCard->IDCardNo){
        $nIDCardNo = IDCard::where('IDCardNo','=',$request->data['IDCardNo'])->get()->count();
        if($nIDCardNo){
          return response()->json(['error' => 'IDCardNo']);
        }
      }

      $IDCard->IDCardNo = $request->data['IDCardNo'];
      $IDCard->IssueDATE = $request->data['IssueDATE'];
      $IDCard->ExpireDATE = $request->data['ExpireDATE'];
      $IDCard->Nationality = $request->data['Nationality'];
      $IDCard->Race = $request->data['Race'];
      $IDCard->IDCardAddress = $request->data['Address'];
      $IDCard->save();
      

      $Education->NamePrimary = $request->data['NamePrimary'];
      $Education->LocatPrimary = $request->data['LocatPrimary'];
      $Education->GPA_Primary = $request->data['GPA_Primary'];

      $Education->NamSecondary = $request->data['NamSecondary'];
      $Education->LocatSecondary = $request->data['LocatSecondary'];
      $Education->GPA_Secondary = $request->data['GPA_Secondary'];

      $Education->NamHigh = $request->data['NamHigh'];
      $Education->LocatHigh = $request->data['LocatHigh'];
      $Education->Major_High = $request->data['Major_High'];
      $Education->GPA_High = $request->data['GPA_High'];

      $Education->NamUniversity = $request->data['NamUniversity'];
      $Education->LocatUniversity = $request->data['LocatUniversity'];
      $Education->Major_University = $request->data['Major_University'];
      $Education->GPA_University = $request->data['GPA_University'];

      $Education->NamVocational = $request->data['NamVocational'];
      $Education->LocatVocational = $request->data['LocatVocational'];
      $Education->Major_Vocational = $request->data['Major_Vocational'];
      $Education->GPA_Vocational = $request->data['GPA_Vocational'];

      $Education->NamOther = $request->data['NamOther'];
      $Education->LocatOther = $request->data['LocatOther'];
      $Education->Major_Other = $request->data['Major_Other'];
      $Education->GPA_Other = $request->data['GPA_Other'];
      $Education->save();

      $Family->FatherFirstName = $request->data['FatherFirstName'];
      $Family->FatherLastName = $request->data['FatherLastName'];
      $Family->FatherAddress = $request->data['FatherAddress'];
      $Family->FatherPhone = $request->data['FatherPhone'];

      $Family->MotherFirstName = $request->data['MotherFirstName'];
      $Family->MotherLastName = $request->data['MotherLastName'];
      $Family->MotherAddress = $request->data['MotherAddress'];
      $Family->MotherPhone = $request->data['MotherPhone'];

      $Family->SpouseFirstName = $request->data['SpouseFirstName'];
      $Family->SpouseLastName = $request->data['SpouseLastName'];
      $Family->SpouseAddress = $request->data['SpouseAddress'];
      $Family->SpousePhone = $request->data['SpousePhone'];
      $Family->save();

      $Guarantor->GuarantorFirstName = $request->data['GuarantorFirstName'];
      $Guarantor->GuarantorLastName = $request->data['GuarantorLastName'];
      $Guarantor->GuarantorAddress = $request->data['GuarantorAddress'];
      $Guarantor->GuarantorPhone = $request->data['GuarantorPhone'];
      $Guarantor->save();

      $PersonNotify->PersonFirstName = $request->data['PersonNotifyFirstName'];
      $PersonNotify->PersonLastName = $request->data['PersonNotifyLastName'];
      $PersonNotify->PersonAddress = $request->data['PersonNotifyAddress'];
      $PersonNotify->PersonPhone = $request->data['PersonNotifyPhone'];
      $PersonNotify->save();

      $WorkExperience->CompanyName = $request->data['WorkExCompanyName'];
      $WorkExperience->WorkingExAddress = $request->data['WorkExAddress'];
      $WorkExperience->WorkingExPosition = $request->data['WorkExPosition'];
      $WorkExperience->WorkingExPhone = $request->data['WorkExPhone'];
      $WorkExperience->ReasonForLearing = $request->data['WorkExReasonForLeaving'];
      $WorkExperience->save();

      $Employee->IDEmployee = $request->data['IDEmployee'];
      $Employee->NameTitle = $request->data['NameTitle'];
      $Employee->FirstName = $request->data['FirstName'];
      $Employee->LastName = $request->data['LastName'];
      $Employee->NickName = $request->data['NickName'];
      $Employee->Gender = $request->data['Gender'];
      $Employee->BirthDate = $request->data['BirthDate'];
      $Employee->Height = $request->data['Height'];
      $Employee->Weight = $request->data['Weight'];
      $Employee->MaritalStatus = $request->data['MaritalStatus'];
      $Employee->BloodType = $request->data['BloodType'];
      $Employee->Disease = $request->data['Disease'];
      $Employee->Email = $request->data['Email'];
      $Employee->Phone = $request->data['Phone'];
      $Employee->Residence = $request->data['Residence'];
      $Employee->PresentAddress = $request->data['PresentAddress'];
      $Employee->Position = $request->data['Position'];
      $Employee->WorkingStatus = $request->data['WorkingStatus'];
      
      $Employee->save();

      return response()->json(['success' => 'Record has been edited successfully!',
                              'employee' => $Employee,
                               'Request' => $request->data]);
    }

    public function Insert(Request $request){
      //dd($request->all());

      $Employee = new Employee;
      $IDCard = new IDCard;
      $Education = new Education;
      $Family = new Family;
      $Guarantor = new Guarantor;
      $PersonNotify = new PersonNotify;
      $WorkExperience = new WorkExperience;

      $IDCard->IDCardNo = $request->IDCardNo;
      $IDCard->IssueDATE = $request->IssueDATE;
      $IDCard->ExpireDATE = $request->ExpireDATE;
      $IDCard->Nationality = $request->Nationality;
      $IDCard->Race = $request->Race;
      $IDCard->IDCardAddress = $request->Address;
      $IDCard->save();

      $Education->NamePrimary = $request->NamePrimary;
      $Education->LocatPrimary = $request->LocatPrimary;
      $Education->GPA_Primary = $request->GPA_Primary;

      $Education->NamSecondary = $request->NamSecondary;
      $Education->LocatSecondary = $request->LocatSecondary;
      $Education->GPA_Secondary = $request->GPA_Secondary;

      $Education->NamHigh = $request->NamHigh;
      $Education->LocatHigh = $request->LocatHigh;
      $Education->Major_High = $request->Major_High;
      $Education->GPA_High = $request->GPA_High;

      $Education->NamUniversity = $request->NamUniversity;
      $Education->LocatUniversity = $request->LocatUniversity;
      $Education->Major_University = $request->Major_University;
      $Education->GPA_University = $request->GPA_University;

      $Education->NamVocational = $request->NamVocational;
      $Education->LocatVocational = $request->LocatVocational;
      $Education->Major_Vocational = $request->Major_Vocational;
      $Education->GPA_Vocational = $request->GPA_Vocational;

      $Education->NamOther = $request->NamOther;
      $Education->LocatOther = $request->LocatOther;
      $Education->Major_Other = $request->Major_Other;
      $Education->GPA_Other = $request->GPA_Other;
      $Education->save();

      $Family->FatherFirstName = $request->FatherFirstName;
      $Family->FatherLastName = $request->FatherLastName;
      $Family->FatherAddress = $request->FatherAddress;
      $Family->FatherPhone = $request->FatherPhone;

      $Family->MotherFirstName = $request->MotherFirstName;
      $Family->MotherLastName = $request->MotherLastName;
      $Family->MotherAddress = $request->MotherAddress;
      $Family->MotherPhone = $request->MotherPhone;

      $Family->SpouseFirstName = $request->SpouseFirstName;
      $Family->SpouseLastName = $request->SpouseLastName;
      $Family->SpouseAddress = $request->SpouseAddress;
      $Family->SpousePhone = $request->SpousePhone;
      $Family->save();

      $Guarantor->GuarantorFirstName = $request->GuarantorFirstName;
      $Guarantor->GuarantorLastName = $request->GuarantorLastName;
      $Guarantor->GuarantorAddress = $request->GuarantorAddress;
      $Guarantor->GuarantorPhone = $request->GuarantorPhone;
      $Guarantor->save();

      $PersonNotify->PersonFirstName = $request->PersonNotifyFirstName;
      $PersonNotify->PersonLastName = $request->PersonNotifyLastName;
      $PersonNotify->PersonAddress = $request->PersonNotifyAddress;
      $PersonNotify->PersonPhone = $request->PersonNotifyPhone;
      $PersonNotify->save();

      $WorkExperience->CompanyName = $request->WorkExCompanyName;
      $WorkExperience->WorkingExAddress = $request->WorkExAddress;
      $WorkExperience->WorkingExPosition = $request->WorkExPosition;
      $WorkExperience->WorkingExPhone = $request->WorkExPhone;
      $WorkExperience->ReasonForLearing = $request->WorkExReasonForLeaving;
      $WorkExperience->save();

      $Employee->IDEmployee = $request->IDEmployee;
      $Employee->NameTitle = $request->NameTitle;
      $Employee->FirstName = $request->FirstName;
      $Employee->LastName = $request->LastName;
      $Employee->NickName = $request->NickName;
      $Employee->Gender = $request->Gender;
      $Employee->BirthDate = $request->BirthDate;
      $Employee->Height = $request->Height;
      $Employee->Weight = $request->Weight;
      $Employee->MaritalStatus = $request->MaritalStatus;
      $Employee->BloodType = $request->BloodType;
      $Employee->Disease = $request->Disease;
      $Employee->Email = $request->Email;
      $Employee->Phone = $request->Phone;
      $Employee->Residence = $request->Residence;
      $Employee->PresentAddress = $request->PresentAddress;
      $Employee->Position = $request->Position;
      $Employee->WorkingStatus = $request->WorkingStatus;

      $Employee->CardID = $IDCard->CardID;
      $Employee->EducationID = $Education->EducationID;
      $Employee->FamilyID = $Family->FamilyID;
      $Employee->PersonID = $PersonNotify->PersonID;
      $Employee->GuarantorID = $Guarantor->GuarantorID;
      $Employee->WorkingExID = $WorkExperience->WorkingExID;
      
      $Employee->save();

      return redirect('employee');
    }

    public function Destroy(Request $request){

      $employee = Employee::where('IDEmployee','=',$request->ID)->first();
      $IDCard = IDCard::where('CardID','=',$employee->CardID)->first();
      $Education = Education::where('EducationID','=',$employee->EducationID)->first();
      $Family = Family::where('FamilyID','=',$employee->FamilyID)->first();
      $Guarantor = Guarantor::where('GuarantorID','=',$employee->GuarantorID)->first();
      $PersonNotify = PersonNotify::where('PersonID','=',$employee->PersonID)->first();
      $WorkExperience = WorkExperience::where('WorkingExID','=',$employee->WorkingExID)->first();
      
      $employee->delete();
      $IDCard->delete();
      $Education->delete();
      $Family->delete();
      $Guarantor->delete();
      $PersonNotify->delete();
      $WorkExperience->delete();

      $limit = $this->limit;
      $sort = $request->sort;
      $d = $request->d;
      $content = 0;

      if($sort == null){
        $sort = 'IDEmployee';
      }
      if($d == null){
        $d = 'ASC';
      }

      $Employees = new Employee;

      if($request->page == $request->lastPage){
        $content = 0;
      }
      else{
        $content = 1;
        if($request->search != null){
          $Employees = $Employees->where('IDEmployee', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('FirstName', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('LastName', 'LIKE', '%' . $request->search . '%');
        }
        $Employees = $Employees->orderBy($sort,$d)->offset(($request->page*$limit)-1)->limit(1)->get();
      }
      
      return response()->json(['success' => 'Record has been deleted successfully!',
                              'content'  => $content,
                              'Employees'=> $Employees,
                              'sort'     => $sort,
                              'd'        => $d,
                              'search'   => $request->search,
                              'page'     => $request->page,
                              'lastPage' => $request->lastPage]);
    }

}
