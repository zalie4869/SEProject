<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title custom_align" id="Heading">ลบข้อมูลพนักงาน</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="DelSure"></div>
                <center>
                    <div class="progress" id="loadingDelete" style="width:100%; display: none;">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                    </div>
                </center>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success" id="clickYes">
                    <span class="glyphicon glyphicon-ok-sign"></span>ใช่
                </button>
                <button type="button" class="btn btn-default" id="closeModal" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove">
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Success -->
<div class="modal fade" id="DelSuccess" role="dialog">
    <div class="modal-dialog modal-sm" style="top: 30%">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #f2dede; border-radius: 4px; border-color: #ebccd1; color: #a94442;">
                <p><center>ลบข้อมูลเรียบร้อยแล้ว</center></p>
            </div>
        </div>
    </div>
</div>