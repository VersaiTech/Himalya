<!-- Modal for Top Up -->
<div class="modal fade" id="topUpModal<?php echo $row['member_user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="topUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topUpModalLabel"> Request Reject Reason </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="topUpForm<?php echo $row['member_user_id']; ?>">
                    <!-- <input type="text" id=""  placeholder="Enter Reject Reason"> -->
                    
                    <div class="form-group">
                     <!-- <label for="topUpAmount"><h5 class="modal-title">Top Up Amount (FROM COMPONENT)</h5></label> -->
                        <input class="form-control" placeholder="Enter Reject Reason" required />
                            
                    </div>
                    <button type="button" class="btn bg-danger topUpButton" data-user-id="<?php echo $row['member_user_id']; ?>">Reject</button>
                </form>
            </div>
        </div>
    </div>
</div>