<div class="col-md-12" id="enforcerTable">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Enforcer</h3>
        </div>
        <div class="box-body">
            <table id="dtblEnforcer" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last signed-in</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="enforcerTable">
                    @foreach($enforcers as $enforcer)
                        <tr>
                            <td style="cursor: pointer" class="clickable-row name" data-href="enforcer/show/{{$enforcer->intEnforcerID}}">
                                {{$enforcer->strEnforcerFirstname}} {{$enforcer->strEnforcerLastname}}
                            </td>
                            <td class="lastSignedIn">
                                <?php
                                $dateLastSignedin = ($enforcer->datLastSignedin == "0000-00-00 00:00:00") ? "Never logged in" :
                                    date('M j, Y',strtotime($enforcer->datLastSignedin));
                                ?>   
                                {{$dateLastSignedin}}
                            </td>
                            <td width="150px">
                                <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" title="Reset Password">
                                        <i class="fa fa-fw fa-unlock"></i>
                                </button>
                                <div class="btn-group">
                                    
                                    <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" title="Rename">
                                        <i class="fa fa-fw fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Suspend Enforcer</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Delete Enforcer</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Last signed-in</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="loadingEnforcer">
          <i id="loadingEnforcerDesign"></i>
        </div>
    </div>
</div>
<script src="{{ URL::asset('assets/js/enforcerIndex.js') }}"></script>