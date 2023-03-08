
var appuser = {
    handleUserPage : function(filter){
		user.handleTable(filter);
		user.handleModalShow();
		user.handleModalClose();
		user.handleLogout();
		user.handlePostData();
		user.handleEditData();
		user.handleInfoData();
		user.handleDeleteData();
		user.handleApproveData();
		user.handleDeclineData();
		user.handleBidding();
    },
};

var user = {
	handleTable : function(filter){
		var table = $('#dataTableProduct').DataTable({
			processing: true,
			serverSide: true,
			destroy: true,
			// ajax: '/roles/data',
			ajax: {
                url: baseURL+"/admin/product/data?filter="+filter,
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
				{ data: null, name: 'image', render:function(data){
					if(data.image != ''){
						return '<image width="75px" class="rounded mx-auto d-block"'
					+'src="'+baseURL+'/images/'+data.image+'">';
					}else{
						return '<image width="75px" class="rounded mx-auto d-block"'
					+'src="'+baseURL+'/images/default.jpg">';
					}

				}},
                { data: 'product_name', name: 'name' },
                { data: null, name: 'is_bookable',render:function(data){
					if(data.is_bookable == 0){
						var type = '<b class="">No</b>';
					}else if(data.is_bookable == 1){
						var type = '<b class="">Yes</b>'
					}return type;
					}
          },
          { data: null, name: 'category',render:function(data){
					if (data.categories == null)
					{
						var uncategorized = "Uncategorized";
						return uncategorized;
					}else{
						return data.categories.name;
					}
				}},

                { data: 'base_price', name: 'base_price', render:function(data){
					return formatRupiah(data, 'Rp. ');
				}},
                { data: 'final_price', name: 'final_price',render:function(data){
					return formatRupiah(data, 'Rp. ');
				}},
        { data: null, name: 'is_available',render:function(data){
        if(data.is_available == 0){
        var type = '<b class="">No</b>';
      }else if(data.is_available == 1){
        var type = '<b class="">Yes</b>'
        }return type;
        }
        },
        { data: null, name: 'status',render:function(data){
					if(data.deleted_at != null){
						return status = '<b class="text-danger">TRASHED</b>'
					}else
					{
						var status = '<b class="text-success">ACTIVE</b>';
					}return status;
					}
				},
				{
					data: null,
					orderable: false,
					className: "text-center",
					searchable: false,
					render: function(data, type, row){
						if(data.deleted_at != null){
							return button = "<a data-toggle='modal' data-target='#restoreModal'><button type='button' data-url='"+baseURL+"/admin/product/restore/"+data.id+"' class='btn dotip btn-info btn-outline btn-circle m-r-5 btn-restore-data' data-toggle='tooltip' title='Restore Product'>"
										+"<i class='ti-reload'></i>"
									+"</button></a>"
									+"<a data-toggle='modal' data-target='#deleteModal'><button type='button' data-url='"+baseURL+"/admin/product/forcedelete/"+data.id+"' class='btn dotip btn-danger btn-outline btn-circle m-r-5 btn-delete-data' data-toggle='tooltip' title='Permantly Delete Product'>"
										+"<i class='fa fa-times'></i>"
									+"</button></a>";
						}
						if(data.is_verified == 0){
						var button = "<a href='"+baseURL+"/admin/product/edit/"+data.id+"' ><button type='button' class='btn dotip btn-success btn-outline btn-circle m-r-5 ' data-toggle='tooltip' title='Edit Product'>"
										+"<i class='ti-pencil-alt'></i>"
									+"</button></a>"
									+"<a data-toggle='modal' data-target='#approveModal'><button type='button' data-url='"+baseURL+"/product/approve/"+data.id+"' class='btn dotip btn-info btn-outline btn-circle m-r-5 btn-activate-data' data-toggle='tooltip' title='Approve Product'>"
										+"<i class='ti-check'></i>"
									+"</button>"
									// +"<button type='button' data-id='"+data.id+"' class='btn btn-info btn-outline btn-circle btn-sm m-r-5 btn-show-permission' data-toggle='tooltip' title='Show Permission'>"
									//	+"<i class='fa fa-certificate'></i>"
									// +"</button>"
									+"<a data-toggle='modal' data-target='#deleteModal'><button type='button' data-url='"+baseURL+"/admin/product/destroy/"+data.id+"' class='btn dotip btn-danger btn-outline btn-circle m-r-5 btn-delete-data' data-toggle='tooltip' title='Delete Product'>"
										+"<i class='ti-trash'></i>"
									+"</button></a>";
						} else {
						var button = "<a href='"+baseURL+"/admin/product/edit/"+data.id+"' ><button type='button' data-id='"+data.id+"' class='btn dotip btn-success btn-outline btn-circle m-r-5 ' data-toggle='tooltip' title='Edit Product'>"
										+"<i class='ti-pencil-alt'></i>"
									+"</button></a>"
									+"<a data-toggle='modal' data-target='#declineModal'><button type='button' data-url='"+baseURL+"/admin/product/decline/"+data.id+"' class='btn dotip btn-warning btn-outline btn-circle m-r-5 btn-decline-data' data-toggle='tooltip' title='Deactivate Product'>"
										+"<i class='ti-close'></i>"
									+"</button>"
									// +"<button type='button' data-id='"+data.id+"' class='btn btn-info btn-outline btn-circle btn-sm m-r-5 btn-show-permission' data-toggle='tooltip' title='Show Permission'>"
									//	+"<i class='fa fa-certificate'></i>"
									// +"</button>"
									+"<a data-toggle='modal' data-target='#deleteModal'><button type='button' data-url='"+baseURL+"/admin/product/destroy/"+data.id+"' class='btn dotip btn-danger btn-outline btn-circle m-r-5 btn-delete-data' data-toggle='tooltip' title='Delete Product'>"
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

    $('.select2').on('change',function(){
			table
			.columns(4)
			.search( this.value )
			.draw();
		});

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
			modal.find(".modal-title").text("Insert Product");
			form.find("#method").val("store");
			form.find("#id").val("");
			user.handleBidding();
		})
	},

	handlePostData : function(){
		$('.dataForm').ajaxForm({
			type: 'POST',
			url: baseURL+'/admin/product/store',
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
		$("#dataTableProduct tbody").on("click", ".btn-edt-data",function(){
			$.ajax({
				url: baseURL+"/admin/product/edit/"+$(this).attr("data-id"),
				type: "GET",
				dataType: "JSON",
				success : function(data){
					user.handleShowEditForm(data);

					if (data.bid_type == 'bidding'){
						var bidding = $('#dataModalBidding').children().html();
								$('#bidding').html(bidding);}
				}
			});
		})
	},

	handleShowEditForm : function(data){
		var modal = $(".dataModal");
        var form = $(".dataForm");
        var about = $('#about');

		modal.modal("show");
		modal.find(".modal-title").text("Edit Data User");

		form.find("#id").val(data.id);
		form.find("#name").val(data.product_name);
    form.find("#outlet_id").val(data.outlet_id);
		form.find("#category").val(data.categories_id);
		form.find("#base").val(data.base_price);
		form.find("#final").val(data.final_price);
		form.find("#stock").val(data.stock);
    if (data.is_bookable == 0){
    form.find("#royalty_bonus_status").val("off");
  }else{
    form.find("#royalty_bonus_status").val("on");
  }
		form.find("#id").val(data.id);
		form.find("#fotoimage").attr('src', baseURL+'/images/'+data.image);


        // about.html(data.about);
		form.find("#method").val("update");
	},

	handleBulkData : function(data, bulkdata){
		$('#bulk-title').html(data);
		$('#btn-bulk').on('click',function(){
			$.ajax({
				url: baseURL+'/admin/product/bulk/'+data+'?id='+bulkdata,
				type: 'GET',
				dataType: 'JSON',
				success: function(data){
					$('#bulkModal').modal('hide');
					notification._toast('Success', 'Success Edit Data', 'success');
					user.handleTable($('#filter').val());
				}
			});
		})

	},

	handleDeleteData : function(){
		$("#dataTableProduct tbody").on("click", ".btn-delete-data", function(){
			url = $(this).attr('data-url');
		});

		$('#btn-hapus').on('click',function(){
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'JSON',
				success: function(data){
					$('#deleteModal').modal('hide');
					notification._toast('Success', 'Success Delete Data', 'success');
					user.handleTable($('#filter').val());
				}
			});
		});

		$("#dataTableProduct tbody").on("click", ".btn-restore-data", function(){
			url = $(this).attr('data-url');
		});

		$('#btn-restore').on('click',function(){
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'JSON',
				success: function(data){
					$('#restoreModal').modal('hide');
					notification._toast('Success', 'Success Restore Data', 'success');
					user.handleTable($('#filter').val());
				}
			});
		});
	},

	handleApproveData : function(){
		$("#dataTableProduct tbody").on("click", ".btn-activate-data", function(){
			url = $(this).attr('data-url');
		});

		$('#btn-approve').on('click',function(){
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'JSON',
				success: function(data){
					$('#approveModal').modal('hide');
					notification._toast('Success', 'Success Approve Data', 'success');
					user.handleTable($('#filter').val());
				}
			});
		});
	},

	handleDeclineData : function(){
		$("#dataTableProduct tbody").on("click", ".btn-decline-data", function(){
			url = $(this).attr('data-url');
		});

		$('#btn-decline').on('click',function(){
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'JSON',
				success: function(data){
					$('#declineModal').modal('hide');
					notification._toast('Success', 'User Deactivated', 'success');
					user.handleTable($('#filter').val());
				}
			});
		});
	},

	handleInfoData : function(){
		$.ajax({
			url: baseURL+"/admin/product/info",
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
				for (x in data){
					($('#'+x).html(data[x]));
				}
				}
		});
	},

	handleBidding : function(){
		$("select.type").change(function(){
				if(this.value == 'bidding'){
					var bidding = $('#dataModalBidding').children().html();
					$('#bidding').html(bidding);
					$(".rupiah").bind('click keyup', function(event) {
						format = $(this).val().replace(/[^,\d]/g, "").toString();
						// $(".price-value").val(format);
						$(this).val(formatRupiah(this.value, 'Rp. '));
					});
					$(".nomor").bind('click keyup', function(event) {
						format = $(this).val().replace(/[^,\d]/g, "").toString();
						// $(".price-value").val(format);
						$(this).val(formatNumber(this.value));
					});
				}else{
					$('#bidding').html('');
				}
		});
	}
};
