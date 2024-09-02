<!-- Modal for Top Up -->
<div class="modal fade" id="topUpModal<?php echo $row['member_user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="topUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topUpModalLabel">Top Up Amount (FROM COMPONENT)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="topUpForm<?php echo $row['member_user_id']; ?>">
                    <input type="hidden" id="userId" value="<?php echo $row['member_user_id']; ?>">
                    <div class="form-group">
                     <!-- <label for="topUpAmount"><h5 class="modal-title">Top Up Amount (FROM COMPONENT)</h5></label> -->
                        <select class="form-control" id="topUpAmount<?php echo $row['member_user_id']; ?>" required>
                            <option value="" disabled selected>Select amount</option>
                            <option value="100">100 USDT</option>
                            <option value="250">250 USDT</option>
                            <option value="500">500 USDT</option>
                            <option value="1000">100 USDT</option>
                            <option value="3000">3000 USDT</option>
                            <option value="5000">5000 USDT</option>
                            <option value="10000">10000 USDT</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary topUpButton" data-user-id="<?php echo $row['member_user_id']; ?>">Top Up</button>
                </form>
            </div>
        </div>
    </div>
</div>