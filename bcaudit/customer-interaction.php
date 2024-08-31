<?php 
    $pageTitle="Customer Interaction Audit Form";
    include "include/navbar.php";
    include "codes/verify_audit_session.php"; 
?>
    <style>
        .card {
            border: 1px solid var(--card-border);
            border-radius: 5px;
        }
        .card-header{
            background-color: var(--grey-black);
        }
        .card-title {
            color: var(--black-color);
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-body{
            background-color: var(--card-body);
        }
        .card-footer{
            background-color: var(--card-footer);
        }
        .customer-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border: 1px solid #424242;
            border-radius: 5px;
            margin-bottom: 10px;
            color: #424242;
        }
        .customer-item span {
            flex-grow: 1;
        }
        .customer-item button {
            margin-left: 10px;
        }
    </style>

<div class="container-fluid mt-2 px-0">
    <div class="card shadow-sm mx-auto" style="max-width: 800px;">
        <div class="card-header">
            <h4 class="card-title text-center"><i class="fa-solid fa-users"></i> Customer Interaction (minimum-5)</h4>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-8"> <!-- Adjust the column width for medium screens -->
                    <div id="customer-list">
                        <!-- Dynamic customer list will be appended here -->
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-info mt-5 mb-5" data-toggle="modal" data-target="#addCustomerModal"><i class="fa-solid fa-plus"></i> Add Customer Response</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center"> <!-- Center align buttons on all screen sizes -->
            <button type="button" class="btn btn-secondary mr-5" id="backButton">Previous</button>
            <button id="submitButton" type="submit" class="btn btn-success ml-5" disabled>Confirm & Next</button>
        </div>
    </div>
    </div>


</div>

