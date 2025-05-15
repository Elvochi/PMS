<?php 
include 'db_connect.php';
if(isset($_GET['id'])){
    // Fetch Task Details
    $task_qry = $conn->query("SELECT t.*, concat(e.lastname,', ',e.firstname,' ',e.middlename) as name FROM task_list t INNER JOIN employee_list e ON e.id = t.employee_id WHERE t.id = ".$_GET['id'])->fetch_array();
    if($task_qry){
        foreach($task_qry as $k => $v){ 
            $$k = $v;
        }
    }

    // Fetch Evaluation Details
    $eval_qry = $conn->query("SELECT r.*, concat(e.lastname,', ',e.firstname,' ',e.middlename) as name, t.task, concat(ev.lastname,', ',ev.firstname,' ',ev.middlename) as ename, ((((r.efficiency + r.timeliness + r.quality + r.accuracy)/4)/5) * 100) as pa FROM ratings r INNER JOIN employee_list e ON e.id = r.employee_id INNER JOIN task_list t ON t.id = r.task_id INNER JOIN evaluator_list ev ON ev.id = r.evaluator_id WHERE r.task_id = ".$_GET['id'])->fetch_array();
    if($eval_qry){
        foreach($eval_qry as $k => $v){ 
            $$k = $v;
        }
    }
}
?>

<div class="container-fluid">
    <div class="col-lg-12">
        <!-- Task Details Section -->
        <div class="row">
            <div class="col-md-6">
                <dl>
                    <dt><b class="border-bottom border-primary">Task</b></dt>
                    <dd><?php echo ucwords($task) ?></dd>
                </dl>
                <dl>
                    <dt><b class="border-bottom border-primary">Assigned To</b></dt>
                    <dd><?php echo ucwords($name) ?></dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl>
                    <dt><b class="border-bottom border-primary">Due Date</b></dt>
                    <dd><?php echo date("m d,Y",strtotime($due_date)) ?></dd>
                </dl>
                <dl>
                    <dt><b class="border-bottom border-primary">Status</b></dt>
                    <dd>
                        <?php 
                        if($status == 0){
                            echo "<span class='badge badge-info'>Pending</span>";
                        }elseif($status == 1){
                            echo "<span class='badge badge-primary'>On-Progress</span>";
                        }elseif($status == 2){
                            echo "<span class='badge badge-success'>Complete</span>";
                        }
                        if(strtotime($due_date) < strtotime(date('Y-m-d'))){
                            echo "<span class='badge badge-danger mx-1'>Over Due</span>";
                        }
                        ?>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b class="border-bottom border-primary">Description</b></dt>
                    <dd><?php echo html_entity_decode($description) ?></dd>
                </dl>
            </div>
        </div>

        <!-- Evaluation Section (Only if available) -->
        <?php if(isset($ename)): ?>
        <hr>
        <h4 class="text-center mt-3">Evaluation Details</h4>
        <div class="row">
            <div class="col-md-6">
                <dl>
                    <dt><b class="border-bottom border-primary">Evaluator</b></dt>
                    <dd><?php echo ucwords($ename) ?></dd>
                </dl>
                <dl>
                    <dt><b class="border-bottom border-primary">Date Evaluated</b></dt>
                    <dd><?php echo date("m d,Y",strtotime($date_created)) ?></dd>
                </dl>
                <dl>
                    <dt><b class="border-bottom border-primary">Remarks</b></dt>
                    <dd><?php echo $remarks ?></dd>
                </dl>
            </div>
            <div class="col-md-6">
                <b>Ratings:</b>
                <dl>
                    <dt><b class="border-bottom border-primary">Efficiency</b></dt>
                    <dd><?php echo $efficiency ?></dd>
                </dl>
                <dl>
                    <dt><b class="border-bottom border-primary">Timeliness</b></dt>
                    <dd><?php echo $timeliness ?></dd>
                </dl>
                <dl>
                    <dt><b class="border-bottom border-primary">Quality</b></dt>
                    <dd><?php echo $quality ?></dd>
                </dl>
                <dl>
                    <dt><b class="border-bottom border-primary">Accuracy</b></dt>
                    <dd><?php echo $accuracy ?></dd>
                </dl>
                <dl>
                    <dt><b class="border-bottom border-primary">Performance Average</b></dt>
                    <dd><?php echo number_format($pa,2).'%' ?></dd>
                </dl>
            </div>
        </div>
        <?php else: ?>
        <p class="text-center text-muted mt-3"><i>No evaluation available for this task yet.</i></p>
        <?php endif; ?>
    </div>
</div>

<style>
    #uni_modal .modal-footer{
        display: none;
    }
    #uni_modal .modal-footer.display{
        display: flex;
    }
    #post-field{
        max-height: 70vh;
        overflow: auto;
    }
</style>

<div class="modal-footer display p-0 m-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
