<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editTasks.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-label" >
                        <input type="text" name="title" value="<?php echo $editTask->title; ?>" class="form-control" placeholder="Update Title">
                    </div>
                    <div class="form-label" >
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $editTask->description; ?></textarea>
                    </div>
                    <button class="btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>


</div>

<?php include("includes/footer.php") ?>