<script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var vaccineId = $(this).val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "./database/delete_controller/delete_vaccine.php",
                    data: {
                        'vaccinedelete': "delete",
                        'vaccineId': vaccineId,
                    },
                    success: function (reponse) {

                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                $('#refresh-delete' + vaccineId).hide(1000);
            }
        })

    });
</script>
<script>
    $('.retrieve_button').click(function (e) {
        e.preventDefault();
        var vaccineId = $(this).val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, retrieve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "./database/delete_controller/delete_vaccine.php",
                    data: {
                        'vaccinedelete': "retrieve",
                        'vaccineId': vaccineId,
                    },
                    success: function (reponse) {

                    }
                });
                Swal.fire(
                    'Retrieve!',
                    'Your product has been retrieve.',
                    'success'
                )
                $('#refresh-delete' + vaccineId).hide(1000);
            }
        })

    });
</script>
<script>
    $('.approval_button').click(function (e) {
        e.preventDefault();
        var vaccineId = $(this).val();
        var Application_ID = $('#Application_ID'+vaccineId).val();
        var Product_Name = $('#Product_Name'+vaccineId).val();
        var Manufacturer = $('#Manufacturer'+vaccineId).val();
        var Requesting_Agency = $('#Requesting_Agency'+vaccineId).val();
        var Date_Application = $('#Date_Application'+vaccineId).val();
        var Lot_Number = $('#Lot_Number'+vaccineId).val();
        var Lot_Size = $('#Lot_Size'+vaccineId).val();
        var Date_Manufacture = $('#Date_Manufacture'+vaccineId).val();
        var Date_Expiry = $('#Date_Expiry'+vaccineId).val();
        var Storage_Condition = $('#Storage_Condition'+vaccineId).val();
        var Pharmaceutical_Form = $('#Pharmaceutical_Form'+vaccineId).val();
        var Presentation = $('#Presentation'+vaccineId).val();
        var Diluent = $('#Diluent'+vaccineId).val();
        var Diluent_Number = $('#Diluent_Number'+vaccineId).val();
        var SLP_Received = $('#SLP_Received'+vaccineId).val();
        var Labels_Received = $('#Labels_Received'+vaccineId).val();
        var Samples_Received = $('#Samples_Received'+vaccineId).val();
        var Reviewer_Assigned = $('#Reviewer_Assigned'+vaccineId).val();
        var Deadline_Assessment = $('#Deadline_Assessment'+vaccineId).val();
        var Certificate_Issue_Date = $('#Certificate_Issue_Date'+vaccineId).val();
        var Remarks = $('#Remarks'+vaccineId).val();


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "./database/approval_controller/approval_vaccine.php",
                    data: {
                        'vaccineapproval': "approval",
                        'vaccineId': vaccineId,
                        'Application_ID': Application_ID,
                        'Product_Name': Product_Name,
                        'Manufacturer': Manufacturer,
                        'Requesting_Agency': Requesting_Agency,
                        'Date_Application': Date_Application,
                        'Lot_Number': Lot_Number,
                        'Lot_Size': Lot_Size,
                        'Date_Manufacture': Date_Manufacture,
                        'Date_Expiry': Date_Expiry,
                        'Storage_Condition': Storage_Condition,
                        'Pharmaceutical_Form': Pharmaceutical_Form,
                        'Presentation': Presentation,
                        'Diluent': Diluent,
                        'Diluent_Number': Diluent_Number,
                        'SLP_Received': SLP_Received,
                        'Labels_Received': Labels_Received,
                        'Samples_Received': Samples_Received,
                        'Reviewer_Assigned': Reviewer_Assigned,
                        'Deadline_Assessment': Deadline_Assessment,
                        'Certificate_Issue_Date': Certificate_Issue_Date,
                        'Remarks': Remarks,
                    },
                    success: function (reponse) {

                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been rejected.',
                    'success'
                )
                $('#refresh-approval' + vaccineId).hide(1000);
            }
        })

    });
</script>

<script>
    $('.reject_button').click(function (e) {
        e.preventDefault();
        var vaccineId = $(this).val();
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reject it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "./database/reject_controller/reject_vaccine.php",
                    data: {
                        'vaccineapproval': "approval",
                        'vaccineId': vaccineId,
                    },
                    success: function (reponse) {

                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been rejected.',
                    'success'
                )
                $('#refresh-approval' + vaccineId).hide(1000);
            }
        })

    });
</script>