
var appuser = {
    handleUserPage : function(filter){
		user.handleTable(filter);
		user.handleBulkData();
		user.handleModalShow();
		user.handleModalClose();
		user.handleLogout();
		user.handlePostData();
		user.handleEditData();
		user.handleInfoData();
		user.handleDeleteData();
    },
};

var user = {
	handleTable : function(filter){
		var table = $('#dataTableCategory').DataTable({
			processing: true,
			serverSide: true,
			destroy: true,
			// ajax: '/roles/data',
			ajax: {
                url: baseURL+"/admin/category/data?filter="+filter,
                method: 'GET',
            },
			columns: [
				// { data: 'id', name: 'id', className: "text-center", searchable: false },
				{data:'id',orderable:false,searchable:false},
				{
					data: null,
					orderable: false,
					className : "text-center",
					searchable: false,
					render: function (data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
				// { data: null, name: 'image', render:function(data){
				// 	if(data.image != null){
				// 		return '<image width="75px" class="rounded mx-auto d-block"' 
				// 	+'src="'+baseURL+'/images/'+data.image+'">';
				// 	}else{
				// 		return '<image width="75px" class="rounded mx-auto d-block"' 
				// 	+'src="'+baseURL+'/images/default.jpg">';
				// 	}
				// }},
				{ data: 'name', name: 'name' },
				{ data: 'status', name: 'status',"bVisible": false },
				{ data: 'shop_id', name: 'shop_id',"bVisible": false },
				{
					data: null,
					orderable: false,
					className: "text-center",
					searchable: false,
					render: function(data, type, row){
						// var button = '<div class=" " role="group">'
						//    +'<button id="btnGroupVerticalDrop'+data.id+'" type="button" class="btn btn-secondary " data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
						// 	+'<i class="ti-more"></i>'
						// 	+'</button>'
						// 	+'<div class="dropdown-menu " aria-labelledby="btnGroupVerticalDrop'+data.id+'" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: -55px; transform: translate3d(0px, -83px, 0px);"><a class="dropdown-item" href="#">Dropdown link</a><a class="dropdown-item" href="#">Dropdown link</a></div></div>';
						// return button;
						if(data.deleted_at != null){
						var button = "<button type='button' data-id='"+data.id+"' class='btn dotip btn-primary btn-info btn-circle m-r-5 btn-edt-data' data-toggle='tooltip' title='Restore Category'>"
										+"<i class='ti-reload'></i>"
									+"</button>"
									// +"<button type='button' data-id='"+data.id+"' class='btn btn-info btn-outline btn-circle btn-sm m-r-5 btn-show-permission' data-toggle='tooltip' title='Show Permission'>"
									//	+"<i class='fa fa-certificate'></i>"
									// +"</button>"
									+"<a data-toggle='modal' data-target='#deleteModal'><button type='button' data-url='"+baseURL+"/admin/category/destroy/"+data.id+"' class='btn dotip btn-danger btn-outline btn-circle m-r-5 btn-delete-data' id='btn-delete-data' data-toggle='tooltip' title='Delete Category'>"
										+"<i class='ti-trash'></i>"
									+"</button></a>";
						} else {
						var button = "<button type='button' data-id='"+data.id+"' class='btn dotip btn-success btn-outline btn-circle m-r-5 btn-edt-data' data-toggle='tooltip' title='Edit Category'>"
										+"<i class='ti-pencil-alt'></i>"
									+"</button>"
									// +"<button type='button' data-id='"+data.id+"' class='btn btn-info btn-outline btn-circle btn-sm m-r-5 btn-show-permission' data-toggle='tooltip' title='Show Permission'>"
									//	+"<i class='fa fa-certificate'></i>"
									// +"</button>"
									+"<a data-toggle='modal' data-target='#deleteModal'><button type='button' data-url='"+baseURL+"/admin/category/destroy/"+data.id+"' class='btn dotip btn-danger btn-outline btn-circle m-r-5 btn-delete-data' id='btn-delete-data' data-toggle='tooltip' title='Delete Category'>"
										+"<i class='ti-trash'></i>"
									+"</button></a>";
						}
						return button;
					}
				}
			],
			columnDefs: [
				{
				   targets: 0,
				   orderable:false,
				   searchable:false,
				   checkboxes: {
					  selectRow: true
				   }
				}
			 ],
			 select: {
				style: 'multi'
			 },
			 paging:false,
		});

		user.handleInfoData();

		table.column(3).search(1).draw();

		$('.filter').on('click change',function(){
			filter = $(this).data('filter');
			if(filter == 'active'){
				table
					.column(3)
					.search(1)
					.draw();
			}else{
				table.column(3)
				.search(0)
				.draw();
			}
		})
		$('#searchdata').on('keyup',function(){
			table
			.columns(2)
			.search( this.value )
			.draw();
		})
		$('#select_shop').on('change',function(){
			table
			.columns(4)
			.search( this.value )
			.draw();
		});
		table.column(3, {search: '1'})
		.data()
		.filter( function ( value, index ) {
			console.log(value)
		} );
		$(".bulk-button").on("click", function(){
			var rows_selected = table.column(0).checkboxes.selected();
			
			// Iterate over all selected checkboxes
			var bulkvalue = [];
			$.each(rows_selected, function(index, rowId){
				// Create a hidden element 
				bulkvalue[index] = rowId;
				
			});
			bulklength = bulkvalue.length;
			if(bulklength == 0){
				alert('Please choose data first !');
				return false;
			}

			$('#bulkvalue').val(bulkvalue);
			$('#bulkModal').modal('show');
			user.handleBulkData($(this).data('title'),bulkvalue);
			return false;
		});
	},

	handleLogout : function(){
		$("#log-out").on("click", function(){
			var modal = $("#logoutModal");
			var form = $("#logout-form");
			
			modal.modal("show");
		})
	},

	handleModalShow: function(){
		$(".add-data").on("click", function(){
			var modal = $(".dataModal");
			var form = $(".dataForm");

			modal.modal("show");
			modal.find(".modal-title").text("Create Category");
			form.find("#method").val("store");
			form.find("#id").val("");
		})
	},

	handlePostData : function(){
		$('.dataForm').ajaxForm({
			type: 'POST',
			url: baseURL+'/admin/category/store',
			beforeSubmit : function(){
				if ($('#method') == 'store'){
					foto = $('#foto')[0].files[0].size;
					if(foto > 100000000){
						notification._toast("ERROR", "File too large", "error");
						return false;
					}
				}
				$('#loaders').css('display','block');
				$('.progress-bar').css('width','0%').text('0%');
				progressbar.iUploadHandle(true);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var persen = percentComplete + '%';
				$('.progress-bar').css('width',persen).text(persen);
				if(percentComplete == 100){
					$('.progress-bar').css('width',persen).text('processing');
				}
			},
			complete : function(xhr){
				$('#loaders').css('display','none');
				var data = $.parseJSON(xhr.responseText);console.log(data);
				if (data.status == 2) {
					notification._toast('Terjadi kesalahan', data.message, 'error');
				}else{
					notification._toast('Success Update Data', data.message, 'success');
					$(".dataModal").modal("hide");
					// user.handleTable($('#filter').val());
					$('#dataTableCategory').DataTable().ajax.reload();
					progressbar.iUploadHandle(false);
				}

			}
		});
	},

	handleStoreData : function(url, data){
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'JSON',
			data: data,
			success: function(data) {
				if(data.status == 1){
					notification._toast('Success', 'Success Update Data', 'success');
					$("#dataModal").modal("hide");
					user.handleTable($('#filter').val());
				}else{
					notification._toast('Error', data.message, 'error');
				}
			},
		});
	},

	handleModalClose : function(){
		$('#dataModal').on('hidden.bs.modal', function () {
			$(this).find(".has-error").removeClass("has-error");
			$('#dataForm').find("input[type=checkbox]").prop('checked',false);
			$('#dataForm').find("input[type=text], input[type=email], input[type=password], textarea").val("");
		})
	},

	handleEditData : function(){
		$("#dataTableCategory tbody").on("click", ".btn-edt-data",function(){
            console.log('clicked edit');
			$.ajax({
				url: baseURL+"/admin/category/edit/"+$(this).attr("data-id"),
				type: "GET",
				dataType: "JSON",
				success : function(data){
					user.handleShowEditForm(data);
				}
			});
		})
	},

	handleShowEditForm : function(data){
		var modal = $("#dataModal");
        var form = $("#dataForm");
        var about = $('#about');

		modal.modal("show");
		modal.find(".modal-title").text("Edit Data Category");

		form.find("#id").val(data.id);
		form.find("#name").val(data.name);

        // about.html(data.about);
		form.find("#method").val("update");
	},

	handleBulkData : function(data, bulkdata){
		$('#bulk-title').html(data);
		$('#btn-bulk').on('click',function(){
			$.ajax({
				url: baseURL+'/admin/category/bulk/'+data+'?id='+bulkdata,
				type: 'GET',
				dataType: 'JSON',
				success: function(data){
					$('#bulkModal').modal('hide');
					notification._toast('Success', 'Success Edit Category', 'success');
					user.handleTable($('#filter').val());
				}
			});
		})
		
	},

	handleDeleteData : function(){
		$("#dataTableCategory tbody").on("click", ".btn-delete-data", function(){
			url = $(this).attr('data-url');
		});

		$('#btn-hapus').on('click',function(){
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'JSON',
				success: function(data){
					$('#deleteModal').modal('hide');
					notification._toast('Success', 'Success Delete Category', 'success');
					$('#dataTableCategory').DataTable().ajax.reload();
				}
			});
		});
	},

	handleInfoData : function(){
		$.ajax({
			url: baseURL+"/admin/category/info",
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
				$('#total').html(data.total);
				$('#trashed').html(data.trashed);
			}
		});
	}
};

