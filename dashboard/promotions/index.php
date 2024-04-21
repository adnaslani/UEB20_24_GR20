<?php
include('../includes/header.php');
include('../../classes/CRUD.php');



$crud = new CRUD;
$promotions = $crud->read('promotions');

if (isset($_GET['action']) && ($_GET['action'] === 'delete')) {
    $promotion = $crud->read('promotions', ['column' => 'id', 'value' => $_GET['id']])[0];
    unlink('images/' . $promotion['image']);
    if ($crud->delete('promotions', ['column' => 'id', 'value' => $_GET['id']])) {
        echo 'success';
        exit;
    }
}
?>

<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Slides</h3>

        <a href="create.php" class="btn btn-outline-dark mb-4">Create slide</a>

        <?php if ($promotions && count($promotions)) : ?>
            <div class="card">
                <div class="card-body">
                    <?php if (isset($_GET['action']) && isset($_GET['status'])) : ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <?php if (($_GET['action'] === 'create') && ($_GET['status'] === 'success')) : ?>
                                Promotion was created successfully.
                            <?php endif; ?>
                            <?php if (($_GET['action'] === 'update') && ($_GET['status'] === 'success')) : ?>
                                Promotion was updated successfully.
                            <?php endif; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-borderd">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Is active?</th>
                                    <th></th>
                                </tr>
                                <?php foreach ($promotions as $promotion) : ?>
                                    <tr>
                                        <td><?= $promotion['id'] ?></td>
                                        <td>
                                            <img src="images/<?= $promotion['image'] ?>" height="80">
                                        </td>
                                        <td><?= $promotion['title'] ?></td>
                                        <td><?= $promotion['subtitle'] ?></td>
                                        <td><?= ($promotion['is_active'] === 1) ? 'Yes' : 'No' ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $promotion['id'] ?>">Edit</a>
                                            <a href="delete.php" onclick="deletePromotion(<?= $promotion['id'] ?>)">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function deletePromotion(promotionId) {
        if (confirm('Are you sure?')) {
            $.ajax({
                url: 'delete.php',
                method: 'GET',
                data: { action: 'delete', id: promotionId },
                success: function(response) {
                    // Handle the response here
                    if (response === 'success') {
                        // Remove the deleted promotion from the UI
                        $('#promotion_' + promotionId).remove();
                        // Optionally, display a success message
                        $('#delete_success_message').show();
                    }
                }
            });
        }
    }
</script>


<?php include('../includes/footer.php'); ?>