<!-- Add Customer Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalLabel">Add Customer Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="customerForm">
                    <div class="form-group">
                        <label for="customerName">Customer Name</label>
                        <input type="text" class="form-control" id="customerName" name="customerName" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="customerEmail">Customer Email</label>
                        <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
                    </div> -->
                    <div class="form-group">
                        <label for="customerPhone">Customer Phone</label>
                        <input type="text" class="form-control" id="customerPhone" name="customerPhone" required>
                    </div>
                    <div class="form-group">
                        <label>1. CSP opens daily and transactions of customers are carried out from 10 am to 4 pm</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="csp_opening_hours" id="csp_opening_hours_yes" value="Yes">
                                <label class="form-check-label" for="csp_opening_hours_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="csp_opening_hours" id="csp_opening_hours_no" value="No">
                                <label class="form-check-label" for="csp_opening_hours_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="csp_opening_hours_remarks" name="csp_opening_hours_remarks"  placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>2. BCA sits regularly inside the CSP and he/she only allows transactions, no one else in his/her place allows transactions</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bca_sits_regularly" id="bca_sits_regularly_yes" value="Yes">
                                <label class="form-check-label" for="bca_sits_regularly_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bca_sits_regularly" id="bca_sits_regularly_no" value="No">
                                <label class="form-check-label" for="bca_sits_regularly_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="bca_sits_regularly_remarks" name="bca_sits_regularly_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>3. BCA provides system generated slip in case of Cash deposit/withdrawal after transaction</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="system_generated_slip" id="system_generated_slip_yes" value="Yes">
                                <label class="form-check-label" for="system_generated_slip_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="system_generated_slip" id="system_generated_slip_no" value="No">
                                <label class="form-check-label" for="system_generated_slip_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="system_generated_slip_remarks" name="system_generated_slip_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>4. BCA takes your signature/thumb impression in a register after transaction</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="signature_register" id="signature_register_yes" value="Yes">
                                <label class="form-check-label" for="signature_register_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="signature_register" id="signature_register_no" value="No">
                                <label class="form-check-label" for="signature_register_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="signature_register_remarks" name="signature_register_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>5. BCA makes manual entry in your passbook or prints passbook through printer (In case passbook printer is available)</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="passbook_entry" id="passbook_entry_yes" value="Yes">
                                <label class="form-check-label" for="passbook_entry_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="passbook_entry" id="passbook_entry_no" value="No">
                                <label class="form-check-label" for="passbook_entry_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="passbook_entry_remarks" name="passbook_entry_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>6. How do you confirm your balance, whether you visit the branch to update your passbook and if yes at which interval?</label>
                        <textarea class="form-control" id="balance_confirmation" name="balance_confirmation" placeholder="Enter your answer" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>7. Passbook may be checked to see any manual entry if customer is ready to show it</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="passbook_check" id="passbook_check_yes" value="Yes">
                                <label class="form-check-label" for="passbook_check_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="passbook_check" id="passbook_check_no" value="No">
                                <label class="form-check-label" for="passbook_check_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="passbook_check_remarks" name="passbook_check_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>8. BCA demands any fee to open account or to perform any transaction</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fee_demand" id="fee_demand_yes" value="Yes">
                                <label class="form-check-label" for="fee_demand_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fee_demand" id="fee_demand_no" value="No">
                                <label class="form-check-label" for="fee_demand_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="fee_demand_remarks" name="fee_demand_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>9. Are you satisfied with the services and behavior of the BCA</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="satisfaction" id="satisfaction_yes" value="Yes">
                                <label class="form-check-label" for="satisfaction_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="satisfaction" id="satisfaction_no" value="No">
                                <label class="form-check-label" for="satisfaction_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="satisfaction_remarks" name="satisfaction_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>10. Anything that the customer wants to disclose for BCA (Optional)</label>
                        <textarea class="form-control" id="additional_comments" rows="3" name="additional_comments" placeholder="Enter your answer"></textarea>
                    </div>
                    <div class="form-group">
                        <label>11. BCA is giving cash immediately in case of cash withdrawal or some delay is there</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cash_withdrawal_delay" id="cash_withdrawal_delay_yes" value="Yes">
                                <label class="form-check-label" for="cash_withdrawal_delay_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cash_withdrawal_delay" id="cash_withdrawal_delay_no" value="No">
                                <label class="form-check-label" for="cash_withdrawal_delay_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="cash_withdrawal_delay_remarks" name="cash_withdrawal_delay_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>

                    <!-- signature area -->
                    
                    <div class="col-md-6 form-group dark">
        <div>
            <label for="bcSignaturePhotoPreview">BC Signature.</label>
        </div>
        <div>
            <img id="bcSignaturePhotoPreview" class="mt-2 mb-3 img-thumbnail" src="default-image.png" alt="Image preview">
        </div>
        <div>
            <a class="btn btn-primary mr-2" id="openSignatureModalBtn" data-toggle="modal" data-target="#signatureModal">Take BCA Signature</a>
        </div>
        <input type="hidden" id="bcSignaturePhotoBase64" name="bcSignaturePhoto" required>
    </div>
    <!-- signature area end -->
                    <div class="d-flex mt-2 justify-content-center">
                        <button type="button" class="btn btn-secondary mr-5" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ml-5">Save & Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Customer Modal -->
