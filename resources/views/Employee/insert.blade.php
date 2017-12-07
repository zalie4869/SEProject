<!-- Insert Employee Details -->
<form id="insertForm">
    <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="insert" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h3 class="modal-title custom_align" id="Heading"><center>เพิ่มข้อมูลพนักงาน</center></h3>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow:auto;">
                    <div class="form-group">
                        <label>รหัสพนักงาน</label>
                        <input type="text" class="form-control"  placeholder="กรุณากรอกรหัสพนักงาน" name="IDEmployee" style="width: 200px;" maxlength="10" required autofocus>
                    </div>
                    <div class="form-group"> 
                        <label >คำนำหน้าชื่อ</label>
                        <br><select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="NameTitle" name="NameTitle" onchange="changeNameTitle()" required>
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="Mr">นาย</option>
                            <option value="Mrs">นาง</option>
                            <option value="Miss">นางสาว</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control"  placeholder="กรุณากรอกชื่อ" name="FirstName" required>
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกนามสกุล" name="LastName" required>
                    </div>
                    <div class="form-group">
                        <label >ชื่อเล่น</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกชื่อเล่น" name="NickName">
                    </div>
                    <div class="form-group"> 
                        <label >เพศ</label><br>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="Gender" name="Gender">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="M">ชาย</option>
                            <option value="F">หญิง</option>
                        </select>
                    </div>
                    <div class="form-inline">
                        <label>หมู่เลือด</label><br>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="BloodType" name="BloodType" onchange="showBloodBox()">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                            <option value="Other">อื่นๆ</option>
                        </select>
                        <input type="text" class="form-control" id="OtherBloodType" name="OtherBloodType" placeholder="กรุณากรอกหมู่เลือด" style="width: 150px; display: none;">
                    </div><br>
                    <div class="form-group">
                        <label >วัน/เดือน/ปีเกิด</label>
                        <input class="form-control" type="date" name="BirthDate" id="example-date-input">
                    </div>
                    
                    <div class="form-group">
                        <label >ความสูง</label>
                        <input onkeypress='validate(event)' type="text" placeholder="กรุณากรอกความสูง" class="form-control" name="Height" min="0">
                    </div>
                    <div class="form-group">
                        <label >น้ำหนัก</label>
                        <input onkeypress='validate(event)' type="text" placeholder="กรุณากรอกน้ำหนัก" class="form-control" name="Weight" min="0">
                    </div>
                    <div class="form-group">
                        <label >โรคประจำตัว</label>
                        <input type="text" placeholder="กรุณากรอกโรคประจำตัว" class="form-control" name="Disease">
                    </div>
                    <div class="form-group">
                        <label>ตำแหน่ง</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="Position" required>
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="BranchManager">ผู้จัดการร้าน</option>
                            <option value="AssistantManager">ผู้ช่วยผู้จัดการ</option>
                            <option value="StaffFull-Time">พนักงานประจำ</option>
                            <option value="StaffPart-time">พนักงานชั่วคราว</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>สถานะการทำงาน</label>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="WorkingStatus" required>
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="Working">ทำงานอยู่</option>
                            <option value="Suspended">พักงาน</option>
                            <option value="NotWorking">ลาออก</option>
                            <option value="InviteOut">ถูกเชิญออก</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่ปัจจุบัน</label>
                        <textarea type="textarea" class="form-control" name="PresentAddress" placeholder="กรุณากรอกที่อยู่ปัจจุบัน" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>ประเภทที่อยู่</label><br>
                        <div class="form-inline">
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="Residence" name="Residence" onchange="showOtherResBox()">
                                <option value="" selected hidden>โปรดเลือก</option>
                                <option value="OwnHouse">บ้านตนเอง</option>
                                <option value="RentHouse">บ้านเช่า</option>
                                <option value="BoardingHouse">หอพัก</option>
                                <option value="StudentHousing">หอพักมหาวิทยาลัย</option>
                                <option value="Other">อื่นๆ</option>
                            </select>
                            <input type="text" class="form-control" id="OtherResidenceBox" name="OtherResidence" placeholder="กรุณากรอกประเภทที่อยู่กรณีอื่นๆ" style="width: 220px; display: none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label >หมายเลขโทรศัพท์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" class="form-control" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้" name="Phone" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label >E-mail</label>
                        <input type="email" class="form-control" placeholder="กรุณากรอก E-mail" name="Email">
                    </div>
                    <div class="form-group">
                        <label >หมายเลขบัตรบัตรประชาชน</label>
                        <input onkeypress='validate1(event)' type="text" class="form-control" placeholder="กรุณากรอกหมายเลขบัตรประชาชน" name="IDCardNo" maxlength="13" required>
                    </div>
                    <div class="form-group">
                        <label >วันที่ออกบัตร</label>
                        <input class="form-control" type="date" id="example-date-input" name="IssueDATE">
                    </div>
                    <div class="form-group">
                        <label >วันหมดอายุ</label>
                        <input class="form-control" type="date" id="example-date-input" name="ExpireDATE">
                    </div>
                    <div class="form-group">
                        <label >สัญชาติ</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกสัญชาติ" name="Nationality">
                    </div>
                    <div class="form-group">
                        <label >เชื้อชาติ</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกเชื้อชาติ" name="Race">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่ตามบัตรประชาชน</label>
                        <textarea type="textarea" class="form-control" name="Address" placeholder="กรุณากรอกที่อยู่ตามบัตรประชาชน" rows="3"></textarea>
                    </div>
                    <center>
                        <label>การศึกษาประถม</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" name="NamePrimary" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" name="LocatPrimary" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text" min="0" max="4" step="0.01" class="form-control" name="GPA_Primary" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษามัธยมต้น</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" name="NamSecondary" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" name="LocatSecondary" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text"  min="0" max="4" step="0.01" class="form-control" name="GPA_Secondary" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label>การศึกษามัธยมปลาย</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" name="NamHigh" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" name="LocatHigh" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" name="Major_High" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text"  min="0" max="4" step="0.01" class="form-control" name="GPA_High" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษาอาชีวศึกษา</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" name="NamVocational" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" name="LocatVocational" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" name="Major_Vocational" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text" min="0" max="4" step="0.01" class="form-control" name="GPA_Vocational" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษามหาวิทยาลัย</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" name="NamUniversity" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" name="LocatUniversity" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" name="Major_University" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text"  min="0" max="4" step="0.01" class="form-control" name="GPA_University" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >การศึกษาอื่นๆ</label>
                    </center>
                    <div class="form-group">
                        <label >ชื่อสถานศึกษา</label>
                        <input type="text" class="form-control" name="NamOther" placeholder="กรุณากรอกชื่อสถานศึกษา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่สถานศึกษา</label>
                        <textarea type="textarea" class="form-control" name="LocatOther" placeholder="กรุณากรอกที่อยู่สถานศึกษา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >สาขา/ภาควิชา</label>
                        <input type="text" class="form-control" name="Major_Other" placeholder="กรุณากรอกสาขา/ภาควิชา">
                    </div>
                    <div class="form-group">
                        <label >เกรดเฉลี่ย</label>
                        <input onkeypress='validate(event)' type="text"  min="0" max="4" step="0.01" class="form-control" name="GPA_Other" placeholder="กรุณากรอกเกรดเฉลี่ย">
                    </div>
                    <center>
                        <label >ประวัติครอบครัว</label>
                    </center><br>
                    <label >บิดา</label>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" name="FatherFirstName" placeholder="กรุณากรอกชื่อของบิดา">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" name="FatherLastName" placeholder="กรุณากรอกนามสกุลของบิดา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" name="FatherAddress" placeholder="กรุณากรอกที่อยู่ของบิดา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" name="FatherPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของบิดา">
                    </div>
                    <label >มารดา</label>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" name="MotherFirstName" placeholder="กรุณากรอกชื่อของมารดา">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" name="MotherLastName" placeholder="กรุณากรอกนามสกุลของมารดา">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" name="MotherAddress" placeholder="กรุณากรอกที่อยู่ของมารดา" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input  onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" name="MotherPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของมารดา">
                    </div>
                    <div class="form-group">
                        <label>สถานภาพสมรส</label><br>
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="MaritalStatus" name="MaritalStatus" onchange="changeMaritalStatus()">
                            <option selected hidden value="">โปรดเลือก</option>
                            <option value="Single">โสด</option>
                            <option value="Married">แต่งงาน</option>
                            <option value="Divorced">หย่าร้าง</option>
                            <option value="Widowed">หม้าย</option>
                            <option value="Separated">แยกกันอยู่</option>
                        </select>
                    </div>
                    <div id="MaritalStatusData">
                        <label>คู่สมรส</label>
                        <div class="form-group">
                            <label >ชื่อ</label>
                            <input type="text" class="form-control" id="SpouseFirstName" name="SpouseFirstName" placeholder="กรุณากรอกชื่อของคู่สมรส">
                        </div>
                        <div class="form-group">
                            <label >นามสกุล</label>
                            <input type="text" class="form-control" id="SpouseLastName" name="SpouseLastName" placeholder="กรุณากรอกนามสกุลของคู่สมรส">
                        </div>
                        <div class="form-group">
                            <label >ที่อยู่</label>
                            <textarea type="textarea" class="form-control" id="SpouseAddress" name="SpouseAddress" placeholder="กรุณากรอกที่อยู่ของคู่สมรส" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label >เบอร์ที่สามารถติดต่อได้</label>
                            <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" id="SpousePhone" name="SpousePhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของคู่สมรส">
                        </div>
                    </div>
                    <center><label >ประวัติบุคคลติดต่อกรณีฉุกเฉิน</label></center>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" name="PersonNotifyFirstName" placeholder="กรุณากรอกชื่อของบุคคลติดต่อกรณีฉุกเฉิน">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" name="PersonNotifyLastName" placeholder="กรุณากรอกนามสกุลของบุคคลติดต่อกรณีฉุกเฉิน">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" name="PersonNotifyAddress" placeholder="กรุณากรอกที่อยู่ของบุคคลติดต่อกรณีฉุกเฉิน" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" name="PersonNotifyPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของบุคคลติดต่อกรณีฉุกเฉิน">
                    </div>
                    <center><label >ประวัติบุคคลอ้างอิงการทำงาน</label></center>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" name="GuarantorFirstName" placeholder="กรุณากรอกชื่อของบุคคลอ้างอิงการทำงาน">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" name="GuarantorLastName" placeholder="กรุณากรอกนามสกุลของบุคคลอ้างอิงการทำงาน">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" name="GuarantorAddress" placeholder="กรุณากรอกที่อยู่ของบุคคลอ้างอิงการทำงาน" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" name="GuarantorPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของบุคคลอ้างอิงการทำงาน">
                    </div>
                    <center><label >ประวัติการทำงาน</label></center>
                    <div class="form-group">
                        <label >ชื่อสถานที่ทำงาน</label>
                        <input type="text" class="form-control" name="WorkExCompanyName" placeholder="กรุณากรอกสถานที่ทำงานเก่า">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <textarea type="textarea" class="form-control" name="WorkExAddress" placeholder="กรุณากรอกที่อยู่ของสถานที่ทำงานเก่า" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label >ตำแหน่ง</label>
                        <input type="text" class="form-control" name="WorkExPosition" placeholder="กรุณากรอกตำแหน่งของสถานที่ทำงานเก่า">
                    </div>
                    <div class="form-group">
                        <label >เบอร์ที่สามารถติดต่อได้</label>
                        <input onkeypress='validate1(event)' type="tel" maxlength="10" class="form-control" name="WorkExPhone" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่สามารถติดต่อได้ของสถานที่ทำงานเก่า">
                    </div>
                    <div class="form-group">
                        <label >เหตุผลที่ออกจากงาน</label>
                        <input type="text" class="form-control" name="WorkExReasonForLeaving" placeholder="กรุณากรอกเหตุผลที่ออกจากสถานที่ทำงานเก่า">
                    </div>
                </div> 
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-success btn-lg" id="clickInsert" style="width: 100%;">
                        <span class="glyphicon glyphicon-ok-sign"></span>&nbsp;เพิ่มข้อมูล
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Success -->
<div class="modal fade" id="InsertSuccess" role="dialog">
    <div class="modal-dialog modal-sm" style="top: 30%">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #ccffcc; border-radius: 4px; border-color: #009900; color: #008000;">
                <p><center>เพิ่มข้อมูลพนักงานเรียบร้อยแล้ว</center></p>
            </div>
        </div>
    </div>
