@extends('index')

@section('title', 'Violations')

@section('content')
    <section class="content-header">
        <h1>
            Violation
            <small>Control panel</small>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-wrench"></i> Dashboard</a></li>
            <li class="active">Violation</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Filters</h3>
                    </div>
<<<<<<< HEAD
                    <div class="box-body">
                        <div class="form-group">
                            <select class="form-control selFilter">
                                <option value="0">Active violations</option>
                                <option value="1">Deleted violations</option>
                            </select>
                        </div>
                        <button class="btn btn-primary btn-block addViolation" data-toggle="modal" data-toggle="modal" data-target="#modalAddViolation" title="AddViolation">Add Violation </button>
                    </div>
                </div>
            </div>
            <div class="loading">Loading&#8230;</div>
            <div class="col-md-9" id="violationTable">
=======
                    <div class="box-body box-profile">
                    <button class="btn btn-primary btn-block" data-toggle="modal" title="Edit">Add new</button>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
>>>>>>> auth
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Violation</h3>
                    </div>
                    <div class="box-body">
<<<<<<< HEAD
                        <table id="dtblViolation" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="hide"></th>
=======
                        <table id="dtblEnforcer" class="table table-bordered table-hover">
                            <thead>
                                <tr>
>>>>>>> auth
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Fine</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($violations as $violation)
                                    <tr>
<<<<<<< HEAD
                                        <td class="hide classViolationPrimaryKey">{{$violation->intViolationID}}</td>
                                        <td class="classCode clickable-row" style="cursor: pointer" data-href="violation/show/{{$violation->intViolationID}}">
                                            {{$violation->strViolationCode}}
                                        </td>
                                        <td class="classDescription clickable-row" style="cursor: pointer" data-href="violation/show/{{$violation->intViolationID}}">
                                            {{$violation->strViolationDescription}}
                                        </td>
                                        <td class="classFine">
=======
                                        <td class="code">
                                            {{$violation->strViolationCode}}
                                        </td>
                                        <td class="Description">
                                            {{$violation->strViolationDescription}}
                                        </td>
                                        <td>
