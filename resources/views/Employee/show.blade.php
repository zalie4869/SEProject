<!-- Show Employee Detail -->
<form id="showForm">
    <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h3 class="modal-title custom_align" id="Heading"><center>ข้อมูลพนักงาน</center></h3>
                    <br>
                    <center>
                        <div class="progress" id="loadingShow" style="width:100%; display: none;">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                        </div>
                    </center>
                </div>
                <div class="modal-body" style="max-height: 80vh; overflow:auto;">
                    <div class="form-group">
                        <label>รหัสพนักงาน</label>
                        <input type="text" class="form-control"  placeholder="กรุณากรอกรหัสพนักงาน" id="IDEmployee3" name="IDEmployee" style="width: 200px;" maxlength="10" autofocus>
                    </div>
                    <div class="form-group"> 
                        <label >คำนำหน้าชื่อ</label>
                        <br><select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="NameTitle3" name="NameTitle" onchange="changeNameTitle3()">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="Mr">นาย</option>
                            <option value="Mrs">นาง</option>
                            <option value="Miss">นางสาว</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="FirstName3" placeholder="กรุณากรอกชื่อ" name="FirstName" required>
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="LastName3" placeholder="กรุณากรอกนามสกุล" name="LastName" required>
                    </div>
                    <div class="form-group">
                        <label >ชื่อเล่น</label>
                        <input type="text" class="form-control" id="NickName3" placeholder="กรุณากรอกชื่อเล่น" name="NickName">
                    </div>
                    <div class="form-group"> 
                        <label >เพศ</label><br>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="Gender3" name="Gender">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="M">ชาย</option>
                            <option value="F">หญิง</option>
                        </select>
                    </div>
                    <div class="form-inline">
                        <label>หมู่เลือด</label><br>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="BloodType3" name="BloodType" onchange="showBloodBox3()">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                            <option value="Other">อื่นๆ</option>
                        </select>
                        <input type="text" class="form-control" id="OtherBloodType3" name="OtherBloodType" placeholder="กรุณากรอกหมู่เลือด" style="width: 150px; display: none;">
                    </div><br>
                    <div class="form-group">
                        <label >วัน/เดือน/ปีเกิด</label>
                        <input class="form-control" type="date" name="BirthDate" id="BirthDate3">
                    </div>
                    
                    <div class="form-group">
                        <label >ความสูง (เซนติเมตร)</label>
                        <input onkeypress='validate(event)' type="text" placeholder="กรุณากรอกความสูง" min="0" class="form-control" id="Height3" name="Height">
                    </div>
                    <div class="form-group">
                        <label >น้ำหนัก (กิโลกรัม)</label>
                        <input onkeypress='validate(event)' type="text" placeholder="กรุณากรอกน้ำหนัก" min="0" class="form-control" id="Weight3" name="Weight">
                    </div>
                    <div class="form-group">
                        <label >โรคประจำตัว</label>
                        <input type="text" placeholder="กรุณากรอกโรคประจำตัว" class="form-control" id="Disease3" name="Disease">
                    </div>
                    <div class="form-group">
                        <label>ตำแหน่ง</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="Position3" name="Position">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="BranchManager">ผู้จัดการร้าน</option>
                            <option value="AssistantManager">ผู้ช่วยผู้จัดการ</option>
                            <option value="StaffFull-Time">พนักงานประจำ</option>
                            <option value="StaffPart-time">พนักงานชั่วคราว</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>สถานะการทำงาน</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="WorkingStatus3" name="WorkingStatus">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="Working">ทำงานอยู่</option>
                            <option value="Suspended">พักงาน</option>
                            <option value="NotWorking">ลาออก</option>
                            <option value="InviteOut">ถูกเชิญออก</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่ปัจจุบัน</label>
                        <textarea type="textarea" class="form-control" id="PresentAddress3" name="PresentAddress" placeholder="กรุณากรอกที่อยู่ปัจจุบัน" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>ประเภทที่อยู่</label><br>
                        <div class="form-inline">
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="Residence3" name="Residence" onchange="showOtherResBox3()">
                                <option value="" selected hidden>โปรดเลือก</option>
                                <option value="OwnHouse">บ้านตนเอง</option>
                                <option value="RentHouse">บ้านเช่า</option>
                                <option value="BoardingHouse">หอพัก</option>
                                <option value="StudentHousing">หอพักมหาวิทยาลัย</option>
                                <option value="Other">อื่นๆ</option>
                            </select>
                            <input type="text" class="form-control" id="OtherResidenceBox3" name="OtherResidence" placeholder="กรุณากรอกประเภทที่อยู่กรณีอื่นๆ" style="width: 220px; display: none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label >หมายเลขโทรศัพท์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" class="form-control" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้" id="Phone3" name="Phone" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label >E-mail</label>
                        <input type="email" class="form-control" id="E-mail3" placeholder="กรุณากรอก E-mail" name="Email">
                    </div>
                    <div class="form-group">
                        <label >หมายเลขบัตรบัตรประชาชน</label>
                        <input onkeypress='validate1(event)' type="text" class="form-control" id="IDCardNo3" placeholder="กรุณากรอกหมายเลขบัตรประชาชน" name="IDCardNo" maxlength="13" required>
                    </div>
                    <div class="form-group">
                        <label >วันที่ออกบัตร</label>
                        <input class="form-control" type="date" id="IssueDATE3" name="IssueDATE">
                    </div>
                    <div class="form-group">
                        <label >วันหมดอายุ</label>
                        <input class="form-control" type="date" id="ExpireDATE3" name="ExpireDATE">
                    </div>
                    <div class="form-group">
                        <label >สัญชาติ</label>
                        <input type="text" class="form-control" id="Nationality3" placeholder="กรุณากรอกสัญชาติ" name="Nationality">
                    </div>
                    <div class="form-group">
                        <label >เชื้อชาติ</label>
                        <input type="text" class="form-control" id="Race3" placeholder="กรุณากรอกเชื้อชาติ" name="Race">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่ตามบัตรประชาชน</label>
                        <textarea type="textarea" class="form-control" id="IDCardAddress3" name="Address" placeholder="กรุณากรอกที่อยู่ตามบัตรประชาชน" rows="3"></textarea>
                    </div>
                    <center>
                        <label>การศึกษาประถม</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamePrimary3" name="NamePrimary" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatPrimary3" name="LocatPrimary" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text"  min="0" max="4" step="0.01" id="GPA_Primary3" class="form-control" name="GPA_Primary" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษามัธยมต้น</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamSecondary3" name="NamSecondary" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatSecondary3" name="LocatSecondary" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text"  min="0" max="4" step="0.01" id="GPA_Secondary3" class="form-control" name="GPA_Secondary" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label>การศึกษามัธยมปลาย</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamHigh3" name="NamHigh" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatHigh3" name="LocatHigh" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" id="Major_High3" name="Major_High" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text"  min="0" max="4" step="0.01" id="GPA_High3" class="form-control" name="GPA_High" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษาอาชีวศึกษา</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamVocational3" name="NamVocational" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatVocational3" name="LocatVocational" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" id="Major_Vocational3" name="Major_Vocational" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text"  min="0" max="4" step="0.01" id="GPA_Vocational3" class="form-control" name="GPA_Vocational" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษามหาวิทยาลัย</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamUniversity3" name="NamUniversity" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatUniversity3" name="LocatUniversity" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" id="Major_University3" name="Major_University" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text"  min="0" max="4" step="0.01" id="GPA_University3" class="form-control" name="GPA_University" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษาอื่นๆ</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamOther3" name="NamOther" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatOther3" name="LocatOther" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" id="Major_Other3" name="Major_Other" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text"  min="0" max="4" step="0.01" id="GPA_Other3" class="form-control" name="GPA_Other" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >ประวัติครอบครัว</label>
                    </center><br>
                    <label >บิดา</label>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="FatherFirstName3" name="FatherFirstName" placeholder="กรุณากรอกชื่อของบิดา">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="FatherLastName3" name="FatherLastName" placeholder="กรุณากรอกนามสกุลของบิดา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" id="FatherAddress3" name="FatherAddress" placeholder="กรุณากรอกที่อยู่ของบิดา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" id="FatherPhone3" name="FatherPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของบิดา">
                    </div>
                    <label >มารดา</label>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="MotherFirstName3" name="MotherFirstName" placeholder="กรุณากรอกชื่อของมารดา">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="MotherLastName3" name="MotherLastName" placeholder="กรุณากรอกนามสกุลของมารดา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" id="MotherAddress3" name="MotherAddress" placeholder="กรุณากรอกที่อยู่ของมารดา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" id="MotherPhone3" name="MotherPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของมารดา">
                    </div>
                    <div class="form-group">
                        <label>สถานภาพสมรส</label><br>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="MaritalStatus3" name="MaritalStatus" onchange="changeMaritalStatus3()">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="Single">โสด</option>
                            <option value="Married">แต่งงาน</option>
                            <option value="Divorced">หย่าร้าง</option>
                            <option value="Widowed">หม้าย</option>
                            <option value="Separated">แยกกันอยู่</option>
                        </select>
                    </div>
                    <div id="MaritalStatusData3">
                        <label>คู่สมรส</label>
                        <div class="form-group">
                            <label >ชื่อ</label>
                            <input type="text" class="form-control" id="SpouseFirstName3" name="SpouseFirstName" placeholder="กรุณากรอกชื่อของคู่สมรส">
                        </div>
                        <div class="form-group">
                            <label >นามสกุล</label>
                            <input type="text" class="form-control" id="SpouseLastName3" name="SpouseLastName" placeholder="กรุณากรอกนามสกุลของคู่สมรส">
                        </div>
                        <div class="form-group">
                            <label >ที่อยู่</label>
                            <textarea type="textarea" class="form-control" id="SpouseAddress3" name="SpouseAddress" placeholder="กรุณากรอกที่อยู่ของคู่สมรส" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label >เบอร์ที่สามารถติดต่อได้</label>
                            <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" id="SpousePhone3" name="SpousePhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของคู่สมรส">
                        </div>
                    </div>
                    <center><label >ประวัติบุคคลติดต่อกรณีฉุกเฉิน</label></center>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="PersonFirstName3" name="PersonNotifyFirstName" placeholder="กรุณากรอกชื่อของบุคคลติดต่อกรณีฉุกเฉิน">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="PersonLastName3" name="PersonNotifyLastName" placeholder="กรุณากรอกนามสกุลของบุคคลติดต่อกรณีฉุกเฉิน">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" id="PersonAddress3" name="PersonNotifyAddress" placeholder="กรุณากรอกที่อยู่ของบุคคลติดต่อกรณีฉุกเฉิน" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" id="PersonPhone3" name="PersonNotifyPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของบุคคลติดต่อกรณีฉุกเฉิน">
                    </div>
                    <center><label >ประวัติบุคคลอ้างอิงการทำงาน</label></center>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="GuarantorFirstName3" name="GuarantorFirstName" placeholder="กรุณากรอกชื่อของบุคคลอ้างอิงการทำงาน">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="GuarantorLastName3" name="GuarantorLastName" placeholder="กรุณากรอกนามสกุลของบุคคลอ้างอิงการทำงาน">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" id="GuarantorAddress3" name="GuarantorAddress" placeholder="กรุณากรอกที่อยู่ของบุคคลอ้างอิงการทำงาน" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" id="GuarantorPhone3" name="GuarantorPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของบุคคลอ้างอิงการทำงาน">
                    </div>
                    <center><label >ประวัติการทำงาน</label></center>
                    <div class="form-group">
                        <label >ชื่อสถานที่ทำงาน</label>
                        <input type="text" class="form-control" id="CompanyName3" name="WorkExCompanyName" placeholder="กรุณากรอกสถานที่ทำงานเก่า">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" id="WorkingExAddress3" name="WorkExAddress" placeholder="กรุณากรอกที่อยู่ของสถานที่ทำงานเก่า" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >ตำแหน่ง</label>
                        <input type="text" class="form-control" id="WorkingExPosition3" name="WorkExPosition" placeholder="กรุณากรอกตำแหน่งของสถานที่ทำงานเก่า">
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" id="WorkingExPhone3" name="WorkExPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของสถานที่ทำงานเก่า">
                    </div>
                    <div class="form-group">
                        <label >เหตุผลที่ออกจากงาน</label>
                        <input type="text" class="form-control" id="ReasonForLearing3" name="WorkExReasonForLeaving" placeholder="กรุณากรอกเหตุผลที่ออกจากสถานที่ทำงานเก่า">
                    </div>
                </div> 
                <!-- <div class="modal-footer ">
                    <button type="submit" id="clickUpdate" class="btn btn-warning btn-lg" style="width: 100%;">
                        <span class="glyphicon glyphicon-ok-sign"></span>&nbsp;แก้ไข
                    </button>
                </div> -->
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">

    function changeMaritalStatus3(){
        var MaritalStatus = document.getElementById("MaritalStatus2").value;
        if(MaritalStatus === 'Single'){
            document.getElementById("MaritalStatusData2").style.display = "none";
            document.getElementById("SpouseFirstName2").value = '';
            document.getElementById("SpouseLastName2").value = '';
            document.getElementById("SpouseAddress2").value = '';
            document.getElementById("SpousePhone2").value = '';

        }
        else{
            document.getElementById("MaritalStatusData2").style.display = "block";
        }
    }

    function changeNameTitle3(){
        var nameTitle = document.getElementById("NameTitle2").value;
        if(nameTitle === 'Mrs' || nameTitle === 'Miss'){
            document.getElementById("Gender2").value = 'F';
        }
        else if(nameTitle === 'Mr'){
            document.getElementById("Gender2").value = 'M';
        }
    }

    function showBloodBox3(){
        var selector = document.getElementById("BloodType2");
        var box = document.getElementById('OtherBloodType2');
        if(selector.value === 'Other'){
            box.style.display = 'inline';
        }
        else{
            box.style.display = 'none';
        }
    }
    
    function showOtherResBox3(){
        var selector = document.getElementById("Residence2");
        var box = document.getElementById('OtherResidenceBox2');
        if(selector.value === 'Other'){
            box.style.display = 'inline';
        }
        else{
            box.style.display = 'none';
        }
    }

</script>