<div class="container-fluid">
    <div class="row">
        <div class="col-12 ">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="custom-tabs-four-home-0" data-toggle="pill"
                                href="#custom-tabs-four-0" role="tab" aria-controls="custom-tabs-four-0"
                                aria-selected="true">ข้อมูลทั้งหมด</a></li>
                        <li class="nav-item"><a class="nav-link" id="custom-tabs-four-home-1" data-toggle="pill"
                                href="#custom-tabs-four-1" role="tab" aria-controls="custom-tabs-four-1"
                                aria-selected="false">ข้อมูลไม่ผ่านการตรวจสอบ</a></li>
                        <li class="nav-item"><a class="nav-link" id="custom-tabs-four-home-2" data-toggle="pill"
                                href="#custom-tabs-four-2" role="tab" aria-controls="custom-tabs-four-2"
                                aria-selected="false">ข้อมูลผ่านการตรวจสอบพร้อมส่งเบิก</a></li>
                       
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        
							<div class="card">
								<div class="card-body">
								  <div id="show_dataall"></div>
								</div>
						  </div>
						
						
                        <div class="table-responsive text-sm tab-pane fade" id="custom-tabs-four-1" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-1">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dt-buttons btn-group flex-wrap"> <button
                                                class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                                aria-controls="example2" type="button"><span>Excel</span></button>
                                            <button class="btn btn-secondary buttons-print" tabindex="0"
                                                aria-controls="example2" type="button"><span>Print</span></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example2_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="example2"></label>
										</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2"
                                            class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                            aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example2" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="unit: activate to sort column descending">unit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="regdate: activate to sort column ascending">regdate
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="hn: activate to sort column ascending">hn</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="visit: activate to sort column ascending">visit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="fullname: activate to sort column ascending">
                                                        fullname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptclass: activate to sort column ascending">ptclass
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptsname: activate to sort column ascending">ptsname
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="chief_complain: activate to sort column ascending">
                                                        chief_complain</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="diag: activate to sort column ascending">diag</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="dxtype: activate to sort column ascending">dxtype
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="note: activate to sort column ascending">note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">opd</td>
                                                    <td>05-12-2565</td>
                                                    <td>0193508</td>
                                                    <td>1</td>
                                                    <td>นางสาว ประภา คำมะวงศ์</td>
                                                    <td>00</td>
                                                    <td>บัตรทอง 30 บาท : ในเขต</td>
                                                    <td>ผู้ป่วยให้ hx ถูกลวนลาม จะข่มขืน
                                                        ก่อนมา 2 ชม</td>
                                                    <td>S809,W507</td>
                                                    <td>1,2</td>
                                                    <td>ตรวจอสอบ Diag Type</td>
                                                </tr>
                                               
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">unit</th>
                                                    <th rowspan="1" colspan="1">regdate</th>
                                                    <th rowspan="1" colspan="1">hn</th>
                                                    <th rowspan="1" colspan="1">visit</th>
                                                    <th rowspan="1" colspan="1">fullname</th>
                                                    <th rowspan="1" colspan="1">ptclass</th>
                                                    <th rowspan="1" colspan="1">ptsname</th>
                                                    <th rowspan="1" colspan="1">chief_complain</th>
                                                    <th rowspan="1" colspan="1">diag</th>
                                                    <th rowspan="1" colspan="1">dxtype</th>
                                                    <th rowspan="1" colspan="1">note</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example2_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 73 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="example2_previous"><a href="#" aria-controls="example2"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="example2" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example2" data-dt-idx="2" tabindex="0"
                                                        class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example2" data-dt-idx="3" tabindex="0"
                                                        class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example2" data-dt-idx="4" tabindex="0"
                                                        class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example2" data-dt-idx="5" tabindex="0"
                                                        class="page-link">5</a></li>
                                                <li class="paginate_button page-item disabled" id="example2_ellipsis"><a
                                                        href="#" aria-controls="example2" data-dt-idx="6" tabindex="0"
                                                        class="page-link">…</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example2" data-dt-idx="7" tabindex="0"
                                                        class="page-link">8</a></li>
                                                <li class="paginate_button page-item next" id="example2_next"><a
                                                        href="#" aria-controls="example2" data-dt-idx="8" tabindex="0"
                                                        class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-sm tab-pane fade" id="custom-tabs-four-2" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-2">
                            <div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dt-buttons btn-group flex-wrap"> <button
                                                class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                                aria-controls="example3" type="button"><span>Excel</span></button>
                                            <button class="btn btn-secondary buttons-print" tabindex="0"
                                                aria-controls="example3" type="button"><span>Print</span></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example3_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="example3"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example3"
                                            class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                            aria-describedby="example3_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example3" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="unit: activate to sort column descending">unit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="regdate: activate to sort column ascending">regdate
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="visit: activate to sort column ascending">visit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="hn: activate to sort column ascending">hn</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="fullname: activate to sort column ascending">
                                                        fullname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="yage: activate to sort column ascending">yage</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptclass: activate to sort column ascending">ptclass
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptsname: activate to sort column ascending">ptsname
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="chief_complain: activate to sort column ascending">
                                                        chief_complain</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="diag: activate to sort column ascending">diag</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="descrip: activate to sort column ascending">descrip
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="note: activate to sort column ascending">note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">opd</td>
                                                    <td>03-12-2565</td>
                                                    <td>1</td>
                                                    <td>0075527</td>
                                                    <td>นาง บังอร กิ่งใจ</td>
                                                    <td>57</td>
                                                    <td>72</td>
                                                    <td>ผู้มีรายได้น้อย : ในเขต</td>
                                                    <td>ญาติพบ นอนปลุก ไม่ตื่น ไม่รู้สึกตัว
                                                        ที่หลังบ้าน ลูกสาว 1 ชม</td>
                                                    <td>I26</td>
                                                    <td>Pulmonary embolism</td>
                                                    <td>ICD10 ไม่ครบหลัก</td>
                                                </tr>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">unit</th>
                                                    <th rowspan="1" colspan="1">regdate</th>
                                                    <th rowspan="1" colspan="1">visit</th>
                                                    <th rowspan="1" colspan="1">hn</th>
                                                    <th rowspan="1" colspan="1">fullname</th>
                                                    <th rowspan="1" colspan="1">yage</th>
                                                    <th rowspan="1" colspan="1">ptclass</th>
                                                    <th rowspan="1" colspan="1">ptsname</th>
                                                    <th rowspan="1" colspan="1">chief_complain</th>
                                                    <th rowspan="1" colspan="1">diag</th>
                                                    <th rowspan="1" colspan="1">descrip</th>
                                                    <th rowspan="1" colspan="1">note</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example3_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 28 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example3_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="example3_previous"><a href="#" aria-controls="example3"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="example3" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example3" data-dt-idx="2" tabindex="0"
                                                        class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example3" data-dt-idx="3" tabindex="0"
                                                        class="page-link">3</a></li>
                                                <li class="paginate_button page-item next" id="example3_next"><a
                                                        href="#" aria-controls="example3" data-dt-idx="4" tabindex="0"
                                                        class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-sm tab-pane fade" id="custom-tabs-four-3" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-3">
                            <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dt-buttons btn-group flex-wrap"> <button
                                                class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                                aria-controls="example4" type="button"><span>Excel</span></button>
                                            <button class="btn btn-secondary buttons-print" tabindex="0"
                                                aria-controls="example4" type="button"><span>Print</span></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example4_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="example4"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example4"
                                            class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                            aria-describedby="example4_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example4" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="unit: activate to sort column descending">unit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="regdate: activate to sort column ascending">regdate
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="hn: activate to sort column ascending">hn</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="visit: activate to sort column ascending">visit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="cardid: activate to sort column ascending">cardid
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="fullname: activate to sort column ascending">
                                                        fullname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptclass: activate to sort column ascending">ptclass
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptsname: activate to sort column ascending">ptsname
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="noptclass: activate to sort column ascending">
                                                        noptclass</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="hospmain: activate to sort column ascending">
                                                        hospmain</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="hospsub: activate to sort column ascending">hospsub
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4"
                                                        rowspan="1" colspan="1"
                                                        aria-label="note: activate to sort column ascending">note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">opd</td>
                                                    <td>17-12-2565</td>
                                                    <td>0214327</td>
                                                    <td>1</td>
                                                    <td>3330401567682</td>
                                                    <td>นายพงศกร พรมบุญ</td>
                                                    <td>01</td>
                                                    <td>บัตรทอง 30 บาท : นอกเขต</td>
                                                    <td></td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>ไม่พบรหัสหน่วยบริการหลัก</td>
                                                </tr>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">unit</th>
                                                    <th rowspan="1" colspan="1">regdate</th>
                                                    <th rowspan="1" colspan="1">hn</th>
                                                    <th rowspan="1" colspan="1">visit</th>
                                                    <th rowspan="1" colspan="1">cardid</th>
                                                    <th rowspan="1" colspan="1">fullname</th>
                                                    <th rowspan="1" colspan="1">ptclass</th>
                                                    <th rowspan="1" colspan="1">ptsname</th>
                                                    <th rowspan="1" colspan="1">noptclass</th>
                                                    <th rowspan="1" colspan="1">hospmain</th>
                                                    <th rowspan="1" colspan="1">hospsub</th>
                                                    <th rowspan="1" colspan="1">note</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example4_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 34 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example4_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="example4_previous"><a href="#" aria-controls="example4"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="example4" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example4" data-dt-idx="2" tabindex="0"
                                                        class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example4" data-dt-idx="3" tabindex="0"
                                                        class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example4" data-dt-idx="4" tabindex="0"
                                                        class="page-link">4</a></li>
                                                <li class="paginate_button page-item next" id="example4_next"><a
                                                        href="#" aria-controls="example4" data-dt-idx="5" tabindex="0"
                                                        class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-sm tab-pane fade" id="custom-tabs-four-4" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-4">
                            <div id="example5_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dt-buttons btn-group flex-wrap"> <button
                                                class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                                aria-controls="example5" type="button"><span>Excel</span></button>
                                            <button class="btn btn-secondary buttons-print" tabindex="0"
                                                aria-controls="example5" type="button"><span>Print</span></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example5_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="example5"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example5"
                                            class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                            aria-describedby="example5_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example5" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="unit: activate to sort column descending">unit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5"
                                                        rowspan="1" colspan="1"
                                                        aria-label="regdate: activate to sort column ascending">regdate
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5"
                                                        rowspan="1" colspan="1"
                                                        aria-label="hn: activate to sort column ascending">hn</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5"
                                                        rowspan="1" colspan="1"
                                                        aria-label="visit: activate to sort column ascending">visit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5"
                                                        rowspan="1" colspan="1"
                                                        aria-label="fullname: activate to sort column ascending">
                                                        fullname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5"
                                                        rowspan="1" colspan="1"
                                                        aria-label="cardid: activate to sort column ascending">cardid
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptclass: activate to sort column ascending">ptclass
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptsname: activate to sort column ascending">ptsname
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5"
                                                        rowspan="1" colspan="1"
                                                        aria-label="chief_complain: activate to sort column ascending">
                                                        chief_complain</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5"
                                                        rowspan="1" colspan="1"
                                                        aria-label="stsname: activate to sort column ascending">stsname
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5"
                                                        rowspan="1" colspan="1"
                                                        aria-label="note: activate to sort column ascending">note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">opd</td>
                                                    <td>04-12-2565</td>
                                                    <td>0173239</td>
                                                    <td>1</td>
                                                    <td>Miss. VIENGXAY(เวียงไช) SAYAVONG(ไชยะวงค์)</td>
                                                    <td>0000000173239</td>
                                                    <td>10</td>
                                                    <td>ชำระเงินเอง</td>
                                                    <td>รอยเขี้ยว 1 รอยที่ขาขวา หลังถูกสุนัขกัดก่อนมารพ.2 ชม.</td>
                                                    <td>ตรวจรักษาแล้วกลับบ้าน</td>
                                                    <td>13 หลักผิด</td>
                                                </tr>
                                               
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">unit</th>
                                                    <th rowspan="1" colspan="1">regdate</th>
                                                    <th rowspan="1" colspan="1">hn</th>
                                                    <th rowspan="1" colspan="1">visit</th>
                                                    <th rowspan="1" colspan="1">fullname</th>
                                                    <th rowspan="1" colspan="1">cardid</th>
                                                    <th rowspan="1" colspan="1">ptclass</th>
                                                    <th rowspan="1" colspan="1">ptsname</th>
                                                    <th rowspan="1" colspan="1">chief_complain</th>
                                                    <th rowspan="1" colspan="1">stsname</th>
                                                    <th rowspan="1" colspan="1">note</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example5_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 45 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example5_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="example5_previous"><a href="#" aria-controls="example5"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="example5" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example5" data-dt-idx="2" tabindex="0"
                                                        class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example5" data-dt-idx="3" tabindex="0"
                                                        class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example5" data-dt-idx="4" tabindex="0"
                                                        class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example5" data-dt-idx="5" tabindex="0"
                                                        class="page-link">5</a></li>
                                                <li class="paginate_button page-item next" id="example5_next"><a
                                                        href="#" aria-controls="example5" data-dt-idx="6" tabindex="0"
                                                        class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-sm tab-pane fade" id="custom-tabs-four-5" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-5">
                            <div id="example6_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dt-buttons btn-group flex-wrap"> <button
                                                class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                                aria-controls="example6" type="button"><span>Excel</span></button>
                                            <button class="btn btn-secondary buttons-print" tabindex="0"
                                                aria-controls="example6" type="button"><span>Print</span></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example6_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="example6"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example6"
                                            class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                            aria-describedby="example6_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example6" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="unit: activate to sort column descending">unit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example6"
                                                        rowspan="1" colspan="1"
                                                        aria-label="regdate: activate to sort column ascending">regdate
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example6"
                                                        rowspan="1" colspan="1"
                                                        aria-label="hn: activate to sort column ascending">hn</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example6"
                                                        rowspan="1" colspan="1"
                                                        aria-label="visit: activate to sort column ascending">visit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example6"
                                                        rowspan="1" colspan="1"
                                                        aria-label="fullname: activate to sort column ascending">
                                                        fullname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example6"
                                                        rowspan="1" colspan="1"
                                                        aria-label="cid: activate to sort column ascending">cid</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example6"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptclass: activate to sort column ascending">ptclass
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example6"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptsname: activate to sort column ascending">ptsname
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example6"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ptphone: activate to sort column ascending">ptphone
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example6"
                                                        rowspan="1" colspan="1"
                                                        aria-label="loss_update: activate to sort column ascending">
                                                        loss_update</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example6"
                                                        rowspan="1" colspan="1"
                                                        aria-label="note: activate to sort column ascending">note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">opd</td>
                                                    <td>09-12-2565</td>
                                                    <td>0133761</td>
                                                    <td>1</td>
                                                    <td>นาง เงิน ศิริบูรณ์</td>
                                                    <td>3330300656205</td>
                                                    <td>23</td>
                                                    <td>สิทธิ์เบิกจ่ายตรง</td>
                                                    <td>0935123079</td>
                                                    <td>3715</td>
                                                    <td>ขาดการปรับปรุง ที่อยู่เบอร์โทร ผู้ติดต่อ มาแล้ว 3715 วัน</td>
                                                </tr>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">unit</th>
                                                    <th rowspan="1" colspan="1">regdate</th>
                                                    <th rowspan="1" colspan="1">hn</th>
                                                    <th rowspan="1" colspan="1">visit</th>
                                                    <th rowspan="1" colspan="1">fullname</th>
                                                    <th rowspan="1" colspan="1">cid</th>
                                                    <th rowspan="1" colspan="1">ptclass</th>
                                                    <th rowspan="1" colspan="1">ptsname</th>
                                                    <th rowspan="1" colspan="1">ptphone</th>
                                                    <th rowspan="1" colspan="1">loss_update</th>
                                                    <th rowspan="1" colspan="1">note</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example6_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 981 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example6_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="example6_previous"><a href="#" aria-controls="example6"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="example6" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example6" data-dt-idx="2" tabindex="0"
                                                        class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example6" data-dt-idx="3" tabindex="0"
                                                        class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example6" data-dt-idx="4" tabindex="0"
                                                        class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example6" data-dt-idx="5" tabindex="0"
                                                        class="page-link">5</a></li>
                                                <li class="paginate_button page-item disabled" id="example6_ellipsis"><a
                                                        href="#" aria-controls="example6" data-dt-idx="6" tabindex="0"
                                                        class="page-link">…</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example6" data-dt-idx="7" tabindex="0"
                                                        class="page-link">99</a></li>
                                                <li class="paginate_button page-item next" id="example6_next"><a
                                                        href="#" aria-controls="example6" data-dt-idx="8" tabindex="0"
                                                        class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-sm tab-pane fade" id="custom-tabs-four-6" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-6">
                            <div id="example7_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dt-buttons btn-group flex-wrap"> <button
                                                class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                                aria-controls="example7" type="button"><span>Excel</span></button>
                                            <button class="btn btn-secondary buttons-print" tabindex="0"
                                                aria-controls="example7" type="button"><span>Print</span></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example7_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="example7"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example7"
                                            class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                            aria-describedby="example7_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example7" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="unit: activate to sort column descending">unit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example7"
                                                        rowspan="1" colspan="1"
                                                        aria-label="regdate: activate to sort column ascending">regdate
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example7"
                                                        rowspan="1" colspan="1"
                                                        aria-label="hn: activate to sort column ascending">hn</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example7"
                                                        rowspan="1" colspan="1"
                                                        aria-label="visit: activate to sort column ascending">visit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example7"
                                                        rowspan="1" colspan="1"
                                                        aria-label="fullname: activate to sort column ascending">
                                                        fullname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example7"
                                                        rowspan="1" colspan="1"
                                                        aria-label="cardid: activate to sort column ascending">cardid
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example7"
                                                        rowspan="1" colspan="1"
                                                        aria-label="chief_complain: activate to sort column ascending">
                                                        chief_complain</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example7"
                                                        rowspan="1" colspan="1"
                                                        aria-label="d_discharge: activate to sort column ascending">
                                                        d_discharge</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example7"
                                                        rowspan="1" colspan="1"
                                                        aria-label="los: activate to sort column ascending">los</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example7"
                                                        rowspan="1" colspan="1"
                                                        aria-label="recorder: activate to sort column ascending">
                                                        recorder</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example7"
                                                        rowspan="1" colspan="1"
                                                        aria-label="note: activate to sort column ascending">note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">opd</td>
                                                    <td>10-12-2565</td>
                                                    <td>0024890</td>
                                                    <td>1</td>
                                                    <td>นาง บัวลอน สิมณี</td>
                                                    <td>5330300039113</td>
                                                    <td>ไข้ ไอ หายใจหอบ 2 ชม. ก่อนมา </td>
                                                    <td>09-12-2565</td>
                                                    <td>1</td>
                                                    <td>นางสาวสุดาพร สารคาม</td>
                                                    <td>ผู้ป่วยเสียชีวิตมารับบริการ</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">unit</th>
                                                    <th rowspan="1" colspan="1">regdate</th>
                                                    <th rowspan="1" colspan="1">hn</th>
                                                    <th rowspan="1" colspan="1">visit</th>
                                                    <th rowspan="1" colspan="1">fullname</th>
                                                    <th rowspan="1" colspan="1">cardid</th>
                                                    <th rowspan="1" colspan="1">chief_complain</th>
                                                    <th rowspan="1" colspan="1">d_discharge</th>
                                                    <th rowspan="1" colspan="1">los</th>
                                                    <th rowspan="1" colspan="1">recorder</th>
                                                    <th rowspan="1" colspan="1">note</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example7_info" role="status"
                                            aria-live="polite">Showing 1 to 1 of 1 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example7_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="example7_previous"><a href="#" aria-controls="example7"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="example7" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item next disabled" id="example7_next">
                                                    <a href="#" aria-controls="example7" data-dt-idx="2" tabindex="0"
                                                        class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>