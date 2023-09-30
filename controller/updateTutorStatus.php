<?php

include('../php/database.php');
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $tutor_id = $_GET['id'];
    $sql1 = $conn->query("SELECT *, CONCAT(lastname,', ',firstname , COALESCE(concat(' ', middlename), '')) as `name` FROM `tutor_list`  WHERE id = '$tutor_id'");
    $row1 = $sql1->fetch_assoc();
}
?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-check-square"></i> Update Tutor's Status </h5>
    </div>
    <form action="../controller/updateTutorStatus.php" method="post">
        <div class="modal-body">
            <div class="container-fluid">

                <input type="hidden" name="id" value="<?php echo $tutor_id ?>">
                <div class="form-group">
                    <label for="status" class="control-label">Status</label>
                    <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                        <option value="0" <?php echo $row1['status'] == 0 ? 'selected' : '' ?>>Pending
                        </option>
                        <option value="1" <?php echo $row1['status'] == 1 ? 'selected' : '' ?>>Verified
                        </option>
                        <option value="2" <?php echo $row1['status'] == 2 ? 'selected' : '' ?>>Block</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $tutor_id = $_POST['id'];
    $status = $_POST['status'];
    $sql = $conn->query("Update tutor_list set status ='$status' where id=$tutor_id");
    if ($status == 1) {
        $sql = $conn->query("Update course_request set delete_flag ='0' where tutor_id=$tutor_id");
    } else if ($status == 0 || $status == 2) {
        $sql = $conn->query("Update course_request set delete_flag ='1' where tutor_id=$tutor_id");
    }
    header("location:../admin/tutor_view.php?id=$tutor_id");
} ?>