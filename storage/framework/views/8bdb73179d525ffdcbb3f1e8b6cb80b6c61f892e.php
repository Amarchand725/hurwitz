<script src="<?php echo e(asset('public/admin')); ?>/plugins/global/plugins.bundle.js"></script>
<script src="<?php echo e(asset('public/admin')); ?>/js/scripts.bundle.js"></script>
<script src="<?php echo e(asset('public/admin')); ?>/js/custom/widgets.js"></script>

<script src="<?php echo e(asset('public/admin')); ?>/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>

<script src="<?php echo e(asset('public/admin')); ?>/js/widgets.bundle.js"></script>

<script src="<?php echo e(asset('public/admin/js/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/search.js')); ?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('.long_description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

    $(".select2").select2();
</script>
<?php if(Session::get('success')): ?>
    <script>
        var msg = $("#success_msg").val();
        $.notify(msg, "success");
    </script>
<?php endif; ?>
<?php if(Session::get('delete')): ?>
    <script>
        var msg = $("#delete_msg").val();
        $.notify(msg, "error");
    </script>
<?php endif; ?>
<?php if(Session::get('error')): ?>

<script>
    var msg = $("#error_msg").val();
    $.notify(msg, "error");
    console.log(msg);
</script>

<?php endif; ?>


<script>
    $(document).ready(function() {
        $(".close_modal").click(function() {
            $(".get_date").empty();
            $(".get_remarks").empty();
            $("#candidate_remarks_modal").modal('hide');
        });


    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('#main_image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#prev_main_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#thumb_image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#prev_thumb_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

<script>
    $(document).on("change", "#change_status", function() {
        var order_id = $(this).attr("data-order-id");
        var status_id = $(this).val();
        console.log(status_id);
        if (status_id != "") {
            $.ajax({
                url: "<?php echo e(route('orders.changeOrderStatus')); ?>",
                method: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    order_id: order_id,
                    status_id: status_id,
                },
                beforeSend: function() {
                    $.notify("Please Wait", "warning");
                },
                success: function(res) {
                    console.log(res);
                    if (res.success == true) {
                        $.notify(res.message, "success");
                        window.location.reload();
                    } else {
                        $.notify(res.message, "error");
                        window.location.reload();
                    }
                },
                error: function(res) {
                    console.log(res);
                    $.notify(res.message, "error");
                },

            });
        }

    });

    $(document).on("change", ".bidding_status", function() {
        var status_id = $(this).val();
        var bid_id = $(this).attr('data-id');
        if (status_id == 2) {
            // approved
            Swal.fire({
                title: 'Approving this bid will cancel all bids available for this product, Are You Sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function(result) {
                console.log(result);
                if (result.value) {
                    updateBiddingStatus(bid_id, status_id);
                    Swal.fire({
                        title: 'Please Wait',
                        text: "Processing",
                        type: 'warning',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK!',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger ml-1',
                        buttonsStyling: false,
                    });
                } else {

                }
            });
        }

        if (status_id == 3 || status_id == 4) {
            // rejected
            Swal.fire({
                title: 'You will not be able to Approve this bid again, Are you sure you want to Cancel this bid?',
                text: "You won't be able to revert this!",
                type: 'warning',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function(result) {
                console.log(result);
                if (result.value) {
                    updateBiddingStatus(bid_id, status_id);
                    Swal.fire({
                        title: 'Please Wait',
                        text: "Processing",
                        type: 'warning',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK!',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger ml-1',
                        buttonsStyling: false,
                    });
                } else {

                }
            });
        }
    });

    $(document).ready(function() {
        $("body").on('click', '.book_btn_add', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var type_id = $('#statuses' + id).find(':selected').val();
            if (type_id == "") {
                alert('Please Select Order Type.');
                return false;
            }

            var order_type_ids = [];
            $(".order_type_ids").each(function() {
                order_type_ids.push($(this).val());
            });

            id++;
            $.ajax({
                type: "get",
                url: "<?php echo e(route('book.get_order_types')); ?>",
                data: {
                    id: id,
                    order_type_ids: order_type_ids
                },
                success: function(res) {
                    if (res.success == 404) {
                        alert('You have no any order type available');
                    }
                    $('.order_type_option').attr('required', true);
                    $('.order_type_url').attr('required', true);
                    $('.append_book_url').append(res);
                }
            });
            $('.book_btn_add').data('id', id);
        });

        $("body").on('click', '.btn_remove_type', function() {
            var id = $(this).data('id');
            if (id) {
                $(".book_url_main_" + id).remove();
            }

            var order_type_ids = [];
            $(".order_type_ids").each(function() {
                order_type_ids.push($(this).val());
            });

            if (order_type_ids.length == 1) {
                $('.order_type_url').attr('required', false);
                $('.order_type_option').attr('required', false);
            } else {
                $('.order_type_url').attr('required', true);
                $('.order_type_option').attr('required', true);
            }
        });
    });
</script>
<?php /**PATH C:\wamp\www\hurwitz\resources\views/admin/layouts/scripts.blade.php ENDPATH**/ ?>