<div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCustomerForm">
                    <div class="form-group">
                        <label for="editCustomerName">Customer Name</label>
                        <input type="text" class="form-control" name="customerName" id="editCustomerName" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="editCustomerEmail">Customer Email</label>
                        <input type="email" class="form-control" id="editCustomerEmail" name="editCustomerEmail" required>
                    </div> -->
                    <div class="form-group">
                        <label for="editCustomerPhone">Customer Phone</label>
                        <input type="text" class="form-control" id="editCustomerPhone" name="editCustomerPhone" required>
                    </div>
                    <div class="form-group">
                        <label>1. CSP opens daily and transactions of customers are carried out from 10 am to 4 pm</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_csp_opening_hours" id="edit_csp_opening_hours_yes" value="Yes">
                                <label class="form-check-label" for="edit_csp_opening_hours_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_csp_opening_hours" id="edit_csp_opening_hours_no" value="No">
                                <label class="form-check-label" for="edit_csp_opening_hours_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="edit_csp_opening_hours_remarks" name="edit_csp_opening_hours_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>2. BCA sits regularly inside the CSP and he/she only allows transactions, no one else in his/her place allows transactions</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_bca_sits_regularly" id="edit_bca_sits_regularly_yes" value="Yes">
                                <label class="form-check-label" for="edit_bca_sits_regularly_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_bca_sits_regularly" id="edit_bca_sits_regularly_no" value="No">
                                <label class="form-check-label" for="edit_bca_sits_regularly_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="edit_bca_sits_regularly_remarks" name="edit_bca_sits_regularly_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>3. BCA provides system generated slip in case of Cash deposit/withdrawal after transaction</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_system_generated_slip" id="edit_system_generated_slip_yes" value="Yes">
                                <label class="form-check-label" for="edit_system_generated_slip_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_system_generated_slip" id="edit_system_generated_slip_no" value="No">
                                <label class="form-check-label" for="edit_system_generated_slip_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="edit_system_generated_slip_remarks" name="edit_system_generated_slip_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>4. BCA takes your signature/thumb impression in a register after transaction</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_signature_register" id="edit_signature_register_yes" value="Yes">
                                <label class="form-check-label" for="edit_signature_register_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_signature_register" id="edit_signature_register_no" value="No">
                                <label class="form-check-label" for="edit_signature_register_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="edit_signature_register_remarks" name="edit_signature_register_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>5. BCA makes manual entry in your passbook or prints passbook through printer (In case passbook printer is available)</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_passbook_entry" id="edit_passbook_entry_yes" value="Yes">
                                <label class="form-check-label" for="edit_passbook_entry_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_passbook_entry" id="edit_passbook_entry_no" value="No">
                                <label class="form-check-label" for="edit_passbook_entry_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="edit_passbook_entry_remarks" name="edit_passbook_entry_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>6. How do you confirm your balance, whether you visit the branch to update your passbook and if yes at which interval?</label>
                        <textarea class="form-control" id="edit_balance_confirmation" name="edit_balance_confirmation" placeholder="Enter your answer" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>7. Passbook may be checked to see any manual entry if customer is ready to show it</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_passbook_check" id="edit_passbook_check_yes" value="Yes">
                                <label class="form-check-label" for="edit_passbook_check_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_passbook_check" id="edit_passbook_check_no" value="No">
                                <label class="form-check-label" for="edit_passbook_check_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="edit_passbook_check_remarks" name="edit_passbook_check_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>8. BCA demands any fee to open account or to perform any transaction</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_fee_demand" id="edit_fee_demand_yes" value="Yes">
                                <label class="form-check-label" for="edit_fee_demand_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_fee_demand" id="edit_fee_demand_no" value="No">
                                <label class="form-check-label" for="edit_fee_demand_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="edit_fee_demand_remarks" name="edit_fee_demand_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>9. Are you satisfied with the services and behavior of the BCA</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_satisfaction" id="edit_satisfaction_yes" value="Yes">
                                <label class="form-check-label" for="edit_satisfaction_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_satisfaction" id="edit_satisfaction_no" value="No">
                                <label class="form-check-label" for="edit_satisfaction_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="edit_satisfaction_remarks" name="edit_satisfaction_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>10. Anything that the customer wants to disclose for BCA (Optional)</label>
                        <textarea class="form-control" id="edit_additional_comments" name="edit_additional_comments" rows="3" placeholder="Enter your answer"></textarea>
                    </div>
                    <div class="form-group">
                        <label>11. BCA is giving cash immediately in case of cash withdrawal or some delay is there</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_cash_withdrawal_delay" id="edit_cash_withdrawal_delay_yes" value="Yes">
                                <label class="form-check-label" for="edit_cash_withdrawal_delay_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_cash_withdrawal_delay" id="edit_cash_withdrawal_delay_no" value="No">
                                <label class="form-check-label" for="edit_cash_withdrawal_delay_no">No</label>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="edit_cash_withdrawal_delay_remarks" name="edit_cash_withdrawal_delay_remarks" placeholder="Remarks" rows="3"></textarea>
                    </div>
                    <div class="d-flex mt-2 justify-content-center">
                        <button type="button" class="btn btn-secondary mr-5" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ml-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .signature-container {
    text-align: center;
    margin: 5px auto;
    width: 100%;
}

.signature-pad {
    border: 1px solid #000;
    display: block;
    margin: 0 auto;
}
</style>
<!--  Modal for customer Signature -->
<div class="modal fade" id="signatureModal" tabindex="-1" role="dialog" aria-labelledby="signatureModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signatureModalLabel">Customer Signature Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="mdi mdi-close-box-outline text-danger"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="signature-container">
                <canvas id="signaturePad" class="signature-pad" width="auto" height="500px"></canvas>
            </div>
            <div class="modal-footer pt-2 pb-0 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" id="closeBtn" data-dismiss="modal">Close</button>
                <button type="button" class="iconButtons btn btn-success" id="confirmButton" title="Confirm">save<i class="mdi mdi-check-circle-outline btnIcon"></i></button>
                <button type="button" class="iconButtons btn btn-danger" id="clearButton" title="Clear"><i class="mdi mdi-camera-retake-outline btnIcon"></i></button>
            </div>
        </div>
    </div>
