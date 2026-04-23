@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">{{ $title }}</h5>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="reload" id="reload-table"></a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<!--Frame Tabel-->
		<div id="frame-tabel">
			<button type="button" class="btn btn-primary legitRipple" id="tambah"><i class="icon-add mr-2"></i> Tambah</button>
			<button type="button" class="btn btn-warning legitRipple" id="ubah"><i class="icon-pencil mr-2"></i> Ubah</button>
			<button type="button" class="btn btn-danger legitRipple" id="hapus"><i class="icon-trash mr-2"></i> Hapus</button>
			<div class="row" style="margin-top:10px">
				<div class="col-md-4" >
					<div class="form-group form-group-float">
						<input name="search_param" id="search_param" placeholder="Pencarian" class="form-control" data-fouc />
					</div>
					
				</div>
				<div class="col-md-4">
					<br>
					<div class="form-group form-group-float">
						<select name="tahun_param" id="tahun_param" class="form-control form-control-select2" data-fouc>
							<option value=""></option>
							@for ($i = date('Y')-5; $i <= date('Y')+1; $i++)
								<option value="{{ $i }}">{{ $i }}</option>
							@endfor
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<br>
					<div class="form-group form-group-float">
						<select name="bulan_param" id="bulan_param" class="form-control form-control-select2" data-fouc>
							<option value=""></option>
							@for ($i = 1; $i <= 12; $i++)
								<option value="{{ $i }}">{!! bulan($i) !!}</option>
							@endfor
						</select>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-single-select datatable-pagination" id="tabel-data" width="100%">
					<thead>
						<tr>
							<th id="test_cd_table">Kode</th>
							<th id="test_nm_table">Nama</th>
							<th id="keterangan_table">Keterangan</th>
							<th id="tahun_table">Tahun</th>
							<th id="bulan_table">Bulan</th>
							<th id="nama_bulan_table">Bulan</th>
							<th class="text-center" width="20%"></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
		<!--Frame Form-->
		<div id="frame-form">
			<form class="form-validate-jquery" id="form-data" action="#">
				@csrf
				<div class="row">
					<div class="col-md-4">
						<div class="form-group form-group-float">
							<label class="form-group-float-label is-visible">Kode <span class="text-danger">*</span></label>
							<input type="text" name="test_cd" class="form-control text-uppercase" required="" placeholder="" aria-invalid="false">
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group form-group-float">
							<label class="form-group-float-label is-visible">Nama <span class="text-danger">*</span></label>
							<input type="text" name="test_nm" class="form-control" required="" placeholder="" aria-invalid="false" minlength="3" maxlength="100">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group form-group-float">
							<label class="form-group-float-label is-visible">Keterangan </label>
							
							<input type="text" name="keterangan" class="form-control" placeholder="" aria-invalid="false">
							
							<!--<textarea id="keterangan" name="keterangan" rows="4" cols="50">
							</textarea>-->
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group form-group-float">
							<label class="form-group-float-label is-visible">Tahun</label>
							<select name="tahun" id="tahun" class="form-control form-control-select2" data-fouc>
                                @for ($i = date('Y')-5; $i <= date('Y')+1; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group form-group-float">
							<label class="form-group-float-label is-visible">Bulan</label>
							<select name="bulan" id="bulan" class="form-control form-control-select2" data-fouc>
                                @for ($i = 1; $i <= 12; $i++)
									<option value="{{ $i }}">{!! bulan($i) !!}</option>
                                @endfor
                            </select>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-end align-items-center">
					<button type="submit" class="btn btn-primary legitRipple">Simpan <i class="icon-floppy-disk ml-2"></i></button>
					<button type="reset" class="btn btn-light ml-2 legitRipple" id="reset">Selesai <i class="icon-reload-alt ml-2"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<!-- Print / Export -->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<!-- End Print / Export -->

<script>
    var tabelData;
    var saveMethod = 'tambah';
    var baseUrl = '{{ url("sistem/test/") }}';
	
    $(document).ready(function(){
        $('#frame-form').hide();
		
		$('select[name=tahun]').val('{{ date("Y") }}').trigger('change');
		$('select[name=bulan]').val('{{ date("n") }}').trigger('change');
		
		tabelData = $('#tabel-data').DataTable({
            language: {
                paginate: {'next': $('html').attr('dir') == 'rtl' ? 'Next &larr;' : 'Next &rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr; Prev' : '&larr; Prev'}
            },
            //pagingType: "simple",
            processing	: true, 
            serverSide	: true, 
            order		: [[3,'asc'],[4,'asc']], 
            ajax		: {
                url: baseUrl + '/data',
				type: "POST",
                data : function(d){
                    d._token        = $('meta[name="csrf-token"]').attr('content');
					d.tahun_param 	= $('select[name=tahun_param]').val();
					d.bulan_param 	= $('select[name=bulan_param]').val();
                },
            },
			language: {
			  "sSearch": "" //--Change search box caption
			},
            lengthMenu		: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
			info 			: false, /*--Showing 1 to XX of YY entries--*/
            dom : 'Blrtip',
			buttons: [
				{
					extend:    'excelHtml5',
					exportOptions: {
						columns: [1,2,3,5]
					},
					text:      '<i class="fa fa-file-excel-o"></i>',
					titleAttr: 'Excel',
                    attr:  { id: 'button-excel' }
				},
				{
					extend:    'pdfHtml5',
					exportOptions: {
						columns: [1,2,3,5]
					},
					text:      '<i class="fa fa-file-pdf-o"></i>',
					titleAttr: 'PDF',
                    attr:  { id: 'button-pdf' },
					//orientation:'landscape',
					orientation:'portrait',
					pageSize: 	'A4',
					download: 	'open',
					customize: function (doc) {
						//--Header & Parameter
						var reportTitle =  'Data Test';

						//--Full width table
						//doc.content[1].table.widths =Array(doc.content[1].table.body[0].length + 1).join('*').split('');
						doc.content[1].table.widths = [100,150,80, 100];
						var rowCount = doc.content[1].table.body.length;
						for (i = 1; i < rowCount; i++) {
							doc.content[1].table.body[i][0].alignment = 'left';
							doc.content[1].table.body[i][1].alignment = 'left';
							doc.content[1].table.body[i][2].alignment = 'right';
                            doc.content[1].table.body[i][3].alignment = 'left';
						}

						//doc.defaultStyle.alignment = 'center'; //--alignment all column
						doc.styles.tableHeader.alignment = 'center';
						doc.defaultStyle.fontSize = 10;
						doc.styles.tableHeader.fontSize = 12;
						doc.styles.tableFooter.fontSize = 10;
						doc.styles.title.fontSize = 14;

						doc.content.splice(0,1);
						var now = new Date();
						var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
						doc.pageMargins = [20,60];
						doc.defaultStyle.fontSize = 10;
						doc.styles.tableHeader.fontSize = 10;
						doc['header']=(function() {
							return {
								columns: [
									{
										alignment: 'left',
										bold: true,
										//italics: true,
										text: reportTitle,
										fontSize: 10,
										margin: [10,0]
									},
								],
								margin: 20
							}
						});
						doc['footer']=(function(page, pages) {
							return {
								columns: [
									{
										alignment: 'left',
										text: ['Tanggal : ', { text: jsDate.toString() }]
									},
									{
										alignment: 'right',
										text: ['Page ', { text: page.toString() },	' of ',	{ text: pages.toString() }]
									}
								],
								margin: 10
							}
						});
						var objLayout = {};
						objLayout['hLineWidth'] = function(i) { return .5; };
						objLayout['vLineWidth'] = function(i) { return .5; };
						objLayout['hLineColor'] = function(i) { return '#aaa'; };
						objLayout['vLineColor'] = function(i) { return '#aaa'; };
						objLayout['paddingLeft'] = function(i) { return 4; };
						objLayout['paddingRight'] = function(i) { return 4; };
						doc.content[0].layout = objLayout;
					}
				},
				{
					extend:    'print',
					exportOptions: {
						columns: [1,2,3,5]
					},
					text:      '<i class="fa fa-print"></i>',
					titleAttr: 'Print',
                    attr:  { id: 'button-print' }
				}
			],
            columns: [
                { data: 'test_cd', name: 'test_cd', visible:true },
                { data: 'test_nm', name: 'test_nm' },
				{ data: 'keterangan', name: 'keterangan' },
				{ data: 'tahun', name: 'tahun' },
				{ data: 'bulan', name: 'bulan', visible:true },
				{ data: 'nama_bulan', name: 'nama_bulan', visible:true },
				{ data: 'actions', name: 'actions' }
            ],
        });
		
		$(".buttons-excel").removeClass("dt-button buttons-html5");
        $(".buttons-pdf").removeClass("dt-button buttons-html5");
        $(".buttons-print").removeClass("dt-button buttons-html5");

        $(".buttons-excel").addClass("btn bg-warning legitRipple mr-1");
        $(".buttons-pdf").addClass("btn bg-info legitRipple mr-1");
        $(".buttons-print").addClass("btn bg-teal-400 legitRipple mr-1");
        $(".dt-buttons").addClass("mx-0 mt-2");

        $(document).on('keyup', '#search_param',function(){ 
            //tabelData.column('#code_nm_table').search($(this).val()).draw();
			tabelData.search($(this).val()).draw();
        });
		
		$(document).on('change', '#tahun_param',function(){
			//--Filter tahun frontend
            //tabelData.column('#tahun_table').search($(this).val()).draw();

			//--Filter tahun backend
			tabelData.ajax.reload();
        });
		$(document).on('change', '#bulan_param',function(){
			//--Filter bulan frontend
            //tabelData.column('#bulan_table').search($(this).val()).draw();
			//tabelData.column('#bulan_table').search("^" + $(this).val() + "$", true, false).draw();

			//--Filter bulan backend
			tabelData.ajax.reload();
        });
		
		$('#reload-table').click(function(){
			$('input[name=search_param]').val('').trigger('keyup');
			
			tabelData.ajax.reload();
			
			//window.location = '/sistem/test/';
		});

        //--Tambah data
        $('#tambah').click(function()   {
			saveMethod  = 'tambah';

            $('input[name=test_nm]').focus();
            $('#frame-tabel').hide();      
            $('#frame-form').show(); 
            $('.card-title').text('Tambah Data');       
        });

        //--Cek kode
        /* $('input[name=com_cd]').focusout(function(){
			var id          = $(this).val();
            var urlUpdate   = baseUrl + '/' + id;
            
            if ($(this).val() && saveMethod === 'tambah') {
                $.getJSON( urlUpdate, function(data){
                    if (data['status'] == 'ok') {
                        swal({
                            title: "Peringatan !",
                            text: "Kode sudah digunakan",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1000
                        }).then(() => {
                            $('input[name=com_cd]').val('');
                            $('input[name=com_cd]').focus();
                            swal.close();
                        });
                    }
                });
            }
        }); */

        //--Reset form
        $('#reset').click(function()   {
            saveMethod  = '';

            tabelData.ajax.reload();
            $('#frame-tabel').show();      
            $('#frame-form').hide(); 
            $('.card-title').text('Data Test');
			$('input[name=test_cd]').val(rowData['test_cd']).prop('readonly',false);
			$('input[name=test_nm]').val('');
        });
        
        //--Submit form
        $('#form-data').submit(function(e){
            if (e.isDefaultPrevented()) {
			//--Handle the invalid form
            } else {
				e.preventDefault();
				
				var record  = $('#form-data').serialize();
                if(saveMethod == 'tambah'){
					var url     = baseUrl;
                    var method  = 'POST';
                }else{
					var url     = baseUrl + '/' + dataCd;
                    var method  = 'PUT';
                }
					
				/* var record=$('#form-data').serialize();
                var url     = '{{ url("/sistem/kode/") }}';
                var method  = 'POST'; */

                swal({
                    title               : 'Simpan data ?',
                    type                : "question",
                    showCancelButton    : true,
                    confirmButtonColor  : "#00a65a",
                    confirmButtonText   : "OK",
                    cancelButtonText    : "NO",
                    allowOutsideClick : false,
                }).then(function(result){
					if(result.value){
                        swal({allowOutsideClick : false,title: "Proses simpan",onOpen: () => {swal.showLoading();}});

                        $.ajax({
                            'type': method,
                            'url' : url,
                            'data': record,
                            'dataType': 'JSON',
                            'success': function(response){
                                if(response["status"] == 'ok') {
									swal({
                                        title: "Proses berhasil",
                                        type: "success",
                                        showCancelButton: false,
                                        showConfirmButton: false,
                                        timer: 1000
                                    }).then(() => {
                                        $('#reset').click();
                                        swal.close();
                                    });
                                }else{
                                    swal({title: "Proses gagal",type: "error",showCancelButton: false,showConfirmButton: false,timer: 1000});
                                }
                            },
                            'error': function(response){ 
                                var errorText = '';
                                $.each(response.responseJSON.errors, function(key, value) {
                                    errorText += value+'<br>'
                                });

                                swal({
                                    title             : response.status+':'+response.responseJSON.message,
                                    type              : "error",
                                    html              : errorText, 
                                    showCancelButton  : false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText : "OK",
                                    cancelButtonText  : "NO",
                                }).then(function(result){
                                    if(result.value){   	
                                        reset('ubah');
                                    }
                                });  
                            }
                        });
                    }
                });
            }
        });

        //--Ubah data
        $(document).on('click', '#ubah',function(){ 
            if (dataCd == null) {
                swal({
                    title: "Pilih data !",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false,
                    timer: 1000
                });
            }else{
                saveMethod  = 'ubah';
				
				$('input[name=test_cd]').val(rowData['test_cd']).prop('readonly',true);
                $('input[name=test_nm]').val(rowData['test_nm']);
				$('input[name=keterangan]').val(rowData['keterangan']);
				
                $('#frame-tabel').hide();      
                $('#frame-form').show(); 
            }
        });

        //--Hapus data
        $(document).on('click', '#hapus',function(){
            if (dataCd == null) {
                swal({
                    title: "Pilih Data!",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false,
                    timer: 1000
                });
            }else{
                swal({
                    title             : "Hapus data?",
                    type              : "question",
                    showCancelButton  : true,
                    confirmButtonColor: "#00a65a",
                    confirmButtonText : "OK",
                    cancelButtonText  : "NO",
                    allowOutsideClick : false,
                }).then(function(result){
                    if(result.value){
                        swal({allowOutsideClick : false, title: "Proses hapus",onOpen: () => {swal.showLoading();}});
                        
                        $.ajax({
                            url : baseUrl + '/' + dataCd,
                            type: "DELETE",
                            dataType: "JSON",
                            data: {
                                '_token': $('input[name=_token]').val(),
                            },
                            success: function(response)
                            {
                                if (response.status == 'ok') {
                                    swal({
                                        title: "Proses berhasil",
                                        type: "success",
                                        showCancelButton: false,
                                        showConfirmButton: false,
                                        timer: 1000
                                    }).then(() => {
                                        reset('')
                                        swal.close();
                                    });
                                }else{
                                    swal({title: "Proses gagal",type: "error",showCancelButton: false,showConfirmButton: false,timer: 1000});
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                swal({title: "Terjadi kesalahan sistem !", text:"Silakan hubungi Administrator", type: "error",showCancelButton: false,showConfirmButton: false,timer: 1000});
                            }
                        })
                    }else {
                        swal.close();
                    }
                });
            } 
        });
    });

    function reset(type) {
        saveMethod  = '';
        dataCd = null;
        rowData = null;
        tabelData.ajax.reload();
        
        $('#frame-tabel').show();      
        $('#frame-form').hide(); 
        $('input[name=test_cd]').val('').prop('readonly',false);
        $('input[name=test_nm]').val('');
        $('.card-title').text('Data Test');       
    }
</script>
@endpush