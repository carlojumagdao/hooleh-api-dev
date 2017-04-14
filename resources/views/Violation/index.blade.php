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
                    <div class="box-body box-profile">
                    <button class="btn btn-primary btn-block" data-toggle="modal" title="Edit">Add new</button>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Violation</h3>
                    </div>
                    <div class="box-body">
                        <table id="dtblEnforcer" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Fine</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($violations as $violation)
                                    <tr>
                                        <td class="code">
                                            {{$violation->strViolationCode}}
                                        </td>
                                        <td class="Description">
                                            {{$violation->strViolationDescription}}
                                        </td>
                                        <td>
                                            P {{number_format($violation->dblPrice,2)}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" title="View Info">
                                                <i class="fa fa-fw fa-info"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Edit Violation</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Delete Violation</a></li>
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
                </div>
            </div>
        </div>
    </section>

    <div class="example-modal">
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
    </script>
@endsection