</div>

<!-- modal div end in footer -->
<?php include "include/footer.php"; ?>

<script>
$(document).ready(function() {
    var customerCount = 0;
    var editIndex = -1;
    var customersToDelete = new Set(); // Use Set to track customers marked for deletion

    // Fetch and display customer data
    function fetchCustomers() {
        $.ajax({
            url: 'codes/fetch_customer_feedback.php',
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    var customers = response.data;
                    $('#customer-list').empty();
                    customerCount = 0; // Reset customer count
                    if (customers.length > 0) {
                        $('#submitButton').prop('disabled', false); // Enable the button
                    } else {
                        $('#submitButton').prop('disabled', true); // Disable the button if no customers
                    }
                    customers.forEach(function(customer, index) {
                        if (!customersToDelete.has(customer.id)) { // Exclude deleted customers
                            customerCount++;
                            var customerItem = `
                                <div class="customer-item" data-index="${customer.id}">
                                    <span>${customerCount}. ${customer.customer_name}</span>
                                    <button type="button" class="btn btn-danger btn-sm delete-button" title="Delete Data"><i class="fa-solid fa-trash-can"></i></button>
                                    <button type="button" class="btn btn-warning btn-sm edit-button" title="Edit Data"><i class="fa-solid fa-pen-to-square"></i></button>
                                </div>`;
                            $('#customer-list').append(customerItem);
                        }
                    });
                } else {
                    console.log(response.message);
                    alert("Failed to fetch data!");
                }
            },
            error: function(xhr, status, error) {
                alert("Error occurred while fetching data!");
                console.error('Error occurred while fetching customers:', status, error);
                console.error(xhr.responseText);
            }
        });
    }

    // Call fetchCustomers on page load
    fetchCustomers();

    $('#customerForm').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: 'codes/save_customer_interaction.php',
            method: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function(response) {
                alert("Data added successfully!");
                if (response.success) {
                    fetchCustomers(); // Refresh customer list
                    $('#addCustomerModal').modal('hide');
                    // $('#customerForm')[0].reset();
                    resetAddModal();
                } else {
                    alert("Failed to add customer data!");
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                alert("Error occurred while adding customer data!");
                console.error('Error occurred while adding customer:', status, error);
                console.error(xhr.responseText);
            }
        });
    });

    function resetAddModal(){
        $('#customerForm')[0].reset();
        $('#bcSignaturePhotoPreview').attr('src', '');
        $('#bcSignaturePhotoBase64').val('');
    };

    $(document).on('click', '.edit-button', function() {
        var customerItem = $(this).closest('.customer-item');
        var customerId = customerItem.data('index');
        editIndex = customerId;

        console.log('Editing customer with index:', editIndex);

        // Fetch customer details in edit
        $.ajax({
            url: 'codes/fetch_customer_feedback.php',
            method: 'GET',
            data: { id: customerId },
            success: function(response) {
                if (response.success) {
    var customer = response.data.find(cust => cust.id == customerId);
    $('#editCustomerName').val(customer.customer_name);
    $('#editCustomerEmail').val(customer.customer_email);
    $('#editCustomerPhone').val(customer.customer_phone);

    // Populate radio buttons and remarks fields
    $('#edit_csp_opening_hours_yes').prop('checked', customer.csp_opening_hours === 'Yes');
    $('#edit_csp_opening_hours_no').prop('checked', customer.csp_opening_hours === 'No');
    $('#edit_csp_opening_hours_remarks').val(customer.csp_opening_hours_remarks);

    $('#edit_bca_sits_regularly_yes').prop('checked', customer.bca_sits_regularly === 'Yes');
    $('#edit_bca_sits_regularly_no').prop('checked', customer.bca_sits_regularly === 'No');
    $('#edit_bca_sits_regularly_remarks').val(customer.bca_sits_regularly_remarks);

    $('#edit_system_generated_slip_yes').prop('checked', customer.system_generated_slip === 'Yes');
    $('#edit_system_generated_slip_no').prop('checked', customer.system_generated_slip === 'No');
    $('#edit_system_generated_slip_remarks').val(customer.system_generated_slip_remarks);

    $('#edit_signature_register_yes').prop('checked', customer.signature_register === 'Yes');
    $('#edit_signature_register_no').prop('checked', customer.signature_register === 'No');
    $('#edit_signature_register_remarks').val(customer.signature_register_remarks);

    $('#edit_passbook_entry_yes').prop('checked', customer.passbook_entry === 'Yes');
    $('#edit_passbook_entry_no').prop('checked', customer.passbook_entry === 'No');
    $('#edit_passbook_entry_remarks').val(customer.passbook_entry_remarks);

    $('#edit_balance_confirmation').val(customer.balance_confirmation);

    $('#edit_passbook_check_yes').prop('checked', customer.passbook_check === 'Yes');
    $('#edit_passbook_check_no').prop('checked', customer.passbook_check === 'No');
    $('#edit_passbook_check_remarks').val(customer.passbook_check_remarks);

    $('#edit_fee_demand_yes').prop('checked', customer.fee_demand === 'Yes');
    $('#edit_fee_demand_no').prop('checked', customer.fee_demand === 'No');
    $('#edit_fee_demand_remarks').val(customer.fee_demand_remarks);

    $('#edit_satisfaction_yes').prop('checked', customer.satisfaction === 'Yes');
    $('#edit_satisfaction_no').prop('checked', customer.satisfaction === 'No');
    $('#edit_satisfaction_remarks').val(customer.satisfaction_remarks);

    $('#edit_additional_comments').val(customer.additional_comments);

    $('#edit_cash_withdrawal_delay_yes').prop('checked', customer.cash_withdrawal_delay === 'Yes');
    $('#edit_cash_withdrawal_delay_no').prop('checked', customer.cash_withdrawal_delay === 'No');
    $('#edit_cash_withdrawal_delay_remarks').val(customer.cash_withdrawal_delay_remarks);

    // Show the modal
    $('#editCustomerModal').modal('show');
                }
                 else {
                    console.log(response.message);
                    alert("Failed to fetch data!");
                }
            },
            error: function(xhr, status, error) {
                alert("Error occurred while fetching data!");
                console.error('Error occurred while fetching customer details:', status, error);
                console.error(xhr.responseText);
            }
        });
    });

    $('#editCustomerForm').on('submit', function(event) {
        event.preventDefault();
        var editedData = {
    customerId: editIndex,
    editCustomerName: $('#editCustomerName').val(),
    editCustomerEmail: $('#editCustomerEmail').val(),
    editCustomerPhone: $('#editCustomerPhone').val(),
    editCustomerAddress: $('#editCustomerAddress').val(),
    editCustomerNotes: $('#editCustomerNotes').val(),
    edit_csp_opening_hours: $('input[name="edit_csp_opening_hours"]:checked').val(),
    edit_csp_opening_hours_remarks: $('#edit_csp_opening_hours_remarks').val(),
    edit_bca_sits_regularly: $('input[name="edit_bca_sits_regularly"]:checked').val(),
    edit_bca_sits_regularly_remarks: $('#edit_bca_sits_regularly_remarks').val(),
    edit_system_generated_slip: $('input[name="edit_system_generated_slip"]:checked').val(),
    edit_system_generated_slip_remarks: $('#edit_system_generated_slip_remarks').val(),
    edit_signature_register: $('input[name="edit_signature_register"]:checked').val(),
    edit_signature_register_remarks: $('#edit_signature_register_remarks').val(),
    edit_passbook_entry: $('input[name="edit_passbook_entry"]:checked').val(),
    edit_passbook_entry_remarks: $('#edit_passbook_entry_remarks').val(),
    edit_balance_confirmation: $('#edit_balance_confirmation').val(),
    edit_passbook_check: $('input[name="edit_passbook_check"]:checked').val(),
    edit_passbook_check_remarks: $('#edit_passbook_check_remarks').val(),
    edit_fee_demand: $('input[name="edit_fee_demand"]:checked').val(),
    edit_fee_demand_remarks: $('#edit_fee_demand_remarks').val(),
    edit_satisfaction: $('input[name="edit_satisfaction"]:checked').val(),
    edit_satisfaction_remarks: $('#edit_satisfaction_remarks').val(),
    edit_additional_comments: $('#edit_additional_comments').val(),
    edit_cash_withdrawal_delay: $('input[name="edit_cash_withdrawal_delay"]:checked').val(),
    edit_cash_withdrawal_delay_remarks: $('#edit_cash_withdrawal_delay_remarks').val()
};

        $.ajax({
            url: 'codes/update_customer_feedback.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(editedData),
            success: function(response) {
                if (response.success) {
                    alert("Data updated successfully!");
                    fetchCustomers(); // Refresh customer list
                    $('#editCustomerModal').modal('hide');
                    $('#editCustomerForm')[0].reset();
                } else {
                    console.log(response.message);
                    alert("Failed to update data");
                }
            },
            error: function(xhr, status, error) {
                alert("Error occurred while updating data!");
                console.error('Error occurred while updating customer:', status, error);
                console.error(xhr.responseText);
            }
        });
    });

    // Mark customer for deletion
    $(document).on('click', '.delete-button', function() {
        var customerItem = $(this).closest('.customer-item');
        var customerId = customerItem.data('index');
        
        if (confirm('Are you sure you want to delete this customer?')) {
            customersToDelete.add(customerId); // Mark customer for deletion
            customerItem.remove(); // Remove from UI
            customerCount--;
            // Optionally update the UI customer count if needed
        }
    });

    // Submit the progress and go to next page
    $('#submitButton').off('click').on('click', function() {
        if (customerCount < 2) {
            alert("Please Add Minimum 2 Customer's Interaction!");
            return;
        }

        $.ajax({
            url: 'codes/confirm_customer_interaction.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ 
                progress: 6,
                customersToDelete: Array.from(customersToDelete) // Convert Set to Array
            }),
            success: function(response) {
                console.log('Response from add_customer_interaction.php:', response);
                if (response.success) {
                    alert("Data confirmed successfully! Go to the next page");
                    // Redirect to next page if needed
                    window.location.href = "/bcaudit/bank-manager-rating.php"; // Replace with actual URL
                } else {
                    alert(response.message)
                }
            },
            error: function(xhr, status, error) {
                alert("Error occurred while confirming data!");
                console.error('Error occurred while confirming data:', status, error);
                console.error(xhr.responseText);
            }
        });
    });

