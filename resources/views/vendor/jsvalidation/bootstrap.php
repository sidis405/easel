<script>
    jQuery(document).ready(function () {
        $("<?php echo $validator['selector']; ?>").validate({
            highlight: function (element) { // highlight error inputs
                $(element)
                    .closest('.form-group, .checkbox').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by highlight
                $(element)
                    .closest('.form-group, .checkbox').removeClass('has-error'); // set error class to the control group
            },
            errorElement: 'p', //default input error message container
            errorClass: 'help-block error-help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            invalidHandler: function (event, validator) {
                var first_error = $(validator.errorList[0].element);
                $('html, body').animate({scrollTop: first_error.offset().top - 120}, 700, function () {
                    first_error.focus();
                });
            },
            errorPlacement: function (error, element) {
                if (element.attr("type") == "radio") {
                    error.insertAfter(element.parents('div').find('.radio-list'));
                }
                else if (element.attr("type") == "checkbox") {
                    error.insertAfter(element.parents('label'));
                }
                else {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            },
            success: function (label) {
                label
                    .closest('.form-group, .checkbox').removeClass('has-error'); // set success class to the control group
            },
            rules: <?php echo json_encode($validator['rules']); ?> ,
            messages: <?php echo json_encode($validator['messages']) ?>
        })
    })
</script>