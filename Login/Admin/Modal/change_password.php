<!-- Modal -->
<div class="modal fade" id="changeModal<?php echo $result['id'];?>" tabindex="-1" aria-labelledby="changeModal"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="./database/edit_controller/password_change.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeModal">Change password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="Id" value="<?php echo $result['id'];?>">
                    <div class="col-lg-12 col-12">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="new_password"
                                name="new_password" placeholder="new_password" required>
                            <label for="floatingInput">New password</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning" name="submit" id="submit">Change</button>
                </div>
            </div>
        </form>
    </div>
</div>