// Signature Part Start
        const signatureCanvas = document.getElementById('signaturePad');
        const signaturePad = new SignaturePad(signatureCanvas);

        document.getElementById('clearButton').addEventListener('click', function() {
            signaturePad.clear();
        });

        document.getElementById('confirmButton').addEventListener('click', function() {
            if (!signaturePad.isEmpty()) {
                const signatureDataURL = signaturePad.toDataURL('image/png');

                // Rotate the image
                const rotationCanvas = document.createElement('canvas');
                const ctx = rotationCanvas.getContext('2d');
                const img = new Image();
                img.src = signatureDataURL;

                img.onload = function() {
                    // Set canvas size to the dimensions of the signature image, swapped for rotation
                    rotationCanvas.width = img.height;
                    rotationCanvas.height = img.width;

                    // Rotate the canvas and draw the image
                    ctx.save();
                    ctx.translate(rotationCanvas.width / 2, rotationCanvas.height / 2);
                    ctx.rotate(Math.PI / 2);
                    ctx.drawImage(img, -img.width / 2, -img.height / 2);
                    ctx.restore();

                    // Get the rotated image data URL
                    const rotatedDataURL = rotationCanvas.toDataURL('image/png');
                    const rotatedDataBase64 = rotatedDataURL.replace(/^data:image\/(png|jpg);base64,/, "");

                    // Update the preview image and hidden input value
                    const bcSignaturePhotoPreview = document.getElementById('bcSignaturePhotoPreview');
                    bcSignaturePhotoPreview.src = rotatedDataURL;
                    document.getElementById('bcSignaturePhotoBase64').value = rotatedDataBase64;
                    $('#signatureModal').modal('hide');
                    // Save the rotated image to the backend
                    // saveSignature(rotatedDataURL);
                };
            } else {
                alert("Please make a signature first.");
            }
        });

        // Frize the body after closing the signature modal
        $('#signatureModal').on('hidden.bs.modal', function () {
        $('body').addClass('modal-open');
        });
        // Body freezing end

        function saveSignature(dataURL) {
        fetch('codes/save_signature.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ image: dataURL })
        })
        .then(response => response.text())
        .then(result => {
            alert(result);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    // signature part end

});


</script>