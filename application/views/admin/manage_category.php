<?php include("header.php"); ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Category</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <a href ="/index.php/admin/add_category" class="btn btn-default" type="button"><i class="fa fa-plus-circle"></i> Add New Category</a>
                    <a href ="/index.php/category/manage_sub_category" class="btn btn-default" type="button"><i class="fa fa-cog"></i> Manage Sub-category</a>
                    
                </div>
            </div
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Category<small><?php echo $this->session->flashdata('message'); ?></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">

                        </p>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category_Name</th>
                                    <th>Category_Discription</th>
                                    <th>Category_Images</th>
                                    <th>Status</th>
                                    <th class="sorting_disabled">Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                <?php foreach ($category as $categorys) { ?>
                                    <tr>
                                        <td><?php echo $categorys->id; ?></td>
                                        <td><?php echo $categorys->category_name; ?></td>
                                        <td><?php echo $categorys->category_description; ?></td>
                                        <td><?php echo $categorys->category_image; ?></td>
                                        <td><?php echo $categorys->status; ?></td>
                                        <td>
                                            <!-- Split button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger">Action</button>
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="/index.php/category/edit_category/<?php echo $categorys->id; ?>">Edit</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="/index.php/category/delete_category/<?php echo $categorys->id; ?>">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Split button --></td>


                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>



    </div>
</div>

<!-- /page content -->



<?php include("footer.php"); ?>

<!-- Datatables -->
<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[1, 'asc']],
            'columnDefs': [
                {orderable: false, targets: [0]}
            ]
        });
        $datatable.on('draw.dt', function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });
</script>
<!-- /Datatables -->

