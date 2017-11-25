<!-- Edit Employee Detail -->
<form id="editForm">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h3 class="modal-title custom_align" id="Heading"><center>แก้ไขข้อมูลพนักงาน</center></h3>
                    <br>
                    <center>
                        <div class="progress" id="loadingEdit" style="width:100%; display: none;">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                        </div>
                    </center>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow:auto;">
                    <div class="form-group">
                        <label>รหัสพนักงาน</label>
                        <input type="text" class="form-control"  placeholder="กรุณากรอกรหัสพนักงาน" id="IDEmployee2" name="IDEmployee" style="width: 200px;" maxlength="10" required autofocus>
                    </div>
                    <div class="form-group"> 
                        <label >คำนำหน้าชื่อ</label>
                        <br><select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="NameTitle2" name="NameTitle" onchange="changeNameTitle2()" required>
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="Mr">นาย</option>
                            <option value="Mrs">นาง</option>
                            <option value="Miss">นางสาว</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="FirstName2" placeholder="กรุณากรอกชื่อ" name="FirstName" required>
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="LastName2" placeholder="กรุณากรอกนามสกุล" name="LastName" required>
                    </div>
                    <div class="form-group">
                        <label >ชื่อเล่น</label>
                        <input type="text" class="form-control" id="NickName2" placeholder="กรุณากรอกชื่อเล่น" name="NickName">
                    </div>
                    <div class="form-group"> 
                        <label >เพศ</label><br>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="Gender2" name="Gender">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="M">ชาย</option>
                            <option value="F">หญิง</option>
                        </select>
                    </div>
                    <div class="form-inline">
                        <label>หมู่เลือด</label><br>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="BloodType2" name="BloodType" onchange="showBloodBox2()">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                            <option value="Other">อื่นๆ</option>
                        </select>
                        <input type="text" class="form-control" id="OtherBloodType2" name="OtherBloodType" placeholder="กรุณากรอกหมู่เลือด" style="width: 150px; display: none;">
                    </div><br>
                    <div class="form-group">
                        <label >วัน/เดือน/ปีเกิด</label>
                        <input class="form-control" type="date" name="BirthDate" id="BirthDate2">
                    </div>
                    
                    <div class="form-group">
                        <label >ความสูง</label>
                        <input type="number" placeholder="กรุณากรอกความสูง" class="form-control" id="Height2" name="Height">
                    </div>
                    <div class="form-group">
                        <label >น้ำหนัก</label>
                        <input type="number" placeholder="กรุณากรอกน้ำหนัก" class="form-control" id="Weight2" name="Weight">
                    </div>
                    <div class="form-group">
                        <label >โรคประจำตัว</label>
                        <input type="text" placeholder="กรุณากรอกโรคประจำตัว" class="form-control" id="Disease2" name="Disease">
                    </div>
                    <div class="form-group">
                        <label>ตำแหน่ง</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="Position2" name="Position" required>
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="BranchManager">ผู้จัดการร้าน</option>
                            <option value="AssistantManager">ผู้ช่วยผู้จัดการ</option>
                            <option value="StaffFull-Time">พนักงานประจำ</option>
                            <option value="StaffPart-time">พนักงานชั่วคราว</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>สถานะการทำงาน</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="WorkingStatus2" name="WorkingStatus" required>
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="Working">ทำงานอยู่</option>
                            <option value="Suspended">พักงาน</option>
                            <option value="NotWorking">ลาออก</option>
                            <option value="InviteOut">ถูกเชิญออก</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่ปัจจุบัน</label>
                        <textarea type="textarea" class="form-control" id="PresentAddress2" name="PresentAddress" placeholder="กรุณากรอกที่อยู่ปัจจุบัน" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>ประเภทที่อยู่</label><br>
                        <div class="form-inline">
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="Residence2" name="Residence" onchange="showOtherResBox2()">
                                <option value="" selected hidden>โปรดเลือก</option>
                                <option value="OwnHouse">บ้านตนเอง</option>
                                <option value="RentHouse">บ้านเช่า</option>
                                <option value="BoardingHouse">หอพัก</option>
                                <option value="StudentHousing">หอพักมหาวิทยาลัย</option>
                                <option value="Other">อื่นๆ</option>
                            </select>
                            <input type="text" class="form-control" id="OtherResidenceBox2" name="OtherResidence" placeholder="กรุณากรอกประเภทที่อยู่กรณีอื่นๆ" style="width: 220px; display: none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label >หมายเลขโทรศัพท์ที่สามารถติดต่อได้</label>
                        <input type="tel" class="form-control" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้" id="Phone2" name="Phone" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label >E-mail</label>
                        <input type="email" class="form-control" id="E-mail2" placeholder="กรุณากรอก E-mail" name="Email">
                    </div>
                    <div class="form-group">
                        <label >หมายเลขบัตรบัตรประชาชน</label>
                        <input type="text" class="form-control" id="IDCardNo2" placeholder="กรุณากรอกหมายเลขบัตรประชาชน" name="IDCardNo" maxlength="13" required>
                    </div>
                    <div class="form-group">
                        <label >วันที่ออกบัตร</label>
                        <input class="form-control" type="date" id="IssueDATE2" name="IssueDATE">
                    </div>
                    <div class="form-group">
                        <label >วันหมดอายุ</label>
                        <input class="form-control" type="date" id="ExpireDATE2" name="ExpireDATE">
                    </div>
                    <div class="form-group">
                        <label >สัญชาติ</label>
                        <input type="text" class="form-control" id="Nationality2" placeholder="กรุณากรอกสัญชาติ" name="Nationality">
                    </div>
                    <div class="form-group">
                        <label >เชื้อชาติ</label>
                        <input type="text" class="form-control" id="Race2" placeholder="กรุณากรอกเชื้อชาติ" name="Race">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่ตามบัตรประชาชน</label>
                        <textarea type="textarea" class="form-control" id="IDCardAddress2" name="Address" placeholder="กรุณากรอกที่อยู่ตามบัตรประชาชน" rows="3"></textarea>
                    </div>
                    <center>
                        <label>การศึกษาประถม</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamePrimary2" name="NamePrimary" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatPrimary2" name="LocatPrimary" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input type="number" min="0" max="4" step="0.01" id="GPA_Primary2" class="form-control" name="GPA_Primary" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษามัธยมต้น</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamSecondary2" name="NamSecondary" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatSecondary2" name="LocatSecondary" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input type="number" min="0" max="4" step="0.01" id="GPA_Secondary2" class="form-control" name="GPA_Secondary" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label>การศึกษามัธยมปลาย</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamHigh2" name="NamHigh" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatHigh2" name="LocatHigh" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" id="Major_High2" name="Major_High" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input type="number" min="0" max="4" step="0.01" id="GPA_High2" class="form-control" name="GPA_High" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษาอาชีวศึกษา</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamVocational2" name="NamVocational" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatVocational2" name="LocatVocational" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" id="Major_Vocational2" name="Major_Vocational" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input type="number" min="0" max="4" step="0.01" id="GPA_Vocational2" class="form-control" name="GPA_Vocational" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษามหาวิทยาลัย</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamUniversity2" name="NamUniversity" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatUniversity2" name="LocatUniversity" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" id="Major_University2" name="Major_University" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input type="number" min="0" max="4" step="0.01" id="GPA_University2" class="form-control" name="GPA_University" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษาอื่นๆ</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" id="NamOther2" name="NamOther" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" id="LocatOther2" name="LocatOther" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" id="Major_Other2" name="Major_Other" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input type="number" min="0" max="4" step="0.01" id="GPA_Other2" class="form-control" name="GPA_Other" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >ประวัติครอบครัว</label>
                    </center><br>
                    <label >บิดา</label>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="FatherFirstName2" name="FatherFirstName" placeholder="กรุณากรอกชื่อของบิดา">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="FatherLastName2" name="FatherLastName" placeholder="กรุณากรอกนามสกุลของบิดา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" id="FatherAddress2" name="FatherAddress" placeholder="กรุณากรอกที่อยู่ของบิดา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input type="tel" maxlength="10" class="form-control" id="FatherPhone2" name="FatherPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของบิดา">
                    </div>
                    <label >มารดา</label>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="MotherFirstName2" name="MotherFirstName" placeholder="กรุณากรอกชื่อของมารดา">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="MotherLastName2" name="MotherLastName" placeholder="กรุณากรอกนามสกุลของมารดา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" id="MotherAddress2" name="MotherAddress" placeholder="กรุณากรอกที่อยู่ของมารดา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input type="tel" maxlength="10" class="form-control" id="MotherPhone2" name="MotherPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของมารดา">
                    </div>
                    <div class="form-group">
                        <label>สถานภาพสมรส</label><br>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="MaritalStatus2" name="MaritalStatus" onchange="changeMaritalStatus2()">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="Single">โสด</option>
                            <option value="Married">แต่งงาน</option>
                            <option value="Divorced">หย่าร้าง</option>
                            <option value="Widowed">หม้าย</option>
                            <option value="Separated">แยกกันอยู่</option>
                        </select>
                    </div>
                    <div id="MaritalStatusData2">
                        <label>คู่สมรส</label>
                        <div class="form-group">
                            <label >ชื่อ</label>
                            <input type="text" class="form-control" id="SpouseFirstName2" name="SpouseFirstName" placeholder="กรุณากรอกชื่อของคู่สมรส">
                        </div>
                        <div class="form-group">
                            <label >นามสกุล</label>
                            <input type="text" class="form-control" id="SpouseLastName2" name="SpouseLastName" placeholder="กรุณากรอกนามสกุลของคู่สมรส">
                        </div>
                        <div class="form-group">
                            <label >ที่อยู่</label>
                            <textarea type="textarea" class="form-control" id="SpouseAddress2" name="SpouseAddress" placeholder="กรุณากรอกที่อยู่ของคู่สมรส" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label >เบอร์ที่สามารถติดต่อได้</label>
                            <input type="tel" maxlength="10" class="form-control" id="SpousePhone2" name="SpousePhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของคู่สมรส">
                        </div>
                    </div>
                    <center><label >ประวัติบุคคลติดต่อกรณีฉุกเฉิน</label></center>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="PersonFirstName2" name="PersonNotifyFirstName" placeholder="กรุณากรอกชื่อของบุคคลติดต่อกรณีฉุกเฉิน">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="PersonLastName2" name="PersonNotifyLastName" placeholder="กรุณากรอกนามสกุลของบุคคลติดต่อกรณีฉุกเฉิน">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" id="PersonAddress2" name="PersonNotifyAddress" placeholder="กรุณากรอกที่อยู่ของบุคคลติดต่อกรณีฉุกเฉิน" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input type="tel" maxlength="10" class="form-control" id="PersonPhone2" name="PersonNotifyPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของบุคคลติดต่อกรณีฉุกเฉิน">
                    </div>
                    <center><label >ประวัติบุคคลอ้างอิงการทำงาน</label></center>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="GuarantorFirstName2" name="GuarantorFirstName" placeholder="กรุณากรอกชื่อของบุคคลอ้างอิงการทำงาน">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="GuarantorLastName2" name="GuarantorLastName" placeholder="กรุณากรอกนามสกุลของบุคคลอ้างอิงการทำงาน">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" id="GuarantorAddress2" name="GuarantorAddress" placeholder="กรุณากรอกที่อยู่ของบุคคลอ้างอิงการทำงาน" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input type="tel" maxlength="10" class="form-control" id="GuarantorPhone2" name="GuarantorPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของบุคคลอ้างอิงการทำงาน">
                    </div>
                    <center><label >ประวัติการทำงาน</label></center>
                    <div class="form-group">
                        <label >ชื่อสถานที่ทำงาน</label>
                        <input type="text" class="form-control" id="CompanyName2" name="WorkExCompanyName" placeholder="กรุณากรอกสถานที่ทำงานเก่า">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" id="WorkingExAddress2" name="WorkExAddress" placeholder="กรุณากรอกที่อยู่ของสถานที่ทำงานเก่า" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >ตำแหน่ง</label>
                        <input type="text" class="form-control" id="WorkingExPosition2" name="WorkExPosition" placeholder="กรุณากรอกตำแหน่งของสถานที่ทำงานเก่า">
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input type="tel" maxlength="10" class="form-control" id="WorkingExPhone2" name="WorkExPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของสถานที่ทำงานเก่า">
                    </div>
                    <div class="form-group">
                        <label >เหตุผลที่ออกจากงาน</label>
                        <input type="text" class="form-control" id="ReasonForLearing2" name="WorkExReasonForLeaving" placeholder="กรุณากรอกเหตุผลที่ออกจากสถานที่ทำงานเก่า">
                    </div>
                </div> 
                <div class="modal-footer ">
                    <button type="submit" id="clickUpdate" class="btn btn-warning btn-lg" style="width: 100%;">
                        <span class="glyphicon glyphicon-ok-sign"></span>&nbsp;แก้ไข
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Success -->
<div class="modal fade" id="EditSuccess" role="dialog">
    <div class="modal-dialog modal-sm" style="top: 30%">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #ffdf80; border-radius: 4px; border-color: #e6ac00; color: #997300;">
                <p><center>แก้ไขข้อมูลพนักงานเรียบร้อยแล้ว</center></p>
            </div>
        </div>
    </div>
</div>

<!-- Duplicate -->
<div class="modal fade" id="EditDup" role="dialog">
    <div class="modal-dialog modal-sm" style="top: 30%">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #f2dede; border-radius: 4px; border-color: #ebccd1; color: #a94442;">
                <p><center id="dupTextEdit"></center></p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function changeMaritalStatus2(){
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

    function changeNameTitle2(){
        var nameTitle = document.getElementById("NameTitle2").value;
        if(nameTitle === 'Mrs' || nameTitle === 'Miss'){
            document.getElementById("Gender2").value = 'F';
        }
        else if(nameTitle === 'Mr'){
            document.getElementById("Gender2").value = 'M';
        }
    }

    function showBloodBox2(){
        var selector = document.getElementById("BloodType2");
        var box = document.getElementById('OtherBloodType2');
        if(selector.value === 'Other'){
            box.style.display = 'inline';
        }
        else{
            box.style.display = 'none';
        }
    }
    
    function showOtherResBox2(){
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