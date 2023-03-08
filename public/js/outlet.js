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
		var table = $('#dataTable').DataTable({
			processing: true,
			serverSide: true,
			destroy: true,
			// ajax: '/roles/data',
			ajax: {
                url: baseURL+"/admin/outlet/data?filter="+filter,
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
                { data: 'nama', name: 'nama' },
                { data: null, name: 'outlet_name',render:function(data){
                if (data.outlet == null)
                {
                var uncategorized = "Senja Coffee and Space";
                return uncategorized;
                }else{
                return data.outlet.outlet_name;
                }
                }},
                { data: 'alamat', name: 'alamat' },
                { data: 'kota', name: 'kota' },
                { data: 'no_telp', name: 'no_telp' },

				{
					data: null,
					orderable: false,
					className: "text-center",
					searchable: false,
					render: function(data, type, row){
						if(data.deleted_at != null){
						var button = "<button type='button' data-id='"+data.id+"' class='btn dotip btn-success btn-outline btn-circle m-r-5 btn-edt-data' data-toggle='tooltip' title='Edit outlet'>"
										+"<i class='ti-pencil-alt'></i>"
									+"</button>"
									// +"<button type='button' data-id='"+data.id+"' class='btn btn-info btn-outline btn-circle btn-sm m-r-5 btn-show-permission' data-toggle='tooltip' title='Show Permission'>"
									//	+"<i class='fa fa-certificate'></i>"
									// +"</button>"
									+"<a data-toggle='modal' data-target='#deleteModal'><button type='button' data-url='"+baseURL+"/admin/outlet/destroy/"+data.id+"' class='btn dotip btn-danger btn-outline btn-circle m-r-5 btn-delete-data' id='btn-delete-data' data-toggle='tooltip' title='Delete User'>"
										+"<i class='ti-trash'></i>"
									+"</button></a>";
						} else {
						var button = "<button type='button' data-id='"+data.id+"' class='btn dotip btn-success btn-outline btn-circle m-r-5 btn-edt-data' data-toggle='tooltip' title='Edit outlet'>"
										+"<i class='ti-pencil-alt'></i>"
									+"</button>"
									// +"<button type='button' data-id='"+data.id+"' class='btn btn-info btn-outline btn-circle btn-sm m-r-5 btn-show-permission' data-toggle='tooltip' title='Show Permission'>"
									//	+"<i class='fa fa-certificate'></i>"
									// +"</button>"
									+"<a data-toggle='modal' data-target='#deleteModal'><button type='button' data-url='"+baseURL+"/admin/outlet/destroy/"+data.id+"' class='btn dotip btn-danger btn-outline btn-circle m-r-5 btn-delete-data' id='btn-delete-data' data-toggle='tooltip' title='Delete User'>"
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
		});
		user.handleInfoData();
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
			modal.find(".modal-title").text("Create Outlet");
			form.find("#method").val("store");
			form.find("#id").val("");
		})
	},

	handlePostData : function(){
		$('.dataForm').ajaxForm({
			type: 'POST',
			url: baseURL+'/admin/outlet/store',
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
					user.handleTable($('#filter').val());
					progressbar.iUploadHandle(false);
				}

			}
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
		$("#dataTable tbody").on("click", ".btn-edt-data",function(){
            console.log('clicked edit');
			$.ajax({
				url: baseURL+"/admin/outlet/edit/"+$(this).attr("data-id"),
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
		modal.find(".modal-title").text("Edit outlet");

		form.find("#id").val(data.id);
        form.find("#outlet_name").val(data.nama);
        form.find("#shop_id").val(data.shop_id);
        form.find("#outlet_address").val(data.alamat);
        form.find("#outlet_city").val(data.kota);
        form.find("#outlet_contact").val(data.no_telp);


        // about.html(data.about);
		form.find("#method").val("update");
	},

	handleBulkData : function(data, bulkdata){
		$('#bulk-title').html(data);
		$('#btn-bulk').on('click',function(){
			$.ajax({
				url: baseURL+'/admin/outlet/bulk/'+data+'?id='+bulkdata,
				type: 'GET',
				dataType: 'JSON',
				success: function(data){
					$('#bulkModal').modal('hide');
					notification._toast('Success', 'Success Edit outlet', 'success');
					user.handleTable($('#filter').val());
				}
			});
		})

	},

	handleDeleteData : function(){
		$("#dataTable tbody").on("click", ".btn-delete-data", function(){
			url = $(this).attr('data-url');
		});

		$('#btn-hapus').on('click',function(){
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'JSON',
				success: function(data){
					$('#deleteModal').modal('hide');
					notification._toast('Success', 'Success Delete outlet', 'success');
					user.handleTable($('#filter').val());
				}
			});
		});
	},

	handleInfoData : function(){
		$.ajax({
			url: baseURL+"/admin/outlet/info",
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
				$('#total').html(data.total);
				$('#trashed').html(data.trashed);
			}
		});
	}
};