</div>

<!-- Duplicate -->
<div class="modal fade" id="InsertDup" role="dialog">
    <div class="modal-dialog modal-sm" style="top: 30%">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #f2dede; border-radius: 4px; border-color: #ebccd1; color: #a94442;">
                <p><center id="dupTextInsert"></center></p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function changeMaritalStatus(){
        var MaritalStatus = document.getElementById("MaritalStatus").value;
        if(MaritalStatus === 'Single'){
            document.getElementById("MaritalStatusData").style.display = "none";
            document.getElementById("SpouseFirstName").value = '';
            document.getElementById("SpouseLastName").value = '';
            document.getElementById("SpouseAddress").value = '';
            document.getElementById("SpousePhone").value = '';

        }
        else{
            document.getElementById("MaritalStatusData").style.display = "block";
        }
    }

    function changeNameTitle(){
        var nameTitle = document.getElementById("NameTitle").value;
        if(nameTitle === 'Mrs' || nameTitle === 'Miss'){
            document.getElementById("Gender").value = 'F';
        }
        else if(nameTitle === 'Mr'){
            document.getElementById("Gender").value = 'M';
        }
    }

    function showBloodBox(){
        var selector = document.getElementById("BloodType");
        var box = document.getElementById('OtherBloodType');
        if(selector.value === 'Other'){
            box.style.display = 'inline';
        }
        else{
            box.style.display = 'none';
        }
    }
    function showOtherResBox(){
        var selector = document.getElementById("Residence");
        var box = document.getElementById('OtherResidenceBox');
        if(selector.value === 'Other'){
            box.style.display = 'inline';
        }
        else{
            box.style.display = 'none';
        }
    }

    function validate(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    function validate1(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]/;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }


</script>