<?php
include "connection.php";
require_once "controllerUserData.php";
require_once "checklogin.php";

$tablename = $_SESSION['tablename'];

if(isset($_POST['stud_delete_multiple_btn']))
{
    $all_id = $_POST['stud_delete_id'];
    $extract_id = implode(',' , $all_id);
    echo $extract_id;

    $query = "DELETE FROM $tablename WHERE id IN($extract_id) ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Deleted Successfully";
        header("Location: candidate.php");
    }
    else
    {
        $_SESSION['status'] = "Multiple Data Not Deleted";
        header("Location: candidate.php");
    }
}
?>

<?php
if(isset($_POST['stud_delete_multiple_btn']))
{
    $all_id = $_POST['stud_delete_id'];
    $extract_id = implode(',' , $all_id);
    echo $extract_id;

    $query = "DELETE FROM $tablename WHERE id IN($extract_id) ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Deleted Successfully";
        header("Location: candidate.php");
    }
    else
    {
        $_SESSION['status'] = "Multiple Data Not Deleted";
        header("Location: candidate.php");
    }
}
?>


<?php echo ' 
  
  <tr class="alert" role="alert">
      <td>
        <label class="checkbox-wrap checkbox-primary">
       

          <input type="checkbox" name="stud_delete_id[]" value="' . $row["id"] . '" />';
          ?>


<form action="code.php" method="POST">

    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete Candidate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>

                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the selected records?</p>
                    <p class="text-warning">
                        <small>This action cannot be undone.</small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />

                    <button type="submit" name="stud_delete_multiple_btn" class="btn btn-danger">Delete</button>

                </div>

            </div>
        </div>
    </div>



    </tbody>
    </table>

</form>