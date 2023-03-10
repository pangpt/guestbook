function updatecart(id,qty){
    $.ajax({
        url: baseURL+'/admin/order/cart/updateqty',
        type: 'GET',
        data: {
            id:id,
            qty:qty
        },
        success: function(data){
          getcart();
        }
    });
}

function getcart(){
    $.ajax({
        url: baseURL+'/admin/order/cart',
        type: 'GET',
        success: function(data){
            $('#cartcontainer').html(data);
        }
    });
}

var appproduct = {
  handleProductPage : function(){
  product.handleTable();
  product.getCart();
  },
};

var product = {
  handleTable : function(){
    var tablepro = $('#dataTableOrderProduct').DataTable({
      processing: true,
      serverSide: true,
      //bFilter: false,
      "lengthChange": false,
      destroy: true,
      // ajax: '/roles/data',
      ajax: {
                url: baseURL+"/admin/order/dataproduct",
                method: 'GET',
            },
      columns: [
        // { data: 'id', name: 'id', className: "text-center", searchable: false },
        {
          data: null,
          orderable: false,
          className : "text-center",
          searchable: false,
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        { data: 'product_name', name: 'product'},
        { data: null, name: 'category',render:function(data){
        if (data.categories == null)
        {
          var uncategorized = "Uncategorized";
          return uncategorized;
        }else{
          return data.categories.name;
        }
      }},
        {
          data: null,
          orderable: false,
          className: "text-center",
          searchable: false,
          render: function(data, type, row){
            if(data.is_available != null){
              return button = "<button type='button' data-url='"+baseURL+"/admin/order/restore/"+data.id+"' data-productid='"+data.id+"' class=' btn dotip btn-info btn-outline btn-circle m-r-5 addtocart' data-toggle='tooltip' title='Add To Cart'>"
                    +"<i class='ti-shopping-cart'></i>"
                  +"</button>";
            }else {
              return button = ''
            }
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
    $('#dataTableOrderProduct tbody').on('click', ".addtocart", function(){
        id = $(this).data('productid');
            product.addToCart(id);
            console.log(id);
            product.getCart();
    })
    $('#searchdata').on('keyup',function(){
			tablepro
			.columns(1)
			.search( this.value )
			.draw();
		})
    $('#select_category').on('change',function(){
			tablepro
			.columns(2)
			.search( this.value )
			.draw();
		});
  },

  addToCart : function(id){
    $.ajax({
        url: baseURL+'/admin/order/cart/create',
        type: 'GET',
        data: {
            id:id
        },
				success: function(data){
					notification._toast('Success', 'Success Approve Data', 'success');
				}
			});
		},

    getCart : function(){
      $.ajax({
          url: baseURL+'/admin/order/cart',
          type: 'GET',
          success: function(data){
              $('#cartcontainer').html(data);
          }
      });
    },

    updateQty : function(){
          $.ajax({
              url: baseURL+'/admin/order/cart/updateqty',
              type: 'GET',
              data: {
                  id:id,
                  qty:qty
              },
              success: function(data){
              }
          });
    },

};

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
		var table = $('#dataTableOrder').DataTable({
			processing: true,
			serverSide: true,
			destroy: true,
			// ajax: '/roles/data',
			ajax: {
                url: baseURL+"/admin/order/data?filter="+filter,
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
        { data: 'cashier_id', name: 'cashier_id' },
        { data: 'customer_id', name: 'customer_id' },
        { data: 'customer_name', name: 'customer_name' },
        { data: 'total_final_price', name: 'total_final_price',render:function(data){
					return formatRupiah(data, 'Rp. ');
				}},
        { data: 'total_base_price', name: 'total_base_price',render:function(data){
					return formatRupiah(data, 'Rp. ');
				}},
        { data: 'pickup_time', name: 'pickup_time' },
				{
					data: null,
					orderable: false,
					className: "text-center",
					searchable: false,
					render: function(data, type, row){
							return button = "<a href='"+baseURL+"/admin/order/detail/"+data.id+"'><button type='button' data-url='"+baseURL+"/admin/order/restore/"+data.id+"' class='btn dotip btn-info btn-outline btn-circle m-r-5 btn-restore-data' data-toggle='tooltip' title='Restore Product'>"
										+"<i class='ti-reload'></i>"
									+"</button></a>";
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

	/*handleModalShow: function(){
		$(".add-data").on("click", function(){
			var modal = $(".dataModal");
			var form = $(".dataForm");

			modal.modal("show");
			modal.find(".modal-title").text("Insert Product");
			form.find("#method").val("store");
			form.find("#id").val("");
			user.handleBidding();
		})
	},*/

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
		form.find("#type").val(data.product_type);
		form.find("#category").val(data.categories_id);
		form.find("#base").val(data.base_price);
		form.find("#final").val(data.final_price);
		form.find("#stock").val(data.stock);
		form.find("#id").val(data.id);
		form.find("#fotoimage").attr('src', baseURL+'/images/'+data.image);
		if (data.product_type == 'bidding'){
			var bidding = $('#dataModalBidding').children().html();
					$('#bidding').html(bidding);
					$('#bidding').find("#bid_type").val(data.bid_type);
					$('#bidding').find("#max").val(data.max);
					$('#bidding').find("#min").val(data.min);
					$('#bidding').find("#scale").val(data.scale);
					$('#bidding').find("#fixed").val(data.fixed);
        }

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