>>>>>>> auth
                                            P {{number_format($violation->dblPrice,2)}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
<<<<<<< HEAD
                                            <button type="button" class="btn btn-sm btn-default btnUpdateViolation" data-toggle="tooltip" title="Update">
                                                    <i class="fa fa-fw fa-pencil"></i>
=======
                                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" title="View Info">
                                                <i class="fa fa-fw fa-info"></i>
>>>>>>> auth
                                            </button>
                                            <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
<<<<<<< HEAD
                                                <li><a href="#" class="btnDeleteViolation">Delete Violation</a></li>
=======
                                                <li><a href="#">Edit Violation</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Delete Violation</a></li>
>>>>>>> auth
                                            </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Fine</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
<<<<<<< HEAD
                    <div id="loadingViolation">
                        <i id="loadingViolationDesign"></i>
                    </div>
=======
>>>>>>> auth
                </div>
            </div>
        </div>
    </section>

<<<<<<< HEAD
    
    <!-- MODAL ADD VIOLATION -->
        <div class="modal fade" id="modalAddViolation" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create new violation</h4>
                    </div>

                    <form role="form" data-toggle="validator" id="form">
                        <div class="modal-body">
                            <div class="box-body">
                                <p class="help-block col-sm-12" id="formErrorMessage" style="color:red;">
                                    Something went wrong, please check your inputs.
                                </p>
                                <div class="form-group  col-sm-12">
                                    <input type="text" class="form-control" id="inputCode" placeholder="Code" size="35" required>
                                </div>
                                <div class="form-group  col-sm-12">
                                    <input class="form-control" id="inputDescription" placeholder="Description" required>
                                </div>
                                <p class="help-block"></p>
                                <div class="form-group  col-sm-12">
                                    <input type="text" class="form-control" id="inputFine" placeholder="Fine" size="35" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                            <span class="form-group">
                                <button type="submit" id="btnCreateViolation" class="btn btn-primary">Create</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- MODAL ADD VIOLATION-->

        <!-- MODAL SUCCESSFUL CREATION -->
        <div class="modal fade" id="modalSuccessfulCreation" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create a new Violation</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <img class="img-responsive" src="assets/image/icons/successIcon.png" alt="Success Icon" width="20px" align="left">
                            &nbsp; A new violation code <span id="successCode"></span> has been created.
                        </p>
                        <div class="successMessage">
                            <p>Violation Description:</p>
                            <p id="successDescription" class="credentials"></p>
                            <p>Violation Fine:</p>
                            <p id="successFine" class="credentials"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="btnCreateAnotherViolation">CREATE ANOTHER VIOLATION</button>
                        <button type="button" id="btnPrint" class="btn btn-primary">PRINT</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL SUCCESSFUL CREATION -->

        <!-- MODAL UPDATE VIOLATION -->
        <div class="modal fade" id="modalUpdateViolation" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Violation</h4>
                    </div>

                    <form role="form" data-toggle="validator" id="formUpdate">
                        <div class="modal-body">
                            <div class="box-body">
                                <ul>
                                    <li>The update operation can take up to 5 minutes.</li>
                                    <li>The new violation might not be available for up to 5 minutes.</li>
                                </ul>
                                <p class="help-block col-sm-12" id="formErrorMessageUpdate" style="color:red;">
                                    Something went wrong, please check your inputs.
                                </p>
                                <div class="form-group  col-sm-12">
                                    <input type="text" class="form-control" id="inputCodeUpdate" placeholder="Code" size="35" required>
                                </div>
                                <div class="form-group  col-sm-12">
                                    <input class="form-control" id="inputDescriptionUpdate" placeholder="Description" required>
                                </div>
                                <div class="form-group  col-sm-12">
                                    <input type="text" class="form-control" id="inputFineUpdate" placeholder="Fine" size="35" required>
                                </div>
                                <p class="help-block"></p>
                                <div class="form-group  col-sm-6">
                                    <input type="hidden" class="form-control" id="inputViolationPrimaryKey">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                            <span class="form-group">
                                <button type="submit" id="btnUpdateViolationSubmit" class="btn btn-primary">Update Violation</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- MODAL UPDATE VIOLATION-->

        <!-- MODAL SUCCESSFUL UPDATE -->
        <div class="modal fade" id="modalSuccessfulUpdate" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Violation</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <img class="img-responsive" src="assets/image/icons/successIcon.png" alt="Success Icon" width="20px" align="left">
                            &nbsp; Update successful.
                        </p>
                        <div class="successMessage">
                            <p>The updated violation is: </p>
                            <p>Violation Code: <span id="updatedCode" class="credentials"></span></p>
                            <p>Violation Description: <span id="updatedDescription" class="credentials"></span></p>
                            <p>Violation Fine: P <span id="updatedFine" class="credentials"></span></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" id="btnPrint" class="btn btn-primary">PRINT</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL SUCCESSFUL UPDATE -->


        <!-- MODAL SUCCESSFUL DELETE VIOLATION -->
        <div class="modal fade" id="modalDeleteViolationSuccess" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete Violation</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <img class="img-responsive" src="assets/image/icons/successIcon.png" alt="Success Icon" width="20px" align="left">
                            &nbsp; Delete violation success.
                        </p>
                        <div class="successMessage">
                            <p>Violation Code : <span id="deletedViolationCode" class="credentials"></span></p>
                            <p>Violation Description : <span id="deletedViolationDescription" class="credentials"></span></p>
                            <p>Violation Fine : <span id="deletedViolationFine" class="credentials"></span> is now deleted</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" id="btnPrint" class="btn btn-primary">PRINT</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL SUCCESSFUL DELETE VIOLATION -->

        <!-- MODAL SUCCESSFUL RESTORE VIOLATION -->
        <div class="modal fade" id="modalRestoredViolationSuccess" role="dialog">
=======
    <div class="example-modal">
        <div class="modal">
>>>>>>> auth
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
<<<<<<< HEAD
                        <h4 class="modal-title">Restore violation</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <img class="img-responsive" src="assets/image/icons/successIcon.png" alt="Success Icon" width="20px" align="left">
                            &nbsp; Restore violation success.
                        </p>
                        <div class="successMessage">
                            <p>Violation Code : <span id="restoredViolationCode" class="credentials"></span></p>
                            <p>Violation Description : <span id="restoredViolationDescription" class="credentials"></span></p>
                            <p>Violation Fine : <span id="restoredViolationFine" class="credentials"></span> is now restored</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" id="btnPrint" class="btn btn-primary">PRINT</button>
=======
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
>>>>>>> auth
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        <!-- MODAL SUCCESSFUL RESTORE VIOLATION -->
@stop

@section('script')
    <script src="{{ URL::asset('assets/js/violationIndex.js') }}"></script>
@stop
=======
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
    </script>
@endsection
>>>>>>> auth
